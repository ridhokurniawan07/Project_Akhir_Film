<?php
include_once './models/AuthModel.php';

$authModel = new AuthModel();
$authModel->isAdminAlreadyLogin();

$pageName = "Data Aktor";
include "koneksi.php";
$query = mysqli_query($conn, "SELECT * FROM tb_actor ORDER BY actor_id asc");

include_once 'pages/admin/components/layer/header.php';
include_once 'pages/admin/components/layer/sidebar.php';
include_once 'pages/admin/dataaktor.php';
include_once 'pages/admin/components/layer/footer.php';
