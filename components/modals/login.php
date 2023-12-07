<?php
include_once './models/AuthModel.php';

$authModel = new AuthModel();

if (isset($_POST['request_login'])) {
    $username        = $_POST['username'];
    $password        = $_POST['password'];

    $requestLogin = $authModel->requestLogin($username, $password);

    if ($requestLogin) {
        echo '
            <script language="javascript">
                alert("Login Success!!!")
            </script>';
    } else {
        echo '
            <script language="javascript">
                alert("Sorry, Login Failed. Please check your email or password!!!")
            </script>';
    }
}
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