<?php
include_once("../koneksi.php"); // Include your database connection file

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    // Perform the delete operation
    $delete_query = "DELETE FROM tb_user WHERE user_id = $user_id";
    mysqli_query($conn, $delete_query);

    // Redirect or handle success as needed
    header("Location: ../datauser.php");
    exit();
} else {
    // Handle invalid or missing user ID
    echo "Invalid or missing user ID.";
}
