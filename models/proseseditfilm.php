<?php
include_once("../koneksi.php");

if (isset($_POST['submit'])) {
    // Get data from the form
    $film_id = $_POST['film_id'];
    $film_name = $_POST['film_name'];
    $genre_id = $_POST['genre_id'];
    $film_release = $_POST['film_release'];
    $film_description = $_POST['film_description'];

    // Ensure $actors exists and is an array
    $actors = isset($_POST['actors']) ? $_POST['actors'] : array();

    // Manage image if there is a change
    if ($_FILES['film_image']['name'] != "") {
        $file_name = $_FILES['film_image']['name'];
        $temp_name = $_FILES['film_image']['tmp_name'];

        // Generate a unique filename
        $new_file_name = 'film_' . uniqid() . '_' . $file_name;

        // Set the upload path
        $path = "images/";

        // Move the uploaded file to the specified path with the new filename
        move_uploaded_file($temp_name, $path . $new_file_name);
    } else {
        // If no change in the image, use the existing image
        $query_select_image = "SELECT film_image FROM tb_film WHERE film_id = $film_id";
        $result_select_image = mysqli_query($conn, $query_select_image);

        if ($result_select_image) {
            $row_select_image = mysqli_fetch_assoc($result_select_image);
            $new_file_name = $row_select_image['film_image'];
        } else {
            echo "Error fetching image: " . mysqli_error($conn);
            exit();
        }
    }

    // SQL query to update film data including the new image file
    $query_update_film = "UPDATE tb_film SET film_name='$film_name', genre_id=$genre_id, film_release='$film_release', film_description='$film_description', film_image='$new_file_name' WHERE film_id=$film_id";

    // Execute the update query
    $result_update_film = mysqli_query($conn, $query_update_film);

    // Check the result of the update query
    if ($result_update_film) {
        // Delete all actors connected to the film
        $query_delete_actors = "DELETE FROM tb_film_actor WHERE film_id=$film_id";
        $result_delete_actors = mysqli_query($conn, $query_delete_actors);

        // Check the result of the delete actors query
        if ($result_delete_actors) {
            // Add back the selected actors
            foreach ($actors as $actor_id) {
                $query_insert_actors = "INSERT INTO tb_film_actor (film_id, actor_id) VALUES ($film_id, $actor_id)";
                $result_insert_actors = mysqli_query($conn, $query_insert_actors);

                // Check the result of the insert actors query
                if (!$result_insert_actors) {
                    echo "Error inserting actor: " . mysqli_error($conn);
                    exit();
                }
            }

            // Redirect back to the admin page after the process is complete
            header("Location: ../datafilm.php");
            exit();
        } else {
            echo "Error deleting actors: " . mysqli_error($conn);
            exit();
        }
    } else {
        // If the query fails, display an error message
        echo "Error updating film: " . mysqli_error($conn);
        exit();
    }
} else {
    // If the form is not submitted, redirect to the original page
    header("Location: ../datafilm.php");
    exit();
}
