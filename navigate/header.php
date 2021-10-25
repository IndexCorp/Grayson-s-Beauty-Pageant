<?php 

    include 'core/init.php';
    // $select_table = 'chapter';
    $chapters = $getFromU -> selectTable('chapter');

?>

<!DOCTYPE html>
<html lang="en">

<head>
<base href="<?=BASE_URL?>">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Beauty Peagant | Grayson's Model</title>
  <meta content="" name="Beauty Peagant | Grayson's Model">
  <meta content="" name="Beauty Peagant | Grayson's Model">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="logo">
  <link href="assets/img/logo.jpg" rel="logo">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/vendor/wow/wow.js">
  <link rel="stylesheet" href="assets/vendor/wow/wow.min.js">

  <!-- Font-->
	<link rel="stylesheet" type="text/css" href="assets/css/nunito-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="assets/css/apply.css"/>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/mystyle.css" rel="stylesheet">
  <!-- Splide CSS -->
  <link href="assets/css/splide.min.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v4.3.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Grayson's Model</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="" class="active">HOME</a></li>
          <li><a href="about">ABOUT</a></li>
       <!--   <li class="dropdown"><a href="#"><span>COMPETITION</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about_competition.php">ABOUT THE COMPETITION</a></li>
              <li><a href="contact.php">HOW TO APPLY</a></li>
            </ul>
          </li>
        -->
          <li class="dropdown"><a href="#"><span>CONTESTANTS</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach($chapters as $chap): ?>
                <li><a href="contestants/<?=$chap->id?>"><?=$chap->chapter?></a></li>
              <?php endforeach; //<?=$chap->id ?>
            </ul>
          </li>
          <li><a href="vote">VOTE</a></li>
          <li><a href="competition">COMPETITION</a></li>
          <li><a href="blog">BLOG</a></li>
          <li><a href="contact">CONTACT</a></li>
        
        
        <!--  <li class="dropdown"><a href="#"><span>UNWANTED</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="services.php">SERVICES</a></li>
              <li><a href="pricing.php">PRICING</a></li>
              <li><a href="team.php">Team</a></li>
              <li><a href="testimonials.php">Testimonials</a></li>
            </ul>
          </li>-->

          <li><a href="apply" class="getstarted">Apply Now!!!</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
