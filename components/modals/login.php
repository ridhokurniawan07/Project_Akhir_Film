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
            echo '<script language="javascript">alert("Login Success!!!")</script>';

            if (isset($_SESSION['is_admin_login'])) {
                header('Location: adminhome.php');
                exit();
            } else if (isset($_SESSION['is_user_login'])) {
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

if (isset($_POST['request_forgot'])) {

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
        $username       = htmlspecialchars($_POST['username']);
        $password       = htmlspecialchars($_POST['new_password']);
        $confirmPassword = htmlspecialchars($_POST['confirm_password']);

        if ($password == $confirmPassword) {
            $request = $authModel->requestForgotPassword($username, $password);

            if ($request) {
                echo '<script language="javascript">alert("Forgot Password Success!, please login again")</script>';
            } else {
                echo '<script language="javascript">alert("Sorry, Forgot Password Failed. Check your username!!!")</script>';
            }
        } else {
            echo '<script language="javascript">alert("Sorry, Forgot Password Failed. Your password doesnt match!!!")</script>';
        }
    } else {
        // ReCAPTCHA failed, display error message
        echo '<script language="javascript">alert("Invalid reCAPTCHA. Please verify that you are not a robot.")</script>';
    }
}

ob_end_flush();
?>

<div class="login-wrapper" id="login-content">
    <div class="login" id="login">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Login</h3>
            <form method="post">
                <div class="row">
                    <label for="username">
                        Username:
                        <input type="text" name="username" id="login-username-input" placeholder="Input your username..." pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                    </label>
                </div>
                <div class="row">
                    <label for="password">
                        Password:
                        <input type="password" name="password" id="login-password-input" placeholder="Input your password..." required="required" />
                    </label>
                </div>
                <div class="row">
                    <div class="remember">
                        <a id="forgot_button" onclick="presentForgotPassword()">Forget password ?</a>
                    </div>
                </div>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <form action="validate.php" method="POST">
                <div class="g-recaptcha" data-sitekey="6LfLjzApAAAAAMiTYui3QLvHzPf43IbXCVA_RmWO"></div>
                <br/>
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
    <div class="forgot-password hidden" id="forgot-password">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Forgot Password</h3>
            <form method="post">
                <div class="row">
                    <label for="username">
                        Username:
                        <input type="text" name="username" id="forgot-username-input" placeholder="Input your username..." pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                    </label>
                </div>
                <div class="row">
                    <label for="password">
                        Create New Password:
                        <input type="password" name="new_password" id="forgot-new-password" placeholder="Input your New Password..." required="required" />
                    </label>
                </div>
                <div class="row">
                    <label for="password">
                        Confirm Password:
                        <input type="password" name="confirm_password" id="forgot-confirm-password-input" placeholder="Input Confirm your Password..." required="required" />
                    </label>
                </div>
                <div class="row">
                    <div class="remember">
                        <a id="login_button" onclick="presentLogin()">Are you have an Account?</a>
                    </div>
                </div>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <form action="validate.php" method="POST">
                <div class="g-recaptcha" data-sitekey="6LfLjzApAAAAAMiTYui3QLvHzPf43IbXCVA_RmWO"></div>
                <br/>
                <div class="row">
                    <button type="submit" name="request_forgot">Submit</button>
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
    
</div>
