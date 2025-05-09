<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - HOME</title>
    <link rel="icon" href="images/about/title.png" type="image/x-icon" />
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #d4af37;
            --text-dark: #2c3e50;
            --text-light: #95a5a6;
        }

        .availability-form{
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) { 
            .availability-form{
                margin-top: 25px;
                padding: 0 35px;
            }
        }

        /* General Spacing Adjustments */
        section {
            padding: 40px 0;
            width: 100%;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 10px;
        }

        .row {
            margin: 0 -10px;
        }

        .col-lg-4, .col-md-6 {
            padding: 0 10px;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            overflow: hidden;
            width: 100%;
            margin: 0;
            padding: 10px;
            background: #f8f9fa;
        }

        .swiper-container {
            width: 100%;
            height: auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .swiper-slide {
            width: 100%;
            height: auto;
        }

        .swiper-slide img {
            width: 100%;
            height: 80vh;
            object-fit: cover;
            display: block;
            filter: brightness(0.9);
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 8px;
            }
            
            .swiper-slide img {
                height: 60vh;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 5px;
            }
            
            .swiper-slide img {
                height: 50vh;
            }

            .hero-content h1 {
                font-size: 1.5rem;
            }

            .hero-content p {
                font-size: 0.9rem;
            }
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 2;
            width: 90%;
            max-width: 800px;
            padding: 0 15px;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2));
            z-index: 1;
        }

        /* Room Cards */
        .card {
            margin-bottom: 20px;
        }

        /* Amenities Section */
        .amenity-item {
            margin: 10px auto;
            padding: 15px;
        }

        /* Testimonials */
        .testimonials-section {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .swiper-testimonials {
            padding: 20px;
        }

        .swiper-testimonials .swiper-slide {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            width: 350px;
            margin: 20px auto;
        }

        .swiper-testimonials .swiper-slide:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        .profile {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--secondary-color);
        }

        .profile h6 {
            margin: 0 0 0 15px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .swiper-testimonials .text-muted {
            font-size: 0.9rem;
            line-height: 1.6;
            padding: 15px;
            margin: 0;
        }

        .rating {
            padding: 0 15px 15px 15px;
        }

        .swiper-testimonials .swiper-pagination-bullet-active {
            background: var(--primary-color);
        }

        @media (max-width: 768px) {
            .swiper-testimonials .swiper-slide {
                width: 300px;
            }
            
            .swiper-testimonials {
                padding: 10px;
            }
        }

        /* Footer Styling */
        .footer {
            background-color: var(--primary-color);
            padding: 30px 0;
            color: white;
        }

        .footer h5 {
            color: white;
            margin-bottom: 15px;
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--secondary-color);
        }

        .footer .social-links a {
            display: inline-block;
            width: 35px;
            height: 35px;
            background: rgba(255,255,255,0.1);
            text-align: center;
            line-height: 35px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .footer .social-links a:hover {
            background: var(--secondary-color);
        }

        /* Section Title Adjustment */
        .section-title {
            margin-bottom: 30px;
        }

        /* Badge Spacing */
        .badge {
            margin: 2px;
            padding: 6px 12px;
        }

        /* Button Spacing */
        .btn-premium {
            margin: 5px auto;
            padding: 8px 20px;
        }

        /* Premium Styling */
        .custom-bg {
            background-color: var(--primary-color) !important;
            transition: all 0.3s ease;
        }
        
        .custom-bg:hover {
            background-color: #34495e !important;
        }

        .h-font {
            color: var(--primary-color);
            letter-spacing: 1px;
        }

        /* Room Card Enhancement */
        .card {
            transition: all 0.4s ease;
            border-radius: 15px;
            overflow: hidden;
            margin: 0 auto;
            border: none;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Amenities Section Enhancement */
        .amenity-item {
            transition: all 0.4s ease;
            padding: 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .amenity-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .amenity-item img {
            width: 70px;
            height: 70px;
            margin-bottom: 15px;
            transition: transform 0.4s ease;
        }

        .amenity-item:hover img {
            transform: scale(1.1) rotate(5deg);
        }

        /* Button Styling */
        .btn-explore {
            background-color: var(--primary-color) !important;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.4s ease;
            display: inline-block;
            border: 2px solid transparent;
            font-weight: 500;
            letter-spacing: 0.5px;
            font-size: 1.1rem;
        }

        .btn-explore:hover {
            background-color: transparent !important;
            border-color: white;
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            section {
                padding: 30px 0;
            }

            .hero-section {
                padding: 8px;
            }

            .container {
                padding: 0 15px;
            }

            .amenity-item {
                margin: 8px auto;
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            section {
                padding: 20px 0;
            }

            .hero-section {
                padding: 5px;
            }

            .container {
                padding: 0 10px;
            }
        }

        /* Carousel Styling */
        .swiper-slide {
            position: relative;
        }

        .carousel-text {
            position: absolute;
            bottom: 50px;
            right: 50px;
            color: white;
            z-index: 2;
            max-width: 600px;
            text-align: right;
        }

        .carousel-text h1 {
            font-size: 3.2rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            font-weight: 600;
            letter-spacing: 1px;
        }

        .carousel-text p {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
            line-height: 1.6;
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2));
            z-index: 1;
        }

        .btn-explore {
            background-color: var(--primary-color) !important;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.4s ease;
            display: inline-block;
            border: 2px solid transparent;
            font-weight: 500;
            letter-spacing: 0.5px;
            font-size: 1.1rem;
        }

        .btn-explore:hover {
            background-color: transparent !important;
            border-color: white;
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .carousel-text {
                bottom: 30px;
                right: 30px;
            }

            .carousel-text h1 {
                font-size: 2.2rem;
            }

            .carousel-text p {
                font-size: 1.1rem;
            }

            .btn-explore {
                padding: 10px 25px;
                font-size: 1rem;
            }

            .swiper-slide img {
                height: 60vh;
            }
        }

        @media (max-width: 576px) {
            .carousel-text {
                bottom: 20px;
                right: 20px;
            }

            .carousel-text h1 {
                font-size: 1.8rem;
            }

            .carousel-text p {
                font-size: 1rem;
                margin-bottom: 1rem;
            }

            .btn-explore {
                padding: 8px 20px;
                font-size: 0.9rem;
            }

            .swiper-slide img {
                height: 50vh;
            }
        }

        /* Room Cards Centering */
        .room-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 50px;
            padding: 40px 0;
        }

        .room-card {
            flex: 0 0 auto;
            width: 100%;
            max-width: 350px;
            margin: 0 15px;
        }

        @media (min-width: 768px) {
            .room-card {
                width: calc(50% - 60px);
            }
        }

        @media (min-width: 992px) {
            .room-card {
                width: calc(33.333% - 70px);
            }
        }

        .card {
            height: 100%;
            transition: transform 0.3s ease;
            margin-bottom: 30px;
        }

        .card-img-wrapper {
            position: relative;
            overflow: hidden;
        }

        .price-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            padding: 20px;
            color: white;
        }

        .price-overlay h4 {
            margin: 0;
            font-size: 1.2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .card-body {
            padding: 1.25rem;
        }

        .card-body .d-flex {
            margin-bottom: 0 !important;
            padding-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .price-overlay {
                padding: 15px;
            }

            .price-overlay h4 {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .price-overlay {
                padding: 10px;
            }

            .price-overlay h4 {
                font-size: 1rem;
            }
        }

        /* Room Section Spacing */
        .room-section {
            padding: 60px 0;
        }

        .room-section h2 {
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .room-container {
                gap: 40px;
                padding: 30px 0;
            }
            
            .room-card {
                margin: 0 10px;
            }

            .room-section {
                padding: 40px 0;
            }

            .room-section h2 {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 576px) {
            .room-container {
                gap: 30px;
                padding: 20px 0;
            }
            
            .room-card {
                margin: 0 5px;
            }

            .room-section {
                padding: 30px 0;
            }

            .room-section h2 {
                margin-bottom: 20px;
            }
        }

        h2.h-font {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 15px;
        }

        h2.h-font:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-color);
        }

        .amenity-card {
            background: white;
            border-radius: 20px;
            padding: 2rem 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .amenity-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            transition: all 0.3s ease;
        }

        .amenity-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 45px rgba(0,0,0,0.15);
        }

        .amenity-icon {
            position: relative;
            margin-bottom: 1rem;
        }

        .amenity-icon img {
            transition: transform 0.3s ease;
        }

        .amenity-card:hover .amenity-icon img {
            transform: scale(1.1) rotate(5deg);
        }

        .amenity-card h5 {
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
            transition: all 0.3s ease;
        }

        .amenity-card:hover h5 {
            color: var(--secondary-color);
        }

        .btn-more-facilities {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .btn-more-facilities:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            color: white;
        }

        .btn-more-facilities i {
            transition: transform 0.3s ease;
        }

        .btn-more-facilities:hover i {
            transform: translateX(5px);
        }

        @media (max-width: 768px) {
            .amenity-card {
                padding: 1.5rem 1rem;
            }
            
            .amenity-card h5 {
                font-size: 1.1rem;
            }
            
            .btn-more-facilities {
                padding: 12px 30px;
                font-size: 1rem;
            }
        }

        .quick-link-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            background: #fff !important;
        }

        .verification-icon {
            animation: scaleIn 0.5s ease-out;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            60% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        #welcomeModal .modal-content {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(-100px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-light">
    
 <?php require('inc/header.php');?>

 <!-- Carousel  -->
<div class="container-fluid px-lg-4 mt-4">
 <div class="swiper swiper-container">
    <div class="swiper-wrapper">
      <?php 
         $res = selectAll('carousel');
         while($row = mysqli_fetch_assoc($res))
      {
        $path = CAROUSEL_IMG_PATH;
        echo <<<data
            <div class="swiper-slide">
                <div class="overlay"></div>
                <img src="$path$row[image]" class="w-100 d-block">
                <div class="carousel-text">
                    <h1 data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">Your Perfect Getaway</h1>
                    <p data-aos="fade-left" data-aos-duration="800" data-aos-delay="400">A peaceful escape in the heart of nature</p>
                    <a href="book.php" class="btn-explore" data-aos="fade-left" data-aos-duration="800" data-aos-delay="600">View Rooms</a>
                </div>
            </div>
        data;
      }
      ?>
    </div>
  </div>
</div>

<div class="spacer" style="height: 80px;"></div>

<!-- Our Rooms -->
<h2 class="mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

<div class="container">
  <div class="row justify-content-center">
    <?php
        $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

        while($room_data = mysqli_fetch_assoc($room_res))
        {
            // get features of room
            $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f 
                    INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                    WHERE rfea.room_id = '$room_data[id]'");

            $features_data = "";
            while($fea_row = mysqli_fetch_assoc($fea_q)){
                $features_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                    $fea_row[name]
                </span>";
            }

            // get facilities of room
            $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f 
                    INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                    WHERE rfac.room_id = '$room_data[id]'");

            $facilities_data = "";
            while($fac_row = mysqli_fetch_assoc($fac_q)){
                $facilities_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                    $fac_row[name]
                </span>";
            }

            // get thumbnail of image
            $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
            $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
                    WHERE `room_id`='$room_data[id]' AND `thumb`='1'");

            if(mysqli_num_rows($thumb_q)>0){
                $thumb_res = mysqli_fetch_assoc($thumb_q);
                $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
            }   

            $book_btn = "";

            if(!$settings_r['shutdown']){
                $login=0;
                if(isset($_SESSION['login']) && $_SESSION['login']==true){
                    $login=1;
                }
                $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</button>";
            }

            // print room card
            echo <<<data
            <div class="col-lg-4 col-md-6 mb-5 d-flex justify-content-center" data-aos="fade-up" data-aos-duration="800" data-aos-delay="$room_data[id]00">
                <div class="card border-0 shadow" style="width: 350px;">
                    <img src="$room_thumb" class="card-img-top">
                    <div class="card-body">
                        <h5 data-aos="fade-up" data-aos-duration="600">$room_data[name]</h5>
                        <div class="features mb-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                            <h6 class="mb-1">Features</h6>
                            $features_data
                        </div>
                        <div class="facilities mb-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                            <h6 class="mb-1">Facilities</h6>
                            $facilities_data
                        </div>
                        <div class="guests mb-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                $room_data[adult] Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                $room_data[children] Children
                            </span>
                        </div>
                        <div class="description mb-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
                            <h6 class="mb-1">Description</h6>
                            <p class="text-muted" style="font-size: 0.9rem;">
                                $room_data[description]
                            </p>
                        </div>
                        <div class="d-flex justify-content-evenly" data-aos="fade-up" data-aos-duration="600" data-aos-delay="500">
                            $book_btn
                        </div>
                    </div>
                </div>
            </div>
            data;
        }
    ?>
  </div>
</div>

<br>
<br>
<br>

<!-- Our Amenities -->
<h2 class="mt-2 pt-2 mb-4 text-center fw-bold h-font" data-aos="fade-up">OUR AMENITIES</h2>

<div class="container">
  <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
    <div class="col-lg-2 col-md-2 text-center rounded py-4 my-3" data-aos="fade-up" data-aos-delay="100">
      <div class="amenity-card">
        <div class="amenity-icon">
          <img src="images/facilities/wifi.svg" width="80px">
        </div>
        <h5 class="mt-4">Wifi</h5>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 text-center rounded py-4 my-3" data-aos="fade-up" data-aos-delay="200">
      <div class="amenity-card">
        <div class="amenity-icon">
          <img src="images/facilities/tv.svg" width="80px">
        </div>
        <h5 class="mt-4">Smart TV</h5>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 text-center rounded py-4 my-3" data-aos="fade-up" data-aos-delay="300">
      <div class="amenity-card">
        <div class="amenity-icon">
          <img src="images/facilities/ac.svg" width="80px">
        </div>
        <h5 class="mt-4">Air Conditioner</h5>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 text-center rounded py-4 my-3" data-aos="fade-up" data-aos-delay="400">
      <div class="amenity-card">
        <div class="amenity-icon">
          <img src="images/facilities/cook.svg" width="80px">
        </div>
        <h5 class="mt-4">Kitchen</h5>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 text-center rounded py-4 my-3" data-aos="fade-up" data-aos-delay="500">
      <div class="amenity-card">
        <div class="amenity-icon">
          <img src="images/facilities/pool.svg" width="80px">
        </div>
        <h5 class="mt-4">Swimming Pool</h5>
      </div>
    </div>
    <div class="col-lg-12 text-center mt-5" data-aos="fade-up" data-aos-delay="600">
      <a href="facilities.php" class="btn-more-facilities">Facilities <i class="bi bi-arrow-right"></i></a>
    </div>
  </div>
</div>

<br>

<!-- Testimonials  -->

<section class="testimonials-section">
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font section-title" data-aos="fade-up">TESTIMONIALS</h2>

 <div class="container mt-5">
  <div class="swiper swiper-testimonials">
    <div class="swiper-wrapper mb-5">
      <?php 
        $testimonials = [
          [
            'img' => 'kim.jpg',
            'name' => 'KimmyBoiCortez',
            'review' => 'super ganda ng place nato nakaka relax 🥰🥰🫶🏻🫶🏻 come and visit 🥰🥰🥰'
          ],
          [
            'img' => 'belle.jpg',
            'name' => 'Belle Cruz',
            'review' => 'Ang ganda ng place.Sobrang ng enjoy kami ng partner ko at mga friends namin naging memorable ang aming anniversary at advance bday celebration nia💙'
          ],
          [
            'img' => 'nemilyn.jpg',
            'name' => 'Nemilyn Acuin Flores',
            'review' => 'We really enjoyed the place ☺️ it\'s very nice and cozy 🫶 my family loves the place specially our little one 🥰 the hosts are also kind and accomodating 🙂 we are looking forward to stay here again soon! 🤭'
          ],
          [
            'img' => 'paw.jpg',
            'name' => 'Paw Chincha',
            'review' => 'i will rate it 100000/10 super ganda ng place, itz giving la union vibes! super bait pa ng mga staff!🤍'
          ],
          [
            'img' => 'liviene.svg',
            'name' => 'Liviene Mercado',
            'review' => 'this place is highly recommend, aesthetic vibes , quiet and clean place and super accommodating owners, ❤️'
          ],
          [
            'img' => 'diane.jpg',
            'name' => 'Dian Cruz Magat',
            'review' => 'Highly recommend this place, It\'s clean and relaxing 💯 plus the owners are very accommodating. They almost have everything you might needed. You can never go wrong with this place, So the next time you want a private place to celebrate or just hang out with your friends/ family this place is what you\'re looking for 🥰'
          ],
          [
            'img' => 'raizza.jpg',
            'name' => 'Raizza Krista Gozun',
            'review' => 'I\'m so kilig to this Aesthetic Lanai ,For an intimate and relaxing moment why not go to Minagun Farm Resort. Not only does it offer excellent facilities, but it is also accessible for those looking for some place that is easy on the budget. The owners are friendly and madaling lapitan for the nitty gritty of your staycation needs. They also serve as your friendly runners. Hey, cooking untensils and ingredients are free. Yes, they have "samgyup package!"'
          ]
        ];

        foreach($testimonials as $index => $t) {
          echo <<<data
          <div class="swiper-slide bg-white p-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="${index}00">
            <div class="profile d-flex align-items-center mb-3" data-aos="fade-right" data-aos-duration="600" data-aos-delay="${index}50">
              <img src="images/facilities/$t[img]" width="30px">
              <h6 class="m-0 ms-2">$t[name]</h6>
            </div>
            <p class="text-muted" data-aos="fade-up" data-aos-duration="600" data-aos-delay="${index}75">$t[review]</p>
            <div class="rating" data-aos="fade-left" data-aos-duration="600" data-aos-delay="${index}100">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
          </div>
          data;
        }
      ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
 </div>
</section>

<!-- Reach Us -->


<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
      <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="bg-white p-4 rounded mb-4">
        <h5>Call us</h5>
        <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
           <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
        </a>
        <br>
        <?php 
          if($contact_r['pn2']!=''){
            echo<<<data
              <a href="tel: +$contact_r[pn2]" class="d-inline-block text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i> +$contact_r[pn2]
             </a>

             data;
          }    
            
        ?>
      
      </div>
      <div class="bg-white p-4 rounded mb-4">
        <h5>Follow us</h5>
        <?php 
          if($contact_r['fb']!=''){
            echo<<<data
            <a href="$contact_r[fb]" class="d-inline-block mb-3" target="_blank">
            <span class="badge bg-light text-dark fs-6 p-2"> 
             <i class="bi bi-facebook me-1"></i> Facebook
           </span>
           </a>
           <br>

           data;
          }
        ?>
    
        <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block mb-3" target="_blank">
          <span class="badge bg-light text-dark fs-6 p-2"> 
           <i class="bi bi-instagram me-1"></i> Instagram
         </span>
         </a>
      </div>
    </div>
  </div>
</div>

<!-- Password Recovery Modal -->
<div class="modal fade" id="RecoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="recovery-form">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-shield-lock fs-3 me-2"></i> Set New Password
          </h5>
        </div>
        <div class="modal-body">
          <div class="mb-4">
            <label class="form-label">New Password</label>
            <input type="password" name="pass" required class="form-control shadow-none">
            <input type="hidden" name="email">
            <input type="hidden" name="token">
          </div>
          <div class="d-flex align-items-center justify-content-between mb-2">
            <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Resend Verification Modal -->
<div class="modal fade" id="ResendVerificationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="resend-verification-form">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-envelope-check fs-3 me-2"></i> Resend Verification Email
          </h5>
        </div>
        <div class="modal-body">
          <div class="mb-4">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" required class="form-control shadow-none">
          </div>
          <div class="d-flex align-items-center justify-content-between mb-2">
            <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
            <button type="submit" class="btn custom-bg text-white shadow-none">RESEND</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Welcome Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius: 20px; border: none; overflow: hidden;">
      <div class="modal-header border-0 text-center position-relative" 
        style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); 
               padding: 3rem 1rem;">
        <div class="w-100">
          <p class="text-white mb-2" style="font-size: 1.2rem;">Your email has been successfully verified</p>
          <h4 class="modal-title w-100" style="color: #fff; font-size: 2rem; font-weight: 700;">
            Welcome to Bookid, <?php echo isset($_SESSION['uName']) ? explode(' ', $_SESSION['uName'])[0] : 'Guest'; ?>!
          </h4>
        </div>
      </div>
      
      <div class="modal-body py-4 px-4">
        <div class="text-center mb-4">
          <div class="verification-icon mb-3">
            <i class="bi bi-check-circle-fill" style="font-size: 4rem; color: #28a745;"></i>
          </div>
          <h5 class="mb-4" style="color: var(--primary-color);">What would you like to do next?</h5>
        </div>

        <div class="row g-4 justify-content-center">
          <div class="col-md-4">
            <a href="book.php" class="text-decoration-none">
              <div class="quick-link-card text-center p-3" style="background: #f8f9fa; border-radius: 15px; transition: all 0.3s ease;">
                <i class="bi bi-calendar2-check mb-2" style="font-size: 2rem; color: var(--primary-color);"></i>
                <h6 class="mb-2" style="color: var(--primary-color);">Book a Room</h6>
                <p class="small text-muted mb-0">Find and reserve your perfect stay</p>
              </div>
            </a>
          </div>
          
          <div class="col-md-4">
            <a href="profile.php" class="text-decoration-none">
              <div class="quick-link-card text-center p-3" style="background: #f8f9fa; border-radius: 15px; transition: all 0.3s ease;">
                <i class="bi bi-person-circle mb-2" style="font-size: 2rem; color: var(--primary-color);"></i>
                <h6 class="mb-2" style="color: var(--primary-color);">Complete Profile</h6>
                <p class="small text-muted mb-0">Add your details and preferences</p>
              </div>
            </a>
          </div>
          
          <div class="col-md-4">
            <a href="facilities.php" class="text-decoration-none">
              <div class="quick-link-card text-center p-3" style="background: #f8f9fa; border-radius: 15px; transition: all 0.3s ease;">
                <i class="bi bi-grid mb-2" style="font-size: 2rem; color: var(--primary-color);"></i>
                <h6 class="mb-2" style="color: var(--primary-color);">Explore Amenities</h6>
                <p class="small text-muted mb-0">Discover our facilities</p>
              </div>
            </a>
          </div>
        </div>

        <div class="text-center mt-4">
          <button type="button" class="btn px-4 py-2" data-bs-dismiss="modal" 
            style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); 
                   color: #fff; 
                   border: none; 
                   border-radius: 50px;
                   font-weight: 500;
                   font-size: 1.1rem;
                   transition: all 0.3s ease;">
            Start Exploring
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

  <?php require('inc/footer.php'); ?>

  <?php 
  
    if(isset($_GET['account_recovery']))
    {
      $data = filteration($_GET);

      $query = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? LIMIT 1",
        [$data['email'],$data['token']],'ss');

      if(mysqli_num_rows($query)==1)
      {
        $fetch = mysqli_fetch_assoc($query);
        
        // Check if token has expired
        $expired = false;
        if($fetch['t_expire']) {
            $expiry_timestamp = strtotime($fetch['t_expire']);
            $current_timestamp = time();
            if($current_timestamp > $expiry_timestamp) {
                $expired = true;
            }
        }
        
        if($expired) {
            alert("error","Password reset link has expired! Please request a new one.");
        }
        else {
            echo<<<showModal
              <script>
                var myModal = document.getElementById('RecoveryModal');
    
                myModal.querySelector("input[name='email']").value = '$data[email]';
                myModal.querySelector("input[name='token']").value = '$data[token]';
    
                var modal = bootstrap.Modal.getOrCreateInstance(myModal);
                modal.show();
              </script>  
            showModal;
        }
      }
      else{
        alert("error","Invalid Link!");
      }
    }
    
    if(isset($_GET['expired']))
    {
      alert("error","Email verification link has expired! Please request a new one.");
      echo<<<showModal
        <script>
          var resendModal = document.getElementById('ResendVerificationModal');
          var modal = bootstrap.Modal.getOrCreateInstance(resendModal);
          modal.show();
        </script>  
      showModal;
    }
  
  ?>

