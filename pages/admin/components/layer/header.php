<?php 
if ($pageName != "Admin Login") {
    include_once './models/AuthModel.php';
    $authModel = new AuthModel();
    if (!$authModel->isAdminAlreadyLogin()) {
        echo '
        <script language="javascript">
            alert("Access Denied!!!")
        </script>';
        header('Location: adminlogin.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageName ?></title>

    <link rel="stylesheet" href="./dist/assets/css/main/app.css">
    <link rel="stylesheet" href="./dist/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="./dist/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="./dist/assets/images/logo/favicon.png" type="image/png">

    <style>
        .btn-edit {
            background-color: #008000;
            color: white;
        }
    </style>

    <link rel="stylesheet" href="./dist/assets/css/shared/iconly.css">

</head>

<body>
    
<div id="app">
        