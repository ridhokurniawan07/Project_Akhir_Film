<div class="slider movie-items">
	<div class="container">
		<div class="row">
			<div class="social-link">
				<p>Follow us: </p>
				<a href="#"><i class="ion-social-facebook"></i></a>
				<a href="#"><i class="ion-social-twitter"></i></a>
				<a href="#"><i class="ion-social-googleplus"></i></a>
				<a href="#"><i class="ion-social-youtube"></i></a>
			</div>
			<?php
			include "./koneksi.php";
			$query_all = mysqli_query($conn, "SELECT * FROM `tb_film`;");
			?>

			<div class="slick-multiItemSlider">
				<?php
				while ($row = mysqli_fetch_array($query_all)) {
					$film_id = $row['film_id'];
					$average_rating_query = "SELECT AVG(rating) as avg_rating FROM tb_review WHERE film_id = $film_id";
					$average_rating_result = mysqli_query($conn, $average_rating_query);
					$average_rating_row = mysqli_fetch_assoc($average_rating_result);

					// Format the average rating to display only one decimal place
					$average_rating = number_format($average_rating_row['avg_rating'], 1);
				?>
					<div class="movie-item">
						<a href="moviesingle.php?film_id=<?php echo $row['film_id']; ?>">
							<div class="mv-img">
								<img src='images/film/<?php echo $row["film_image"]; ?>' alt='Film Image' width="185" height="284">
							</div>
						</a>
						<div class="title-in">
						<div class="cate">
	    					<span class="blue"><a href="#"><?php echo $row["film_name"]; ?></a></span>
	    				</div>
							<p class="rate">
								<i class="ion-android-star"></i><span><?php echo $average_rating; ?></span> / 10
							</p>
						</div>
					</div>
				<?php } ?>
			</div>

		</div>
	</div>
</div>
<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<?php include_once './components/common/genrelist.php'; ?>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<?php include_once './components/common/spotlight.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="trailers">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-12">
				<div class="title-hd">
					<h2>Trailer</h2>
					<a href="moviegrid.php" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="videos">
					<div class="slider-for-2 video-ft">
						<div>
							<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/RMwKojXV-Dk?si=82rKl9puKz0hAZqF"></iframe>
						</div>
						<div>
							<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/3VkYiatpTVQ?si=ZrbMhwtJYroKpekV"></iframe>
						</div>
						<div>
							<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/IPRBKGxCCZQ?si=1RS4tXrxtp8odc3L"></iframe>
						</div>
						<div>
							<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/2kLyUtVedxo?si=npHKZnG2hLXXb7TZ"></iframe>
						</div>



					</div>
					<?php
					include "./koneksi.php";
					$query_trailer = mysqli_query($conn, "SELECT * FROM `tb_film` LIMIT 4 ;");
					?>
					<div class="slider-nav-2 thumb-ft">
						<?php
						while ($row = mysqli_fetch_array($query_trailer)) {
						?>
							<div class="item">
								<div class="">
									<img src='images/film/<?php echo $row["film_image"]; ?>' alt="photo by Barn Images" style="width: 50px;height: 70px;">
								</div>
								<div class="trailer-infor">
									<h4 class="desc"><?php echo $row['film_name']; ?></h4>
									<p>2:30</p>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>