<?php if(isset($_GET['email_verified']) && $_GET['email_verified'] === 'true'): ?>
<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'Success!',
            text: 'Your email has been successfully verified.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });
</script>
<?php endif; ?>

 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  // Initialize AOS
  AOS.init({
    duration: 800,
    once: true,
    offset: 100
  });

  // Swiper initialization for carousel
  var swiper = new Swiper(".swiper-container", {
    spaceBetween: 30,
    effect: "fade",
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    on: {
      slideChangeTransitionStart: function () {
        AOS.refresh();
      }
    }
  });

  // Swiper initialization for testimonials
  var swiper = new Swiper(".swiper-testimonials", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    loop: true,
    coverflowEffect: {
      rotate: 20,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: false,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    }
  });

  // recover account

  let recovery_form = document.getElementById('recovery-form');

  recovery_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('email',recovery_form.elements['email'].value);
    data.append('token',recovery_form.elements['token'].value);
    data.append('pass',recovery_form.elements['pass'].value);
    data.append('recover_user','');

    var myModal = document.getElementById('RecoveryModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/login_register.php",true);

    xhr.onload = function(){
        if(this.responseText == 'failed'){
          alert('error',"Password reset failed!");
        }
        else{
          alert('success',"Password reset successful!");
          recovery_form.reset();
      }
    }

    xhr.send(data);
  });
  
  // resend verification email
  
  let resend_form = document.getElementById('resend-verification-form');
  
  resend_form.addEventListener('submit', (e)=>{
    e.preventDefault();
    
    let data = new FormData();
    
    data.append('email', resend_form.elements['email'].value);
    data.append('resend_confirmation', '');
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);
    
    xhr.onload = function(){
      if(this.responseText == 'inv_email'){
        alert('error', "Email not registered!");
      }
      else if(this.responseText == 'already_verified'){
        alert('error', "Email already verified!");
      }
      else if(this.responseText == 'mail_failed'){
        alert('error', "Cannot send confirmation email! Server down!");
      }
      else if(this.responseText == 'upd_failed'){
        alert('error', "Verification update failed! Server down!");
      }
      else{
        alert('success', "Verification email resent! Please check your inbox.");
        resend_form.reset();
        var resendModal = document.getElementById('ResendVerificationModal');
        var modal = bootstrap.Modal.getInstance(resendModal);
        modal.hide();
      }
    }
    
    xhr.send(data);
  });

  // Add this to your existing scripts
  document.addEventListener('DOMContentLoaded', function() {
    // Check if email was just verified
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('email_verified') === 'true') {
        const welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
        welcomeModal.show();
        
        // Clean URL without refreshing the page
        window.history.replaceState({}, document.title, window.location.pathname);
    }
  });

</script>

</body>
</html>