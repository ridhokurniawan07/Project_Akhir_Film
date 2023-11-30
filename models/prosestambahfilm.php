<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $film_name = $_POST["film_name"];
    $genre_id = $_POST["genre_id"];
    $film_release = $_POST["film_release"];
    $film_description = $_POST["film_description"];
    $actor_ids = $_POST["actor_id"]; // Ini akan menjadi array karena menggunakan multiple="multiple"
    $film_image = $_FILES["film_image"]["name"];

    // Target direktori untuk menyimpan gambar
    $target_dir = "images/";

    // Upload gambar ke server
    $target_file = $target_dir . basename($_FILES["film_image"]["name"]);
    move_uploaded_file($_FILES["film_image"]["tmp_name"], $target_file);

    // Masukkan data ke dalam tabel tb_film
    $query_insert_film = "INSERT INTO tb_film (genre_id, film_name, film_release, film_description, film_image) 
                    VALUES ('$genre_id', '$film_name', '$film_release', '$film_description', '$film_image')";

    if (mysqli_query($conn, $query_insert_film)) {
        // Ambil ID film yang baru saja dimasukkan
        $last_inserted_film_id = mysqli_insert_id($conn);

        // Masukkan data aktor ke dalam tabel relasi tb_film_actor
        foreach ($actor_ids as $actor_id) {
            mysqli_query($conn, "INSERT INTO tb_film_actor (film_id, actor_id) VALUES ('$last_inserted_film_id', '$actor_id')");
        }

        echo "Film berhasil ditambahkan.";
    } else {
        echo "Error: " . $query_insert_film . "<br>" . mysqli_error($conn);
    }
}

// Tutup koneksi
mysqli_close($conn);

header("location:datafilm.php");
