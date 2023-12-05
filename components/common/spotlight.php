<div class="celebrities">
    <h4 class="sb-title">Spotlight Celebrities</h4>
    <?php
        include "./koneksi.php";
        $query_actor = mysqli_query($conn, "SELECT * FROM `tb_actor` LIMIT 3;");
    ?>
    <?php while ($row = mysqli_fetch_array($query_actor)) { ?>
        <div class="celeb-item">
            <a href="#"><img src='images/<?php echo $row['foto']; ?>'  alt="" width="70" height="70"></a>
            <div class="celeb-author">
                <h6><?php echo $row['name_actor']; ?></h6>
                <span><?php echo $row['country']; ?></span>
            </div>
        </div>
    <?php } ?>	
    <a href="actor.php" class="btn">See all celebrities<i class="ion-ios-arrow-right"></i></a>
</div>
