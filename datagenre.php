<?php 
include_once './models/GenreModel.php';

$genreModel = new GenretModel;

if (isset($_POST['request-create-genre'])) {
    $genreName  = $_POST['genre_name'];

    if ($genreModel->requestCreateGenre($genreName)) {
        header('location:#');
    } else {
        echo '<div class="alert alert-secondary" role="alert">Sorry, Something Wrong. Please try again</div>';
    }
}

if (isset($_POST['request-update-genre'])) {
    $genreId  = $_POST['genre_id'];
    $genreName  = $_POST['genre_name'];

    if ($genreModel->requestUpdateGenre($genreId, $genreName)) {
        header('location:datagenre.php');
    } else {
        echo '<div class="alert alert-secondary" role="alert">Sorry, Something Wrong. Please try again</div>';
    }
}

if (isset($_GET['action']) && isset($_GET['genre_id'])) {
    $action = $_GET['action'];
    $genreId = $_GET['genre_id'];

    if ($action == "delete") {
        $requestDelete = $genreModel->requestDeleteGenre($genreId);
        if ($requestDelete) {
            header('location:datagenre.php');
        } else {
            echo '<div class="alert alert-secondary" role="alert">Sorry, Something Wrong. Please try again</div>';

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>

    <link rel="stylesheet" href="dist/assets/css/main/app.css">
    <link rel="stylesheet" href="dist/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="dist/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="dist/assets/images/logo/favicon.png" type="image/png">

    <style>
        .btn-edit {
            background-color: #008000;
            color: white;
        }
    </style>

    <link rel="stylesheet" href="dist/assets/css/shared/iconly.css">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="adminhome.php">AdminHome.</a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">

                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>

                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="adminhome.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data user</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="datauser.php">User</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data Genre</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="datagenre.php">Genre</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Data Film</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="datafilm.php">Film</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Data Aktor</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="dataaktor.php">Aktor</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Sign-Out</li>

                        <div class="sidebar-item  has-sub"></div>
                        <a href="logout.php" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Logout</span>
                        </a>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Data Genre</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="adminhome.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">datakategori</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="buttons">
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                        Tambahkan Genre
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Genre</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 0;
                                        $genreList = $genreModel->requestGenreList();
                                        if (isset($genreList)) {
                                            foreach ($genreList as $genre) {
                                                $no++;
                                                include './pages/admin/components/cell/genre_cell.php';
                                                include './pages/admin/components/modals/edit_genre_modal.php';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </section>
                </div>
            </div>
        </div>

        <?php include_once './pages/admin/components/modals/create_genre_modal.php';?>
        <script src="dist/assets/js/bootstrap.js"></script>
        <script src="dist/assets/js/app.js"></script>

        <!-- Need: Apexcharts -->
        <script src="dist/assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="dist/assets/js/pages/dashboard.js"></script>

</body>

</html>