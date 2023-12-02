<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!-- Basic need -->
    <title><?= $pageName ?></title>
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
    <?php 
      $isWriteReview = $pageName == "Movie Single" ? true : false;
      if ($isWriteReview) {
        echo '<link rel="stylesheet" href="css/write-review.css" />';
      }
    ?>
    
  </head>
  <body>