<?php
$conn = mysqli_connect("localhost", "root", "", "db_film");
$actors_per_page = 9;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $actors_per_page;

$actor_query = mysqli_query($conn, "SELECT * FROM tb_actor LIMIT $actors_per_page OFFSET $offset");
$total_actors_query = mysqli_query($conn, "SELECT COUNT(*) FROM tb_actor");
$total_actors = mysqli_fetch_row($total_actors_query)[0];

$total_pages = ceil($total_actors / $actors_per_page);
?>

<div class="hero common-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1>Actor-List</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="#">Home</a></li>
                        <li> <span class="ion-ios-arrow-right"></span>actor listing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- celebrity grid v1 section-->
<div class="page-single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="topbar-filter" style="width: 790px;">
                    <p>Found <span><?php echo $total_actors; ?> celebrities</span> in total</p>
                    <label>Sort by:</label>
                    <select>
                        <option value="popularity">Popularity Descending</option>
                        <option value="popularity">Popularity Ascending</option>
                        <option value="rating">Rating Descending</option>
                        <option value="rating">Rating Ascending</option>
                        <option value="date">Release date Descending</option>
                        <option value="date">Release date Ascending</option>
                    </select>
                    <a href="actor.php" class="grid"><i class="ion-grid active"></i></a>
                </div>
                <div class="celebrity-items">
                    <?php
                    if ($actor_query !== null) {
                        if (mysqli_num_rows($actor_query) > 0) {
                            while ($actor = mysqli_fetch_array($actor_query)) {
                                ?>
                        <div class="ceb-item">
                            <a href="actorsingle.php?id=<?php echo $actor['actor_id']; ?>"><img src="./images/aktor/<?php echo isset($actor['foto']) ? $actor['foto'] : 'default.jpg'; ?>" alt="<?php echo $actor['name_actor']; ?>" style="width: 280px;"></a>
                            <div class="ceb-infor">
                                <h2><a href=""><?php echo isset($actor['name_actor']) ? $actor['name_actor'] : 'Nama Aktor'; ?></a></h2>
                                <span>ACTOR, <?php echo isset($actor['country']) ? $actor['country'] : 'Negara Aktor'; ?></span>
                            </div>
                        </div>
                    <?php
                            }
                        } else {
                            echo "No actors found.";
                        }
                    } else {
                        echo "Query result is null.";
                    }
                    ?>
				</div>
                
                <div class="topbar-filter" >
                    <label>Reviews per page:</label>
                    <select>
                        <option value="range">9 Reviews</option>
                        <option value="saab">10 Reviews</option>
                    </select>

                    <div class="pagination2">
                        <span>Page <?php echo $page; ?> of <?php echo $total_pages; ?>:</span>
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<a href='actor.php?page=$i'";
                            if ($i == $page) {
                                echo " class='active'";
                            }
                            echo ">$i</a>";
                        }
                        ?>
                        <a href="#"><i class="ion-arrow-right-b"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12">
                <div class="sidebar">
                    <div class="searh-form">
                        <h4 class="sb-title">Search celebrity</h4>
                        <form class="form-style-1 celebrity-form" action="#">
                            <div class="row">
                                <div class="col-md-12 form-it">
                                    <label>Celebrity name</label>
                                    <input type="text" placeholder="Enter keywords">
                                </div>

                                <div class="col-md-12 ">
                                    <input class="submit" type="submit" value="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="ads">
                        <img src="images/uploads/ads1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end of celebrity grid v1 section-->