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
$pageName = "Data Genre";
include_once 'pages/admin/components/layer/header.php';
include_once 'pages/admin/components/layer/sidebar.php';
include_once 'pages/admin/datagenre.php';
include_once 'pages/admin/components/layer/footer.php';
?>