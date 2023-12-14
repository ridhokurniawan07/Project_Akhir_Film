<?php
    include_once './models/AuthModel.php';

    $authModel = new AuthModel();
    $authModel->isAdminAlreadyLogin();
    
    $pageName = "Data User";
    include_once 'pages/admin/components/layer/header.php';
    include_once 'pages/admin/components/layer/sidebar.php';
    include_once 'pages/admin/datauser.php';
    include_once 'pages/admin/components/layer/footer.php';
?>