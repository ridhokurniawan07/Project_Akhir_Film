<?php 
ob_start();
include_once './models/AuthModel.php';

$authModel = new AuthModel;
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "logout") {
        $current_page = basename($_SERVER['PHP_SELF']);
        $authModel->requestLogout();
        header('location:./' . $current_page);
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<nav class="navbar navbar-default navbar-custom">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header logo">
        <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <div id="nav-icon1">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <a href="./"><img class="logo" src="images/logoo.png" alt="" width="119" height="58" /></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav flex-child-menu menu-left">
            <li class="hidden">
                <a href="#page-top"></a>
            </li>
            <li class="dropdown first">
                <a href="./"> Home </a>
            </li>
            <li class="dropdown first">
                <a href="moviegrid.php"> Movie </a>
            </li>
            <li class="dropdown first">
                <a href="Actor.php"> Actor </a>
            </li>
            <li class="dropdown first">
                <a href="genre.php"> Genre </a>
            </li>
        </ul>

        <ul class="nav navbar-nav flex-child-menu menu-right">
            <?php 
            if (isset($_SESSION['is_login'])) {
                echo '
                <li class="dropdown first">
                    <li class="dropwonfirst"><a href="userprofile.php"><i class="fas fa-user" style="font-size: 20px; margin-top: -10px; margin-right: 10px;"></i></a></li></a>
                </li>
                <li class="btn"><a href="index.php?action=logout">Logout</a></li>
                ';
            } else {
                echo '
                <li class="loginLink"><a id="loginLink" href="#">LOG In</a></li>
                <li class="btn signupLink"><a href="#">sign up</a></li>
                ';
            }
            ?>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
