<?php
include_once("../koneksi.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $film_id = $_POST['film_id'];
    $film_name = $_POST['film_name'];
    $genre_id = $_POST['genre_id'];
    $film_release = $_POST['film_release'];
    $film_description = $_POST['film_description'];
    $actors = $_POST['actors']; // Assuming it's an array
    $film_image = $_FILES['film_image']['name']; // Assuming you are uploading an image

    // Update film information in the database
    $update_query = "UPDATE tb_film SET 
                        film_name = '$film_name',
                        genre_id = '$genre_id',
                        film_release = '$film_release',
                        film_description = '$film_description',
                        film_image = '$film_image'
                    WHERE film_id = '$film_id'";

    mysqli_query($conn, $update_query);

    // Update actor information in the junction table (assuming a many-to-many relationship)
    // Clear existing entries
    mysqli_query($conn, "DELETE FROM tb_film_actor WHERE film_id = '$film_id'");

    // Insert new entries
    foreach ($actors as $actor_id) {
        mysqli_query($conn, "INSERT INTO tb_film_actor (film_id, actor_id) VALUES ('$film_id', '$actor_id')");
    }

    // Upload and move the image file
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["film_image"]["name"]);
    move_uploaded_file($_FILES["film_image"]["tmp_name"], $target_file);

    // Redirect or handle success as needed
    header("Location: ../datafilm.php");
    exit();
}
