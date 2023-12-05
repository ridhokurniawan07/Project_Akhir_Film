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
			
	    	<div  class="slick-multiItemSlider">
				<?php 
					while ($row = mysqli_fetch_array($query_all)) { 
				?>
	    		<div class="movie-item">
					<div class="mv-img">
						<a href="moviesingle.php"><img src='images/<?php echo $row["film_image"]; ?>' alt='Film Image'  width="185" height="284"></a>
					</div> 
					<div class="title-in">
						<div class="cate">
							<span class="blue"><?php echo $row['film_name']; ?></span>
						</div>
						<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
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
				<?php include_once './components/common/genrelist.php';?>
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
					    	<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/1Q8fG0TtVAY"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/w0qQkSuWOS8"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/44LdLqgOpjo"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/gbug3zTm3Ws"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/e3Nl_TCQXuw"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="#" data-src="https://www.youtube.com/embed/NxhEZG0k9_w"></iframe>
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
							<img src='images/<?php echo $row["film_image"]; ?>'  alt="photo by Barn Images" style="width: 50px;height: 70px;">
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