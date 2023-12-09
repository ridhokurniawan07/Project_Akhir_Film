<?php
include "koneksi.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $film_id = $_POST['film_id'];
    $user_id = $_POST['user_id'];
    $review_title = $_POST['review_title'];
    $review_content = $_POST['review'];
    $rating = $_POST['rating'];

    // Get the current date
    $current_date = date('Y-m-d');

    // Insert the review into the database
    $insert_review_query = "INSERT INTO tb_review (film_id, user_id, review_title, review, rating, tanggal)
                            VALUES ('$film_id', '$user_id', '$review_title', '$review_content', '$rating', '$current_date')";

    if (mysqli_query($conn, $insert_review_query)) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $insert_review_query . "<br>" . mysqli_error($conn);
    }

    // Close the database connection

    mysqli_close($conn);
}

header('Location: moviesingle.php?film_id=' . $film_id);
