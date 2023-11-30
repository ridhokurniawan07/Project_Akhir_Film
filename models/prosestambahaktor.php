<?php

    $name_actor = $_POST['name_actor'];
    $birth_date = $_POST['birth_date'];
    $country = $_POST['country'];
    $actor_description = $_POST['actor_description'];

    include "../koneksi.php";

    //menampung data file yang diupload
    $filename = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    $type1 = explode('.', $filename);
    $type2 = $type1[1];

    $newname = 'aktor'.time().'.'.$type2;

    //menampung data format file yang diizinkan
    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

    //validasi format file
    if(!in_array($type2, $tipe_diizinkan)){
    //jika format file tidak ada di dalam tipe diizinkan
    echo '<script>alert("Format file tidak diizinkan")</script>';

    }else{
     //jika format file sesuai dengan yang ada di dalam array tipe diizinkan
    //proses upload file sekaligus insert ke database
    move_uploaded_file($tmp_name, './images/aktor/' .$newname);
    

    $insert = mysqli_query($conn, "INSERT INTO tb_actor (name_actor, birth_date, country, actor_description, foto) VALUES (
        '".$name_actor."',
        '".$birth_date."',
        '".$country."',
        '".$actor_description."',
        '".$newname."'
    ) ");


    if($insert){
    echo '<script>alert("Tambah data berhasil")</script>';
    echo '<script>window.location="dataaktor.php"</script>';
    }else{
    echo 'gagal' .mysqli_error($conn);
    }
}

?>