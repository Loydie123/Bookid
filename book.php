<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - BOOK</title>
      <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <style>
      :root {
        --primary-color: #2c3e50;
        --secondary-color: #d4af37;
        --text-dark: #2c3e50;
        --text-light: #95a5a6;
      }

      .pop:hover{
        border-top-color: var(--secondary-color) !important;
        transform: scale(1.03);
        transition: all 0.3s;
      }

      .card {
        transition: all 0.4s ease;
        border-radius: 15px;
        overflow: hidden;
        border: none;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      }

      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
      }

      .card img {
        transition: transform 0.4s ease;
        border-radius: 10px;
      }

      .card:hover img {
        transform: scale(1.03);
      }

      .h-line {
        width: 150px;
        margin: 0 auto;
        height: 2px;
        background: linear-gradient(to right, var(--secondary-color), transparent);
      }

      .h-font {
        color: var(--primary-color);
        letter-spacing: 1px;
      }

      .badge {
        padding: 8px 15px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        margin-right: 5px;
        margin-bottom: 8px;
        background: #f8f9fa;
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: all 0.3s;
      }

      .badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }

      .custom-bg {
        background: linear-gradient(to right, var(--primary-color), #34495e);
        color: white;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      }

      .custom-bg:hover {
        background: linear-gradient(to right, var(--secondary-color), #e0c675);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      }

      .btn-outline-dark {
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        font-weight: 500;
        transition: all 0.3s;
      }

      .btn-outline-dark:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      }

      h5.mb-3 {
        color: var(--primary-color);
        font-weight: 600;
        letter-spacing: 0.5px;
      }

      h6 {
        color: var(--text-dark);
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 10px;
      }

      .text-muted {
        color: var(--text-light) !important;
        line-height: 1.6;
      }

      .guests .badge {
        background: #f8f9fa;
        color: var(--text-dark);
        border: 1px solid rgba(0,0,0,0.05);
      }

      .description {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        margin-top: 15px;
      }

      .description p {
        margin-bottom: 0;
      }

      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }

      .card {
        animation: fadeIn 0.6s ease forwards;
      }

      .features, .facilities {
        margin-bottom: 20px;
      }

      .features h6, .facilities h6 {
        position: relative;
        padding-bottom: 8px;
        margin-bottom: 15px;
      }

      .features h6:after, .facilities h6:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 30px;
        height: 2px;
        background: var(--secondary-color);
      }
    </style>
</head>
<body class="bg-light">
    
 <?php require('inc/header.php');?>

<div class="my-4 px-4">
  <h2 class="fw-bold h-font text-center">BOOK NOW</h2>
  <div class="h-line bg-dark"></div>
</div>

<div class="d-flex justify-content-center">
  <div class="col-lg-9 col-md-12 px-4">
    <?php
      $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?",[1,0],'ii');

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
            $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book Now</button>";
          }

          // print room card
          echo <<<data
            <div class="card mb-4 border-0 shadow" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
              <div class="row g-0 p-3 align-items-center">
                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3" data-aos="fade-right" data-aos-delay="200">
                  <img src="$room_thumb" class="img-fluid rounded">
                </div>
                <div class="col-md-5 px-lg-3 px-md-3 px-0" data-aos="fade-up" data-aos-delay="300">
                  <h5 class="mb-3">$room_data[name]</h5>
                  <div class="features mb-3">
                    <h6 class="mb-1">Features</h6>
                    $features_data
                  </div>
                  <div class="facilities mb-3">
                    <h6 class="mb-1">Facilities</h6>
                    $facilities_data
                  </div>
                  <div class="guests">
                    <h6 class="mb-1">Guests</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                      $room_data[adult] Adults
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                      $room_data[children] Children
                    </span> 
                    <div class="description mt-3">
                   <h6 class="mb-1">Description</h6>
                 <p class="text-muted" style="font-size: 0.9rem;">
               $room_data[description]
                  </p>
                 </div>
                  </div>
                </div>
                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center" data-aos="fade-left" data-aos-delay="400">
                  <h6 class="mb-4">₱$room_data[price] only</h6>
                  $book_btn
                  <a href="book_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                </div>
              </div>
            </div>
          data;
      }
    ?>
  </div>
</div>

<?php require('inc/footer.php'); ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true,
    mirror: false,
    offset: 50
  });
</script>

</body>
</html>