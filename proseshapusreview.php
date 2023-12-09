<?php
include "koneksi.php";

// Check if the review_id is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $review_id = $_GET['id'];

    // Query to delete the review based on review_id
    $delete_review_query = "DELETE FROM tb_review WHERE review_id = $review_id";

    if (mysqli_query($conn, $delete_review_query)) {
        // Redirect to the page showing the remaining reviews or any other desired page
        header("Location: DataReview.php");
        exit();
    } else {
        // Display an error message if deletion fails
        echo "Error deleting review: " . mysqli_error($conn);
    }
} else {
    // Redirect to the page showing the remaining reviews or any other desired page
    header("Location: DataReview.php");
    exit();
}

mysqli_close($conn);
?>
