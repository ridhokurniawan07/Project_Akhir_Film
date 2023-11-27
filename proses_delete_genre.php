<?php
include "connection.php";

$genre_id = $_GET['genre_id'];

$result = mysqli_query($connection, "DELETE FROM tb_genre WHERE genre_id='$genre_id'");

header("Location: datagenre.php");

?>