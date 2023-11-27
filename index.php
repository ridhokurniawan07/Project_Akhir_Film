<?php
// Mulai sesi
session_start();

// Periksa apakah pengguna telah login
$isLoggedIn = isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true;

// Dapatkan id_user dari sesi (pastikan sesi sudah disetel setelah login)
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<!-- index14:58-->

<head>
	<!-- Basic need -->
	<title>Open Pediatrics</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

	<!--Google Font-->
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<!--preloading-->
	<div id="preloader">
		<img class="logo" src="images/logo1.png" alt="" width="119" height="58">
		<div id="status">
			<span></span>
			<span></span>
		</div>
	</div>
	<!--end of preloading-->

	<!--login form popup-->
	<div class="login-wrapper" id="login-content">
		<div class="login-content">
			<a href="#" class="close">x</a>
			<h3>Login</h3>
			<form method="post" action="login.php">
				<div class="row">
					<label for="username">
						Username:
						<input type="text" name="username" id="username" placeholder="Masukkan Username Anda" required="required" />
					</label>
				</div>
				<div class="row">
					<label for="password">
						Password:
						<input type="password" name="password" id="password" placeholder="Masukkan Password Anda" required="required" />
					</label>
				</div>
				<div class="row">
					<button type="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
	<!--end of login form popup-->
	<!--signup form popup-->
	<div class="login-wrapper" id="signup-content">
		<div class="login-content">
			<a href="#" class="close">x</a>
			<h3>sign up</h3>
			<form method="post" action="registrasi.php">
				<div class="row">
					<label for="username-2">
						Name:
						<input type="text" name="name" placeholder="Masukkan Nama Anda" required="required" />
					</label>
				</div>
				<div class="row">
					<label for="username-2">
						Username:
						<input type="text" name="username" id="username-2" placeholder="Masukkan Username Anda" required="required" />
					</label>
				</div>
				<div class="row">
					<label for="password-2">
						Password:
						<input type="password" name="password" id="password-2" placeholder="Masukkan Password Anda" required="required" />
					</label>
				</div>
				<div class="row">
					<button type="submit">sign up</button>
				</div>
			</form>
		</div>
	</div>
	<!--end of signup form popup-->

	<!-- BEGIN | Header -->
	<header class="ht-header">
		<div class="container">
			<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
					<div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
					<a href="index.php"><img class="logo" src="images/logo1.png" alt="" width="119" height="58"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a href="#"> Home </a>
						</li>
						<li class="dropdown first">
							<a href="moviegrid.php"> Movie </a>
						</li>
						<li class="dropdown first">
							<a href="actor.php"> Actor </a>
						</li>
						<li class="dropdown first">
							<a href="genre.php"> Genre </a>
						</li>
						<?php

						if ($isLoggedIn) {
							echo '<li class="dropdown first"><a href="userprofile.php"> User Profile </a></li>';
						}
						?>
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">
						<?php
						if ($isLoggedIn) {
							echo '<li class="" style="background-color: #dd003f;
							color: #ffffff;
							padding: 11px 25px;
							-webkit-border-radius: 20px;
							-moz-border-radius: 20px;
							border-radius: 20px;"><a href="logout.php">Logout</a></li>';
						} else {
							echo '<li class="loginLink"><a href="#">LOG In</a></li>';
							echo '<li class="btn signupLink"><a href="#">Sign Up</a></li>';
						}
						?>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</nav>

			<!-- top search form -->
			<div class="top-search">
				<select>
					<option value="united">Movie</option>
					<option value="saab">Others</option>
				</select>
				<input type="text" placeholder="Search for a movie that you are looking for">
			</div>
		</div>
	</header>
	<!-- END | Header -->

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
				<div class="slick-multiItemSlider">
					<div class="movie-item">
						<div class="mv-img">
							<a href="#"><img src="images/uploads/slider1.jpg" alt="" width="285" height="437"></a>
						</div>
						<div class="title-in">
							<div class="cate">
								<span class="blue"><a href="#">Sci-fi</a></span>
							</div>
							<h6><a href="#">Interstellar</a></h6>
							<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="movie-items">
		<div class="container">
			<div class="row ipad-width">
				<div class="col-md-8">
					<div class="title-hd">
						<h2>Genre</h2>
						<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
					</div>
					<div class="tabs">
						<ul class="tab-links">
							<li class="active"><a href="#tab1">#Action</a></li>
							<li><a href="#tab2"> #Comedy</a></li>
							<li><a href="#tab3"> #Romance </a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab active">
								<div class="row">
									<div class="slick-multiItem">
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="tab2" class="tab">
								<div class="row">
									<div class="slick-multiItem">
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item5.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="tab3" class="tab">
								<div class="row">
									<div class="slick-multiItem">
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="#">Interstellar</a></h6>
													<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="sidebar">
						<div class="ads">
							<img src="images/uploads/ads1.png" alt="" width="336" height="296">
						</div>
						<div class="celebrities">
							<h4 class="sb-title">Spotlight Celebrities</h4>
							<div class="celeb-item">
								<a href="#"><img src="images/uploads/ava1.jpg" alt="" width="70" height="70"></a>
								<div class="celeb-author">
									<h6><a href="#">Samuel N. Jack</a></h6>
									<span>Actor</span>
								</div>
							</div>
							<a href="#" class="btn">See all celebrities<i class="ion-ios-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="trailers">
		<div class="container">
			<div class="row ipad-width">
				<div class="col-md-12">
					<div class="title-hd">
						<h2>Trailer</h2>
						<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
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
						<div class="slider-nav-2 thumb-ft">
							<div class="item">
								<div class="trailer-img">
									<img src="images/uploads/trailer7.jpg" alt="photo by Barn Images" width="4096" height="2737">
								</div>
								<div class="trailer-infor">
									<h4 class="desc">Wonder Woman</h4>
									<p>2:30</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 -->

	<!-- footer section-->
	<footer class="ht-footer">
		<div class="container">
			<div class="flex-parent-ft">
				<div class="flex-child-ft item1">
					<a href="index.php"><img class="logo" src="images/logo1.png" alt=""></a>
					<p>5th Avenue st, manhattan<br>
						New York, NY 10001</p>
					<p>Call us: <a href="#">(+01) 202 342 6789</a></p>
				</div>
				<div class="flex-child-ft item2">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">About</a></li>
						<li><a href="#">Blockbuster</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Forums</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Help Center</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item3">
					<h4>Legal</h4>
					<ul>
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Security</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item4">
					<h4>Account</h4>
					<ul>
						<li><a href="#">My Account</a></li>
						<li><a href="#">Watchlist</a></li>
						<li><a href="#">Collections</a></li>
						<li><a href="#">User Guide</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item5">
					<h4>Newsletter</h4>
					<p>Subscribe to our newsletter system now <br> to get latest news from us.</p>
					<form action="#">
						<input type="text" placeholder="Enter your email...">
					</form>
					<a href="#" class="btn">Subscribe now <i class="ion-ios-arrow-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="ft-copyright">
			<div class="ft-left">
				<p><a target="_blank" href="">Kelompok 6</a></p>
			</div>
			<div class="backtotop">
				<p><a href="#" id="back-to-top">Back to top <i class="ion-ios-arrow-thin-up"></i></a></p>
			</div>
		</div>
	</footer>
	<!-- end of footer section-->

	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
</body>

<!-- index14:58-->

</html>