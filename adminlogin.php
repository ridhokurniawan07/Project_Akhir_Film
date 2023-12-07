<?php 
$pageName = "Admin Login";
include_once 'components/layer/header.php'; 
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
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"831dd52b5d0d8b5a","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
    </body>
</html>
