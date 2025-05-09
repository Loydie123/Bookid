<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - DETAILS</title>
    <link rel="icon" href="images/about/title.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <style>
      :root {
        --primary-color: #2c3e50;
        --secondary-color: #d4af37;
        --text-dark: #2c3e50;
        --text-light: #95a5a6;
      }

      /* General Styling */
      .h-font {
        color: var(--primary-color);
        letter-spacing: 1px;
      }

      .custom-bg {
        background-color: var(--primary-color) !important;
        transition: all 0.3s ease;
      }
        
      .custom-bg:hover {
        background-color: #34495e !important;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      }

      /* Room Title */
      .room-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-color);
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 20px;
      }

      .room-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: var(--secondary-color);
      }

      /* Breadcrumb */
      .breadcrumb-nav {
        margin-bottom: 25px;
      }

      .breadcrumb-nav a {
        color: var(--text-light);
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
      }

      .breadcrumb-nav a:hover {
        color: var(--secondary-color);
      }

      /* Carousel */
      .carousel {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        margin-bottom: 30px;
      }

      .carousel-item img {
        height: 400px;
        object-fit: cover;
        transition: transform 0.6s ease-in-out;
      }
      
      .carousel-item.active img {
        transform: scale(1.02);
      }

      .carousel-item {
        transition: transform 0.6s ease-in-out;
        position: relative;
      }
      
      .carousel-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.3), rgba(0,0,0,0));
        pointer-events: none;
      }
      
      .carousel:hover .carousel-item.active img {
        transform: scale(1.05);
      }

      /* Add animation to carousel */
      @keyframes fadeZoom {
        from {
          opacity: 0.8;
          transform: scale(0.98);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
      }
      
      .carousel-item.active {
        animation: fadeZoom 0.6s ease-in-out forwards;
      }

      .carousel-control-prev, .carousel-control-next {
        width: 50px;
        height: 50px;
        background-color: rgba(0,0,0,0.5);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0.7;
      }

      .carousel-control-prev {
        left: 20px;
      }

      .carousel-control-next {
        right: 20px;
      }

      .carousel-control-prev:hover, .carousel-control-next:hover {
        opacity: 1;
      }

      /* Room Details Card */
      .details-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        padding: 15px;
      }

      .details-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
      }

      .room-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
      }

      .room-price span {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--text-light);
        margin-left: 10px;
      }

      .badge {
        background-color: #f8f9fa !important;
        color: var(--text-dark) !important;
        border: 1px solid rgba(0,0,0,0.1);
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 50px;
        margin: 2px;
        transition: all 0.3s ease;
        font-size: 0.8rem;
      }

      .badge:hover {
        background-color: var(--secondary-color) !important;
        color: white !important;
      }

      .section-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--primary-color);
        position: relative;
        padding-bottom: 8px;
        margin-bottom: 10px;
      }

      .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 2px;
        background: var(--secondary-color);
      }

      /* Description section */
      .description-box {
        background-color: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        margin-bottom: 20px;
      }

      .description-box p {
        color: var(--text-light);
        line-height: 1.6;
        font-size: 0.95rem;
        margin-bottom: 0;
      }

      /* Reviews */
      .review-box {
        background-color: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
      }

      .review {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(0,0,0,0.1);
      }

      .review:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
      }

      .reviewer {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }

      .reviewer img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--secondary-color);
      }

      .reviewer-name {
        font-weight: 600;
        margin: 0 0 0 10px;
        color: var(--primary-color);
        font-size: 0.95rem;
      }

      .rating {
        margin-top: 8px;
      }

      .review-text {
        font-style: italic;
        color: var(--text-light);
        line-height: 1.5;
        font-size: 0.9rem;
        margin-bottom: 0;
      }

      /* Book Now Button */
      .book-now-btn {
        background: linear-gradient(to right, var(--primary-color), #34495e);
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        border: none;
        width: 100%;
        font-size: 1rem;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      }

      .book-now-btn:hover {
        background: linear-gradient(to right, var(--secondary-color), #e0c675);
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        color: white;
      }

      @media (max-width: 768px) {
        .room-title {
          font-size: 2rem;
        }
        
        .carousel-item img {
          height: 300px;
        }
        
        .details-card {
          margin-top: 20px;
          margin-bottom: 20px;
        }
      }
    </style>
</head>
<body class="bg-light">
    
 <?php require('inc/header.php');?>

 <?php
    if(!isset($_GET['id'])){
      redirect('book.php');
    }

    $data = filteration($_GET);

    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');

    if(mysqli_num_rows($room_res)==0){
      redirect('book.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);
 ?>

<div class="container">
  <div class="row">

    <div class="col-12 my-5 mb-4 px-4" data-aos="fade-down" data-aos-duration="800">
      <h2 class="room-title"><?php echo $room_data['name'] ?></h2>
      <div class="breadcrumb-nav">
        <a href="index.php">HOME</a>
        <span class="text-secondary"> > </span>
        <a href="book.php">BOOK</a>
      </div>
    </div>

    <div class="col-lg-7 col-md-12 px-4" data-aos="fade-right" data-aos-duration="800">
      <div id="roomCarousel" class="carousel slide">
        <div class="carousel-inner">
          <?php 
            $room_img = ROOMS_IMG_PATH."thumbnail.jpg";
            $img_q = mysqli_query($con,"SELECT * FROM `room_images` 
                      WHERE `room_id`='$room_data[id]'");
 
            if(mysqli_num_rows($img_q)>0)
            {

              $active_class = 'active';

              while($img_res = mysqli_fetch_assoc($img_q))
              {
                echo"
                  <div class='carousel-item $active_class'>
                    <img src='".ROOMS_IMG_PATH.$img_res['image']."' class='d-block w-100'>
                  </div>
                ";
                $active_class='';
              }
            }
            else{
              echo"
                <div class='carousel-item active'>
                  <img src='$room_img' class='d-block w-100'>
                </div>
              ";
            }      
        
          ?>
        </div>
      </div>
    </div>

    <div class="col-lg-5 col-md-12 px-4" data-aos="fade-left" data-aos-duration="800">
      <div class="details-card">
          <?php 

            echo<<<price
              <div class="room-price">₱$room_data[price] <span>per night</span></div>
            price;

            echo<<<rating
              <div class="mb-2">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
            rating;

            $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f 
                    INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                    WHERE rfea.room_id = '$room_data[id]'");
 
            $features_data = "";
            while($fea_row = mysqli_fetch_assoc($fea_q)){
              $features_data .="<span class='badge me-1 mb-1'>
              $fea_row[name]
            </span>";
            }

            echo<<<features
              <div class="mb-3">
                <h6 class="section-title">Features</h6>
                $features_data
              </div>
            features;

            $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f 
                    INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                    WHERE rfac.room_id = '$room_data[id]'");
 
            $facilities_data = "";
            while($fac_row = mysqli_fetch_assoc($fac_q)){
                $facilities_data .="<span class='badge me-1 mb-1'>
                $fac_row[name]
              </span>";
            }

            echo<<<facilities
              <div class="mb-3">
                <h6 class="section-title">Facilities</h6>
                $facilities_data
              </div>
            facilities;

            echo<<<guests
              <div class="mb-3">
                <h6 class="section-title">Guests</h6>
                  <span class="badge me-1 mb-1">
                    $room_data[adult] Adults
                  </span>
                  <span class="badge me-1 mb-1">
                    $room_data[children] Children
                  </span>
              </div>
            guests;

            echo<<<area
              <div class="mb-3">
                <h6 class="section-title">Area</h6>
                <span class='badge me-1 mb-1'>
                  $room_data[area] sq. ft.
                </span>
              </div>
            area;

            if(!$settings_r['shutdown']){
              $login=0;
              if(isset($_SESSION['login']) && $_SESSION['login']==true){
                $login=1;
              }
              echo<<<book
              <button onclick='checkLoginToBook($login,$room_data[id])' class="book-now-btn">Book Now</button>
              book;
            }

          ?>
      </div>
    </div>

    <div class="col-12 mt-4 px-4" data-aos="fade-up" data-aos-duration="800">
      <div class="description-box">
        <h5 class="section-title">Description</h5>
        <p>
          <?php echo $room_data['description']; ?>
        </p>
      </div>
      <div class="review-box" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
        <h5 class="section-title">Reviews & Ratings</h5>
        <div class="review">
          <div class="reviewer">
            <img src="images/facilities/belle.jpg">
            <h6 class="reviewer-name">Belle Cruz</h6>
          </div>
          <p class="review-text">
            Ang ganda ng place. Sobrang ng enjoy kami ng partner ko at 
            mga friends namin naging memorable ang aming anniversary at advance bday celebration nia💙
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require('inc/footer.php'); ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  // Initialize AOS
  AOS.init({
    duration: 800,
    once: true,
    offset: 100
  });
  
  // Initialize carousel with auto-transition
  document.addEventListener('DOMContentLoaded', function() {
    var carousel = new bootstrap.Carousel(document.getElementById('roomCarousel'), {
      interval: 3000,  // Change image every 3 seconds
      wrap: true,      // Continuous cycling
      touch: true      // Allow swiping on touch devices
    });
  });
</script>

</body>
</html>