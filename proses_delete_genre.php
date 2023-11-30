<?php
include "koneksi.php";

$genre_id = $_GET['genre_id'];

$result = mysqli_query($conn, "DELETE FROM tb_genre WHERE genre_id='$genre_id'");

header("Location: datagenre.php");

?>