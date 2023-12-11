
<?php
include_once './models/AuthModel.php';

$authModel = new AuthModel();

if (isset($_POST['request_login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $role       = "admin";

    $requestLogin = $authModel->requestLogin($username, $password, $role);

    if ($requestLogin) {
        echo '
        <script language="javascript">
            alert("Login Success!!!")
        </script>';

        header('Location: adminhome.php');
    } else {
        echo '
        <script language="javascript">
            alert("Sorry, Login Failed. Please check your email or password!!!")
        </script>';
    }
}

$pageName = "Admin Login";
include_once 'pages/admin/components/layer/header.php';
?>

<div class="container bg-body" style="position: relative; margin-top: 10%; padding-top: 3%; padding-bottom: 3%">
    <div class="block">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 pb-4">
                <h1>Login</h1><br/>
                <form method="POST">
                    <div class="form-group">
                        <label class="text-black" for="username">Username</label>
                        <input type="text" class="form-control" id="emusernameail" name="username" required>
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary" name="request_login">Login</button>
                </form><br/>
            </div>
        </div>
    </div>
</div>

<?php 

include_once 'pages/admin/components/layer/footer.php';
?>