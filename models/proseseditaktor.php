<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    // Get data from the form
    $actor_id = $_POST['actor_id'];
    $name_actor = $_POST['name_actor'];
    $birth_date = $_POST['birth_date'];
    $country = $_POST['country'];
    $actor_description = $_POST['actor_description'];

    // Check if a new image file is uploaded
    if ($_FILES['gambar']['name'] != "") {
        $file_name = $_FILES['gambar']['name'];
        $temp_name = $_FILES['gambar']['tmp_name'];
        $file_type = $_FILES['gambar']['type'];

        // Generate a unique filename
        $new_file_name = 'aktor_' . uniqid() . '_' . $file_name;

        // Set the upload path
        $path = "./images/aktor/";

        // Move the uploaded file to the specified path with the new filename
        move_uploaded_file($temp_name, $path . $new_file_name);

        // Update the data with the new image file
        $query = "UPDATE tb_actor SET name_actor='$name_actor', birth_date='$birth_date', country='$country', actor_description='$actor_description', foto='$new_file_name' WHERE actor_id=$actor_id";
    } else {
        // Update the data without changing the image file
        $query = "UPDATE tb_actor SET name_actor='$name_actor', birth_date='$birth_date', country='$country', actor_description='$actor_description' WHERE actor_id=$actor_id";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // If the query is successful, redirect to the original page
<<<<<<< HEAD
        header("Location: dataaktor.php");
=======
        header("Location: ../dataaktor.php");
>>>>>>> 48b904a (fixing CRUD Actor)
        exit();
    } else {
        // If the query fails, display an error message
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    // If the form is not submitted, redirect to the original page
<<<<<<< HEAD
    header("Location: dataaktor.php");
    exit();
}
=======
    header("Location: ../dataaktor.php");
    exit();
}
?>
>>>>>>> 48b904a (fixing CRUD Actor)
