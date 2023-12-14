<?php
include 'koneksi.php';
include_once './models/ActorModel.php';

$actorModel = new ActorModel();

$actor;
// Periksa apakah parameter id tersedia dalam URL
if (isset($_GET['id'])) {
    // Ambil nilai id dari URL
    $actor_id = $_GET['id'];

    // Query ke database
    $actor_query = mysqli_query($conn, "SELECT * FROM tb_actor WHERE actor_id = '$actor_id'");

    // Periksa apakah query berhasil dieksekusi
    if ($actor_query) {
        // Periksa apakah ada data aktor dengan ID yang sesuai
        if (mysqli_num_rows($actor_query) > 0) {
            // Fetch data aktor sebagai objek
            $actorData = mysqli_fetch_array($actor_query);
            $actor = $actorData;
        } 
    } else {
        // Tampilkan pesan kesalahan jika query tidak berhasil
        echo "Error in database query: " . mysqli_error($conn);
    }
} 

if (isset($_GET['actor_name'])) {
    $actorName = urldecode($_GET['actor_name']);
    $data = $actorModel->requestDetailByActorName($actorName);

    if (isset($data)) {
        $actor = $data;
    } 
}

?>

<!-- celebrity single section -->
<div class="hero hero3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Tambahan jika diperlukan -->
            </div>
        </div>
    </div>
</div>

<!-- celebrity single section -->
<div class="page-single movie-single cebleb-single">
    <div class="container">
        <?php 
            if (isset($actor)) {
        ?>
        <div class="row ipad-width">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="mv-ceb">
                    <img src="./images/aktor/<?php echo isset($actor['foto']) ? $actor['foto'] : 'default.jpg'; ?>" alt="<?php echo $actor['name_actor']; ?>">
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="movie-single-ct">
                    <h1 class="bd-hd"><?php echo isset($actor['name_actor']) ? $actor['name_actor'] : ''; ?></h1>
                    <p class="ceb-single">Actor</p>

                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overviewceb">Deskripsi</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="overviewceb" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <p><?php echo isset($actor['actor_description']) ? $actor['actor_description'] : ''; ?></p>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <div class="sb-it">
                                                <h6>Nama:</h6>
                                                <p><a href="#"><?php echo isset($actor['name_actor']) ? $actor['name_actor'] : ''; ?></a></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Tanggal lahir:</h6>
                                                <p><?php echo isset($actor['birth_date']) ? $actor['birth_date'] : ''; ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Negara:</h6>
                                                <p><?php echo isset($actor['country']) ? $actor['country'] : ''; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
            <div class="row ipad-width">
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="movie-single-ct">
                        <h1 class="bd-hd text-center">Actor not found</h1>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
