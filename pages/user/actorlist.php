<div class="hero hero3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h1> movie listing - list</h1>
                <ul class="breadcumb">
                    <li class="active"><a href="#">Home</a></li>
                    <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>

<!-- celebrity single section -->
<div class="page-single movie-single cebleb-single">
    <div class="container">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "db_film");

        $actor_query = mysqli_query($conn, "SELECT * FROM tb_actor");
        if ($actor_query !== null && mysqli_num_rows($actor_query) > 0) {
            while ($actor = mysqli_fetch_array($actor_query)) {
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

        <?php
            }
        } else {
            echo "No actors found.";
        }
        ?>
    </div>
</div>
<!-- celebrity single section -->
