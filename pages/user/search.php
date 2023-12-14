<?php
include_once './models/MovieModel.php';

$movieModel = new MovieModel();
$movieList;

if (isset($_GET['keyword'])) {
	$keyword   = strtolower($_GET['keyword']);
	$data = $movieModel->requestSearch($keyword);

    if ($data != null) {
        foreach ($data as $movie) {
            $rating = $movieModel->requestMovieRating($movie['film_id']);
            $movie['rating']        = $rating; 
            $movieList['movie']     = $movie;
        }
    }
}
?>

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> <?= $pageName ?> - list</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single movie_list">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p>Found <span><?= isset($movieList) ? count($movieList) : 0 ?></span> in total</p>
				</div>
                <?php 
                    if (isset($movieList)) {
                        foreach ($movieList as $movie) {
                            echo '
                            <div class="movie-item-style-2">
                                <img src="images/film/'.$movie['film_image'].'" alt="">
                                <div class="mv-item-infor">
                                    <h6><a href="moviesingle.php?film_id='.$movie['film_id'].'">' . $movie['film_name'] . '<span>(2012)</span></a></h6>
                                    <p class="rate"><i class="ion-android-star"></i><span>' . $movie['rating'] . '</span> /10</p>
                                    <p class="describe">' . $movie['film_description'] . '</p>
                                    <p class="run-time">Release: ' . date_format(date_create($movie['film_release']), 'd M Y') . '</p>
                                    <p>Stars: ';

                            $actorsString = $movie['actors'];
                            $actorsArray = explode(',', $actorsString);
                            foreach ($actorsArray as $actor) {
                                echo '<a href="actorsingle.php?actor_name='.urlencode($actor).'">' . $actor . ',</a>';
                            }

                            echo '</p>
                                </div>
                            </div>';
                        }
                    } else {
                        $notFoundString = isset($_GET['keyword']) ? $_GET['keyword'].' not found' : "Movie not found";
                        echo '
                        <h2 class="text-center" style="padding-bottom: 30px; text-transform: capitalize;">
                            '.$notFoundString.'
                        </h2>
                        ';
                    }
                    
                ?>
				
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="ads">
						<img src="images/uploads/ads1.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
