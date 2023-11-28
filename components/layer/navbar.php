<?php 
include_once './models/AuthModel.php';

$authModel = new AuthModel;

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "logout") {
        $authModel->requestLogout();
        header('location:./');
    }
}
?>

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
        <a href="./"><img class="logo" src="images/logo1.png" alt="" width="119" height="58" /></a>
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
            <li class="dropdown first">
                <a href="userprofile.php"> User Profile </a>
            </li>
        </ul>
        
        <?php 
        if (isset($_SESSION['is_login'])) {
            echo '
            <ul class="nav navbar-nav flex-child-menu menu-right">
                <li class="btn"><a href="index.php?action=logout">Logout</a></li>
                <li class="loginLink hidden"><a id="loginLink" href="#">LOG In</a></li>
            </ul>
        ';
        } else {
            echo '
            <ul class="nav navbar-nav flex-child-menu menu-right">
                <li class="loginLink"><a id="loginLink" href="#">LOG In</a></li>
                <li class="btn signupLink"><a href="#">sign up</a></li>
            </ul>
            ';
        }?>
    </div>
    <!-- /.navbar-collapse -->
</nav>