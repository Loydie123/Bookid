<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - FACILITIES</title>
    <link rel="icon" href="images/about/title.png" type="image/x-icon" />
    <style>
      :root {
        --primary-color: #2c3e50;
        --secondary-color: #d4af37;
        --text-dark: #2c3e50;
        --text-light: #95a5a6;
      }

      body {
        background-color: #ffffff;
        overflow-x: hidden;
      }

      /* Premium Page Title */
      .page-title {
        padding: 60px 0;
        text-align: center;
        position: relative;
        animation: fadeInDown 1s forwards;
      }

      .page-title h2 {
        color: var(--primary-color);
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        letter-spacing: 1px;
      }

      .h-line {
        width: 80px;
        height: 3px;
        background: var(--primary-color);
        margin: 0 auto;
        transition: width 0.6s ease;
      }

      .page-title:hover .h-line {
        width: 120px;
      }

      .page-title p {
        max-width: 600px;
        margin: 25px auto 0;
        color: var(--text-dark);
        line-height: 1.8;
        font-size: 1.1rem;
      }

      /* Facility Card Styling */
      .facility-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        transition: all 0.5s ease;
        border: none !important;
        margin-bottom: 30px;
        height: 100%;
        transform: translateY(30px);
        opacity: 0;
      }

      /* Staggered card animations */
      .card-1 { animation: fadeInUp 0.6s forwards 0.2s; }
      .card-2 { animation: fadeInUp 0.6s forwards 0.3s; }
      .card-3 { animation: fadeInUp 0.6s forwards 0.4s; }
      .card-4 { animation: fadeInUp 0.6s forwards 0.5s; }
      .card-5 { animation: fadeInUp 0.6s forwards 0.6s; }
      .card-6 { animation: fadeInUp 0.6s forwards 0.7s; }
      .card-7 { animation: fadeInUp 0.6s forwards 0.8s; }
      .card-8 { animation: fadeInUp 0.6s forwards 0.9s; }
      .card-9 { animation: fadeInUp 0.6s forwards 1.0s; }

      .facility-card:hover {
        transform: translateY(-15px) scale(1.03);
        box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        z-index: 1;
      }

      .facility-img {
        position: relative;
        overflow: hidden;
        border-radius: 15px 15px 0 0;
      }

      .facility-img::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0));
        opacity: 0;
        transition: opacity 0.4s ease;
      }

      .facility-card:hover .facility-img::after {
        opacity: 1;
      }

      .facility-img img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.6s ease, filter 0.4s ease;
        filter: brightness(0.95);
      }

      .facility-card:hover .facility-img img {
        transform: scale(1.1);
        filter: brightness(1.05);
      }

      .facility-content {
        padding: 25px;
        position: relative;
      }

      .facility-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 30px;
        right: 30px;
        height: 1px;
        background: linear-gradient(to right, transparent, var(--secondary-color), transparent);
        transform: scaleX(0);
        transition: transform 0.4s ease;
      }

      .facility-card:hover .facility-content::before {
        transform: scaleX(1);
      }

      .facility-content p {
        color: var(--text-dark);
        line-height: 1.7;
        font-size: 1rem;
        margin: 0;
        transition: all 0.3s ease;
      }

      .facility-card:hover .facility-content p {
        color: var(--primary-color);
      }

      .container {
        padding: 0 30px 60px;
        max-width: 1400px;
      }

      /* Animations */
      @keyframes fadeInDown {
        from {
          opacity: 0;
          transform: translateY(-30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @media (max-width: 768px) {
        .page-title {
          padding: 40px 0;
        }

        .page-title h2 {
          font-size: 2rem;
        }

        .facility-img img {
          height: 200px;
        }

        .facility-content {
          padding: 20px;
        }

        .container {
          padding: 0 20px 40px;
        }
      }
    </style>
</head>
<body class="facilities-page">
    
 <?php require('inc/header.php');?>

<div class="page-title">
  <h2 class="h-font">OUR FACILITIES</h2>
  <div class="h-line"></div>
  <p>
    Welcome to Minangun Farm Resort!<br>
    At Minangun Farm Resort, we strive to provide a unique and memorable experience surrounded by nature.<br>
    Our facilities are designed to ensure your comfort and enjoyment throughout your stay.
  </p>
</div>

<div class="container">
  <div class="row">
    <?php
      $res = selectAll('facilities');
      $path = FACILITIES_IMG_PATH;
      $count = 0;

      while($row = mysqli_fetch_assoc($res)){
        $count++;
        $card_class = "card-" . $count;
        
        echo<<<data
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="facility-card $card_class">
              <div class="facility-img">
                <img src="$path$row[pic]" alt="Facility Image"> 
              </div>
              <div class="facility-content">
                <p>$row[description]</p>
              </div>
            </div>
          </div>
        data;
      }
    ?>
  </div>
</div>

<?php require('inc/footer.php'); ?>

</body>
</html>