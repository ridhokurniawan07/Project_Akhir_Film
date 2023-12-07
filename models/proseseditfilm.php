<?php
include_once("../koneksi.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $film_id = $_POST['film_id'];
    $film_name = $_POST['film_name'];
    $genre_id = $_POST['genre_id'];
    $film_release = $_POST['film_release'];
    $film_description = $_POST['film_description'];
    $actors = $_POST['actors']; 

    if ($_FILES['film_image']['size'] > 0) {
        $film_image = $_FILES['film_image']['name'];

        $target_dir = "images/";
        $target_file = $target_dir . basename($film_image);
        move_uploaded_file($_FILES["film_image"]["tmp_name"], $target_file);
        $update_query = "UPDATE tb_film SET 
                            film_name = '$film_name',
                            genre_id = '$genre_id',
                            film_release = '$film_release',
                            film_description = '$film_description',
                            film_image = '$film_image'
                        WHERE film_id = '$film_id'";
    } else {
        $update_query = "UPDATE tb_film SET 
                            film_name = '$film_name',
                            genre_id = '$genre_id',
                            film_release = '$film_release',
                            film_description = '$film_description'
                        WHERE film_id = '$film_id'";
    }
    mysqli_query($conn, $update_query);
    mysqli_query($conn, "DELETE FROM tb_film_actor WHERE film_id = '$film_id'");
  
    foreach ($actors as $actor_id) {
        mysqli_query($conn, "INSERT INTO tb_film_actor (film_id, actor_id) VALUES ('$film_id', '$actor_id')");
    }

    header("Location: ../datafilm.php");
    exit();
}
