<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $genre_id = $_POST['genre_id'];
    $new_genre_name = mysqli_real_escape_string($conn, $_POST['genre_name']);

    $update_query = "UPDATE tb_genre SET genre_name = '$new_genre_name' WHERE genre_id = $genre_id";

    $result = mysqli_query($conn, $update_query);

    if ($result) {
        header("Location: datagenre.php");
        exit();
    } else {
        echo "Gagal mengedit genre. Error: " . mysqli_error($conn);
    }
} else {
    echo "Aksi tidak diizinkan.";
}
?>