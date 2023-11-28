<?php
include "koneksi.php";

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
?>
