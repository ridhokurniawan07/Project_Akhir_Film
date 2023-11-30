<?php
include "../koneksi.php";

$id = $_GET['id'];

// Hapus terlebih dahulu dari tabel anak (tb_film_actor)
mysqli_query($conn, "DELETE FROM tb_film_actor WHERE film_id = '$id' ");

// Kemudian baru hapus dari tabel induk (tb_film)
mysqli_query($conn, "DELETE FROM tb_film WHERE film_id = '$id' ");

header("location:datafilm.php");
mysqli_close($conn);
