<?php
ob_start();
include_once './models/AuthModel.php';

$authModel = new AuthModel();

if (isset($_POST['request_login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Verify reCAPTCHA
    $recaptchaSecretKey = '6LfLjzApAAAAAHL47mB3JFC8soO-k38BkYTHtUK6'; // Replace with your actual secret key
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $recaptchaVerificationUrl = "https://www.google.com/recaptcha/api/siteverify";
    $recaptchaData = [
        'secret' => $recaptchaSecretKey,
        'response' => $recaptchaResponse
    ];

    $recaptchaOptions = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($recaptchaData)
        ]
    ];

    $recaptchaContext = stream_context_create($recaptchaOptions);
    $recaptchaResult = file_get_contents($recaptchaVerificationUrl, false, $recaptchaContext);
    $recaptchaData = json_decode($recaptchaResult, true);

    if ($recaptchaData['success']) {
        // ReCAPTCHA valid, proceed with login
        $requestLogin = $authModel->requestLogin($username, $password);

        if ($requestLogin) {
            session_start();
            $role = $_SESSION['role'];
            echo '<script language="javascript">alert("Login Success!!!")</script>';

            if ($role == 'admin') {
                header('Location: adminhome.php');
                exit();
            } else {
                header('Location: index.php'); // Change to the appropriate location for non-admin users
                exit();
            }
        } else {
            echo '<script language="javascript">alert("Sorry, Login Failed. Please check your email or password!!!")</script>';
        }
    } else {
        // ReCAPTCHA failed, display error message
        echo '<script language="javascript">alert("Invalid reCAPTCHA. Please verify that you are not a robot.")</script>';
    }
}

ob_end_flush();
?>

<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post">
            <div class="row">
                <label for="username">
                    Username:
                    <input type="text" name="username" id="username" placeholder="Input your username..." pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="Input your password..." required="required" />
                </label>
            </div>
            <div class="row">
                <div class="remember">
                    <a href="#">Forget password ?</a>
                </div>
            </div>
            <form action="" method="POST">
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <div class="g-recaptcha" data-sitekey="6LfLjzApAAAAAMiTYui3QLvHzPf43IbXCVA_RmWO"></div>
                <br />
                <div class="row">
                    <button type="submit" name="request_login">Login</button>
                </div>
            </form>
            <div class="row">
                <p>Or via social</p>
                <div class="social-btn-2">
                    <a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
                    <a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
                </div>
            </div>
    </div>
</div>