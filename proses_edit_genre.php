<?php 
include "connection.php";

$genre_id = $_GET['genre_id'];
$genre_name = $_POST['genre_name'];


mysqli_query($connection, "UPDATE tb_genre SET genre_name='$genre_name' WHERE genre_id ='$genre_id'");

header("Location: datagenre.php");
?>