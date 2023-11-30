<?php
    include_once './models/AuthModel.php';

    $authModel = new AuthModel();

    if (isset($_POST['request_sign_up'])) {
        $username    	= $_POST['username'];
        $email    	    = $_POST['email'];
        $password    	= $_POST['password'];
        $rePassword    	= $_POST['rePassword'];
        $role           = 'user';
        
        if ($password == $rePassword) {
            $requestRegister = $authModel->requestRegister($username, $password, $password, $role);

            if ($requestRegister) {
                header('location:#');
            } else {
                echo '<div class="alert alert-secondary" role="alert">Sorry, Something Wrong. Please Try Again</div>';
            }
        } else {
            echo '<div class="alert alert-secondary" role="alert">Sorry, Check your password and Try Again</div>';
        }
    }
?>
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="post">
            <div class="row">
                 <label for="username-2">
                    Username:
                    <input type="text" name="username" id="username-2" placeholder="Input your username" required="required" />
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="email" name="email" id="email-2" placeholder="Input your email" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder="Input your password" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="repassword-2">
                    re-type Password:
                    <input type="password" name="rePassword" id="repassword-2" placeholder="Re-input your password" required="required" />
                </label>
            </div>
           <div class="row">
             <button type="submit" name="request_sign_up">sign up</button>
           </div>
        </form>
    </div>
</div>