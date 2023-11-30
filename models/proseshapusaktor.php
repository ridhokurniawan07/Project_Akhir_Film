<?php
include "../koneksi.php";

<<<<<<< HEAD
if (isset($_GET['actor_id'])) {
    $actor_id = $_GET['actor_id'];

    // Hapus data aktor dari database
    $query = "DELETE FROM tb_actor WHERE actor_id = $actor_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman dataaktor.php
        header("Location: dataaktor.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // Jika parameter actor_id tidak ditemukan, arahkan kembali ke halaman dataaktor.php
    header("Location: dataaktor.php");
    exit();
}
=======
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['actor_id'])) {
    $actor_id = $_GET['actor_id'];

    // Hapus referensi aktor dari tabel tb_film_actor
    $deleteFilmActorQuery = "DELETE FROM tb_film_actor WHERE actor_id = '$actor_id'";
    mysqli_query($conn, $deleteFilmActorQuery);

    // Hapus aktor dari tabel tb_actor
    $deleteActorQuery = "DELETE FROM tb_actor WHERE actor_id = '$actor_id'";

    if (mysqli_query($conn, $deleteActorQuery)) {
        echo "Aktor berhasil dihapus.";
    } else {
        echo "Error: " . $deleteActorQuery . "<br>" . mysqli_error($conn);
    }

    // Redirect ke halaman 'dataaktor'
    header("Location: ../dataaktor.php");
    exit();
} else {
    echo "Aktor ID tidak valid.";
}

mysqli_close($conn);
>>>>>>> 48b904a (fixing CRUD Actor)
?>