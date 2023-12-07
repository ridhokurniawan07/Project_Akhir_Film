<?php
include('koneksi.php');

// Ambil data formulir registrasi
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

// Simpan data ke database
$query = "INSERT INTO tb_user (name, username, password, role) VALUES ('$name', '$username', '$password', 'user')";

// Jalankan query ke database
$result = mysqli_query($conn, $query);

// Periksa hasil query
if ($result) {
    // Registrasi berhasil
    header('Location: index.php');
    exit();
} else {
    // Registrasi gagal, tampilkan pesan kesalahan
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
