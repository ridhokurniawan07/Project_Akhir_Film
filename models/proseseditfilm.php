<?php
include('../koneksi.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Ambil nilai dari formulir edit film
    $film_id = $_POST['film_id'];
    $film_name = $_POST['film_name'];
    $genre_id = $_POST['genre_id'];
    $film_release = $_POST['film_release'];
    $film_description = $_POST['film_description'];
    $actors = $_POST['actors']; // Ini array, karena multiple select
    $film_image = $_FILES['film_image']['name'];

    // Lokasi penyimpanan gambar
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES['film_image']['name']);

    // Upload gambar
    if (move_uploaded_file($_FILES['film_image']['tmp_name'], $target_file)) {
        echo "File berhasil diunggah.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }

    // Update data film ke dalam tabel tb_film
    $updateFilmQuery = "UPDATE tb_film SET
                        film_name = '$film_name',
                        genre_id = '$genre_id',
                        film_release = '$film_release',
                        film_description = '$film_description',
                        film_image = '$film_image'
                        WHERE film_id = '$film_id'";

    if (mysqli_query($conn, $updateFilmQuery)) {
        echo "Data film berhasil diperbarui.";
    } else {
        echo "Error: " . $updateFilmQuery . "<br>" . mysqli_error($conn);
    }

    // Hapus data aktor yang terkait film dari tabel tb_film_actor
    $deleteActorsQuery = "DELETE FROM tb_film_actor WHERE film_id = '$film_id'";
    mysqli_query($conn, $deleteActorsQuery);

    // Tambahkan data aktor yang baru dipilih
    foreach ($actors as $actor) {
        // Ambil actor_id berdasarkan nama aktor
        $getActorIdQuery = "SELECT actor_id FROM tb_actor WHERE name_actor = '$actor'";
        $result = mysqli_query($conn, $getActorIdQuery);
        $row = mysqli_fetch_assoc($result);
        $actor_id = $row['actor_id'];

        // Tambahkan data ke dalam tb_film_actor
        $addActorQuery = "INSERT INTO tb_film_actor (film_id, actor_id) VALUES ('$film_id', '$actor_id')";
        mysqli_query($conn, $addActorQuery);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
