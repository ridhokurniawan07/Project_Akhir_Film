<?php
include_once './models/AuthModel.php';

$authModel = new AuthModel();
$authModel->isAdminAlreadyLogin();

$pageName = "Data Film";
include_once 'pages/admin/components/layer/header.php';
include_once 'pages/admin/components/layer/sidebar.php';
include_once 'pages/admin/datafilm.php';
include_once 'pages/admin/components/layer/footer.php';
?>