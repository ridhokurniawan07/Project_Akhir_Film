<?php 
include "koneksi.php";

$genre_id = $_POST['genre_id'];
$genre_name= $_POST['genre_name'];

$result = mysqli_query($conn, "INSERT INTO tb_genre (genre_id, genre_name) 
VALUES ('$genre_id','$genre_name')" );

header("Location:datagenre.php");

 ?>
