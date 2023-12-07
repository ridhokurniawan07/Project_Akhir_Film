<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Gunakan prepared statements untuk mencegah SQL injection
    $sql = "SELECT user_id, username, role FROM tb_user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Memulai sesi
        session_start();

        // Set nilai sesi
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        // Tentukan halaman yang sesuai berdasarkan peran (role)
        if ($row['role'] == 'admin') {
            header('Location: adminhome.php');
        } else {
            header('Location: index.php');
        }
        exit();
    } else {
        echo "Username atau password salah";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
