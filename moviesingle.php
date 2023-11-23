<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)]><!-->
<html lang="en" class="no-js">
<!-- moviesingle07:38-->

<head>
    <!-- Basic need -->
    <title>Open Pediatrics</title>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="profile" href="#" />
    <!--Google Font-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600" />
    <!-- Mobile specific meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone-no" />
    <!-- CSS files -->
    <link rel="stylesheet" href="css/plugins.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
        /* Styles for the modal overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        /* Styles for the modal content */
        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 60%;
            /* Adjust the width as needed */
            max-width: 600px;
            /* Set a maximum width if desired */
            height: auto;
            /* You can set a fixed height if needed */
            position: relative;
            margin: auto;
        }

        /* Styles for the close button */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            text-decoration: none;
            color: #333;
        }

        /* Styles for the review form */
        #review-form {
            display: flex;
            flex-direction: column;
        }

        .rating {
            display: flex;
            justify-content: center;
            align-items: center;
            unicode-bidi: bidi-override;
            direction: rtl;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 25px;
            color: #ccc;
            display: inline-block;
            padding: 5px;
            cursor: pointer;
        }

        .rating label:hover,
        .rating label:hover~label,
        .rating input:checked~label {
            color: #ffcc00;
        }
    </style>
</head>

<body>
    <!--preloading-->
    <div id="preloader">
        <img class="logo" src="images/logo1.png" alt="" width="119" height="58" />
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
            <form method="post" action="#">
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
            <form method="post" action="#">
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
                    <a href="index-2.html"><img class="logo" src="images/logo1.png" alt="" width="119" height="58" /></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav flex-child-menu menu-left">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="dropdown first">
                            <a href="index.php"> Home </a>
                        </li>
                        <li class="dropdown first">
                            <a href="moviegrid.php"> Movie </a>
                        </li>
                        <li class="dropdown first">
                            <a href="Actor.php"> Actor </a>
                        </li>
                        <li class="dropdown first">
                            <a href="genre.php"> Genre </a>
                        </li>
                        <li class="dropdown first">
                            <a href="userprofile.php"> User Profile </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav flex-child-menu menu-right">
                        <!-- <li class="loginLink"><a href="#">LOG In</a></li> -->
                        <li class="btn signupLink"><a href="#">Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <!-- top search form -->
            <div class="top-search">
                <select>
                    <option value="united">Movie</option>
                </select>
                <input type="text" placeholder="Search for a movie" />
            </div>
        </div>
    </header>
    <!-- END | Header -->
    <div class="hero mv-single-hero">
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
    <div class="page-single movie-single movie_single">
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="movie-img sticky-sb">
                        <img src="images/uploads/movie-single.jpg" alt="" />
                        <div class="movie-btn">
                            <div class="btn-transform transform-vertical red">
                                <div>
                                    <a href="#" class="item item-1 redbtn">
                                        <i class="ion-play"></i> Watch Trailer</a>
                                </div>
                                <div>
                                    <a href="https://www.youtube.com/embed/o-0hcF97wy0" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct main-content">
                        <h1 class="bd-hd">
                            Skyfall: Quantum of Spectre <span>2015</span>
                        </h1>
                        <div class="movie-rate">
                            <div class="rate">
                                <i class="ion-android-star"></i>
                                <p>
                                    <span>8.1</span> /10<br />
                                    <span class="rv">56 Reviews</span>
                                </p>
                            </div>
                            <div class="rate-star">
                                <p>Rate This Movie:</p>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star-outline"></i>
                            </div>
                        </div>
                        <div class="movie-tabs">
                            <div class="tabs">
                                <ul class="tab-links tabs-mv">
                                    <li class="active"><a href="#overview">Overview</a></li>
                                    <li><a href="#reviews"> Reviews</a></li>
                                    <li><a href="#cast"> Cast</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="overview" class="tab active">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <p>
                                                    Tony Stark creates the Ultron Program to protect the
                                                    world, but when the peacekeeping program becomes
                                                    hostile, The Avengers go into action to try and
                                                    defeat a virtually impossible enemy together.
                                                    Earth's mightiest heroes must come together once
                                                    again to protect the world from global extinction.
                                                </p>
                                                <div class="title-hd-sm">
                                                    <h4>cast</h4>
                                                </div>
                                                <!-- movie cast -->
                                                <div class="mvcast-item">
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                            <img src="images/uploads/cast1.jpg" alt="" />
                                                            <a href="#">Robert Downey Jr.</a>
                                                        </div>
                                                        <p>... Robert Downey Jr.</p>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="sb-it">
                                                    <h6>Cast:</h6>
                                                    <p>
                                                        <a href="#">Robert Downey Jr,</a>
                                                        <a href="#">Chris Evans,</a>
                                                        <a href="#">Mark Ruffalo,</a><a href="#"> Scarlett Johansson</a>
                                                    </p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Genres:</h6>
                                                    <p>
                                                        <a href="#">Action, </a> <a href="#"> Sci-Fi,</a>
                                                        <a href="#">Adventure</a>
                                                    </p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Release Date:</h6>
                                                    <p>May 1, 2015 (U.S.A)</p>
                                                </div>
                                                <div class="ads">
                                                    <img src="images/uploads/ads1.png" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="write-review-modal" class="modal-overlay">
                                        <div class="modal-content">
                                            <div class="rv-hd">
                                                <h3>Write a Review</h3>
                                                <a href="#" id="close-write-review" class="close">x</a>
                                            </div>
                                            <div class="mv-user-review-item">
                                                <div class="user-infor">
                                                    <div>
                                                        <form id="review-form" action="#" method="post">
                                                            <div class="rating">
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1">★</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2">★</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3">★</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4">★</label>
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5">★</label>
                                                                <input type="radio" id="star6" name="rating" value="6" />
                                                                <label for="star6">★</label>
                                                                <input type="radio" id="star7" name="rating" value="7" />
                                                                <label for="star7">★</label>
                                                                <input type="radio" id="star8" name="rating" value="8" />
                                                                <label for="star8">★</label>
                                                                <input type="radio" id="star9" name="rating" value="9" />
                                                                <label for="star9">★</label>
                                                                <input type="radio" id="star10" name="rating" value="10" />
                                                                <label for="star10">★</label>
                                                            </div>
                                                            <label for="review-title">Review Title:</label>
                                                            <input type="text" id="review-title" name="review-title" required />
                                                            <label for="user-review">Your Review:</label>
                                                            <textarea id="user-review" name="user-review" rows="5" required></textarea>
                                                            <button type="submit" class="redbtn" style="margin-top: 10px">
                                                                Submit Review
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="reviews" class="tab review">
                                        <div class="row">
                                            <div class="rv-hd">
                                                <div class="div">
                                                    <h3>Related Movies To</h3>
                                                    <h2>Skyfall: Quantum of Spectre</h2>
                                                </div>
                                                <a href="#" id="write-review-btn" class="redbtn">Write Review</a>
                                            </div>
                                            <div class="topbar-filter">
                                                <p>Found <span>56 reviews</span> in total</p>
                                                <label>Filter by:</label>
                                                <select>
                                                    <option value="popularity">
                                                        Popularity Descending
                                                    </option>
                                                    <option value="popularity">
                                                        Popularity Ascending
                                                    </option>
                                                    <option value="rating">Rating Descending</option>
                                                    <option value="rating">Rating Ascending</option>
                                                    <option value="date">
                                                        Release date Descending
                                                    </option>
                                                    <option value="date">Release date Ascending</option>
                                                </select>
                                            </div>
                                            <div class="mv-user-review-item">
                                                <div class="user-infor">
                                                    <img src="images/uploads/userava1.jpg" alt="" />
                                                    <div>
                                                        <h3>Best Marvel movie in my opinion</h3>
                                                        <div class="no-star">
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star last"></i>
                                                        </div>
                                                        <p class="time">
                                                            17 December 2016 by
                                                            <a href="#"> hawaiipierson</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <p>
                                                    This is by far one of my favorite movies from the
                                                    MCU. The introduction of new Characters both good
                                                    and bad also makes the movie more exciting. giving
                                                    the characters more of a back story can also help
                                                    audiences relate more to different characters
                                                    better, and it connects a bond between the audience
                                                    and actors or characters. Having seen the movie
                                                    three times does not bother me here as it is as
                                                    thrilling and exciting every time I am watching it.
                                                    In other words, the movie is by far better than
                                                    previous movies (and I do love everything Marvel),
                                                    the plotting is splendid (they really do out do
                                                    themselves in each film, there are no problems
                                                    watching it more than once.
                                                </p>
                                            </div>
                                            <div class="topbar-filter">
                                                <label>Reviews per page:</label>
                                                <select>
                                                    <option value="range">5 Reviews</option>
                                                    <option value="saab">10 Reviews</option>
                                                </select>
                                                <div class="pagination2">
                                                    <span>Page 1 of 6:</span>
                                                    <a class="active" href="#">1</a>
                                                    <a href="#">2</a>
                                                    <a href="#">3</a>
                                                    <a href="#">4</a>
                                                    <a href="#">5</a>
                                                    <a href="#">6</a>
                                                    <a href="#"><i class="ion-arrow-right-b"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="cast" class="tab">
                                        <div class="row">
                                            <h3>Cast Of</h3>
                                            <h2>Avengers: Age of Ultron</h2>
                                            <div class="title-hd-sm">
                                                <h4>Cast</h4>
                                            </div>
                                            <div class="mvcast-item">
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                        <img src="images/uploads/cast1.jpg" alt="" />
                                                        <a href="#">Robert Downey Jr.</a>
                                                    </div>
                                                    <p>... Robert Downey Jr.</p>
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
        </div>
    </div>
    <!-- footer section-->
    <footer class="ht-footer">
        <div class="container">
            <div class="flex-parent-ft">
                <div class="flex-child-ft item1">
                    <a href="index-2.html"><img class="logo" src="images/logo1.png" alt="" /></a>
                    <p>
                        5th Avenue st, manhattan<br />
                        New York, NY 10001
                    </p>
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
                    <p>
                        Subscribe to our newsletter system now <br />
                        to get latest news from us.
                    </p>
                    <form action="#">
                        <input type="text" placeholder="Enter your email..." />
                    </form>
                    <a href="#" class="btn">Subscribe now <i class="ion-ios-arrow-forward"></i></a>
                </div>
            </div>
        </div>
        <div class="ft-copyright">
            <div class="ft-left">
                <p>
                    <a target="_blank" href="https://www.templateshub.net">Templates Hub</a>
                </p>
            </div>
            <div class="backtotop">
                <p>
                    <a href="#" id="back-to-top">Back to top <i class="ion-ios-arrow-thin-up"></i></a>
                </p>
            </div>
        </div>
    </footer>
    <!-- end of footer section-->
    <script>
        // Fungsi untuk membuka modal review
        function openWriteReviewModal() {
            document.getElementById("write-review-modal").style.display = "flex";
        }
        // Fungsi untuk menutup modal review
        function closeWriteReviewModal() {
            document.getElementById("write-review-modal").style.display = "none";
        }
        // Event listener untuk membuka modal saat tombol Write Review diklik
        document
            .getElementById("write-review-btn")
            .addEventListener("click", openWriteReviewModal);
        // Event listener untuk menutup modal saat tombol Close diklik
        document
            .getElementById("close-write-review")
            .addEventListener("click", closeWriteReviewModal);
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/plugins2.js"></script>
    <script src="js/custom.js"></script>
</body>
<!-- moviesingle11:03-->

</html>