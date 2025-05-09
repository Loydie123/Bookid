<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - ABOUT</title>
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
        max-width: 800px;
        margin: 25px auto 0;
        color: var(--text-dark);
        line-height: 1.8;
        font-size: 1.1rem;
      }

      /* About Section Styling */
      .about-section {
        padding: 60px 0;
      }

      .about-content {
        opacity: 0;
        transform: translateX(-30px);
        animation: fadeInLeft 1s forwards;
        animation-delay: 0.3s;
      }

      .about-content h3 {
        color: var(--primary-color);
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        position: relative;
        display: inline-block;
      }

      .about-content h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60%;
        height: 3px;
        background: linear-gradient(to right, var(--secondary-color), transparent);
        transition: width 0.5s ease;
      }

      .about-content:hover h3::after {
        width: 100%;
      }

      .about-content p {
        color: var(--text-dark);
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 2rem;
      }

      .about-image {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(0,0,0,0.2);
        transition: all 0.5s ease;
        opacity: 0;
        transform: translateX(30px);
        animation: fadeInRight 1s forwards;
        animation-delay: 0.5s;
      }

      .about-image:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 20px 45px rgba(0,0,0,0.25);
      }

      .about-image img {
        width: 100%;
        height: auto;
        transition: transform 0.5s ease;
      }

      .about-image:hover img {
        transform: scale(1.1);
      }

      /* Policy Section */
      .policy-section {
        background: #f8f9fa;
        padding: 50px 0;
        border-radius: 15px;
        margin: 30px 0;
      }

      .policy-content {
        opacity: 0;
        animation: fadeIn 1s forwards;
        animation-delay: 0.6s;
      }

      .policy-content h3 {
        color: var(--primary-color);
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        position: relative;
        display: inline-block;
      }

      .policy-content h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50%;
        height: 3px;
        background: linear-gradient(to right, var(--secondary-color), transparent);
        transition: width 0.5s ease;
      }

      .policy-content:hover h3::after {
        width: 100%;
      }

      .policy-content ul {
        list-style: none;
        padding: 0;
      }

      .policy-content ul li {
        color: var(--text-dark);
        font-size: 1.1rem;
        margin-bottom: 1rem;
        padding-left: 2rem;
        position: relative;
        line-height: 1.6;
        transition: all 0.3s ease;
      }

      .policy-content ul li:hover {
        transform: translateX(5px);
        color: var(--primary-color);
      }

      .policy-content ul li::before {
        content: "•";
        color: var(--secondary-color);
        font-size: 1.5rem;
        position: absolute;
        left: 0;
        top: -2px;
        transition: all 0.3s ease;
      }

      .policy-content ul li:hover::before {
        color: var(--primary-color);
        transform: scale(1.2);
      }

      /* Stats Box Styling */
      .stats-box {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.5s ease;
        border-top: 4px solid var(--secondary-color);
        height: 100%;
        opacity: 0;
        transform: translateY(30px);
      }

      .stats-box-1 { animation: fadeInUp 0.5s forwards 0.3s; }
      .stats-box-2 { animation: fadeInUp 0.5s forwards 0.5s; }
      .stats-box-3 { animation: fadeInUp 0.5s forwards 0.7s; }
      .stats-box-4 { animation: fadeInUp 0.5s forwards 0.9s; }

      .stats-box:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 45px rgba(0,0,0,0.15);
        border-top: 4px solid var(--primary-color);
      }

      .stats-box img {
        width: 70px;
        height: 70px;
        margin-bottom: 1.5rem;
        transition: all 0.5s ease;
      }

      .stats-box:hover img {
        transform: scale(1.1) rotate(10deg);
      }

      .stats-box h4 {
        color: var(--primary-color);
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
        transition: all 0.3s ease;
      }

      .stats-box:hover h4 {
        color: var(--secondary-color);
        letter-spacing: 1px;
      }

      /* Team Section */
      .team-section {
        padding: 60px 0;
        opacity: 0;
        animation: fadeIn 1s forwards;
        animation-delay: 1s;
      }

      .team-title {
        color: var(--primary-color);
        font-size: 2.5rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 3rem;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
        left: 50%;
        transform: translateX(-50%);
      }

      .team-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 25%;
        width: 50%;
        height: 3px;
        background: linear-gradient(to right, transparent, var(--secondary-color), transparent);
        transition: all 0.5s ease;
      }

      .team-section:hover .team-title::after {
        width: 80%;
        left: 10%;
      }

      .team-slide {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.5s ease;
        transform: translateY(20px);
        opacity: 0;
        animation: fadeInUp 0.7s forwards;
        animation-delay: 1.2s;
      }

      .team-slide:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 20px 45px rgba(0,0,0,0.2);
      }

      .team-slide img {
        width: 100%;
        height: auto;
        border-radius: 15px 15px 0 0;
        transition: all 0.5s ease;
        filter: brightness(0.95);
      }

      .team-slide:hover img {
        transform: scale(1.05);
        filter: brightness(1.05);
      }

      .team-slide h5 {
        color: var(--primary-color);
        font-size: 1.2rem;
        font-weight: 600;
        padding: 1.5rem;
        margin: 0;
        transition: all 0.3s ease;
        text-align: center;
      }

      .team-slide:hover h5 {
        color: var(--secondary-color);
      }

      .swiper-pagination-bullet {
        background: var(--secondary-color);
        opacity: 0.5;
        transition: all 0.3s ease;
      }

      .swiper-pagination-bullet-active {
        opacity: 1;
        background: var(--primary-color);
        transform: scale(1.5);
      }

      /* Animations */
      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }

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

      @keyframes fadeInLeft {
        from {
          opacity: 0;
          transform: translateX(-30px);
        }
        to {
          opacity: 1;
          transform: translateX(0);
        }
      }

      @keyframes fadeInRight {
        from {
          opacity: 0;
          transform: translateX(30px);
        }
        to {
          opacity: 1;
          transform: translateX(0);
        }
      }

      @media (max-width: 768px) {
        .page-title {
          padding: 40px 0;
        }

        .page-title h2 {
          font-size: 2rem;
        }

        .about-content h3 {
          font-size: 1.8rem;
        }

        .stats-box {
          margin-bottom: 30px;
        }

        .team-title {
          font-size: 2rem;
        }
      }
    </style>
</head>
<body>
    
<?php require('inc/header.php');?>

<div class="page-title">
  <h2 class="h-font">ABOUT US</h2>
  <div class="h-line"></div>
  <p>
    <?php echo $settings_r['site_about'] ?>
  </p>
</div>

<div class="container about-section">
  <div class="row justify-content-between align-items-center">
    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
      <div class="about-content">
        <h3>Minangun Farm Resort</h3>
        <p>
          Minangun Farm Resort, a serene escape nestled in the heart of Pampanga, Philippines, offers a tranquil retreat. Its lush greenery, comfortable accommodations, and peaceful ambiance create the perfect setting for relaxation. Guests can unwind by the pool, explore the beautiful gardens, or indulge in delicious local cuisine. With its focus on providing a serene and rejuvenating experience, Minangun Farm Resort is an ideal destination for those seeking a peaceful getaway.
        </p>
      </div>
    </div>
    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
      <div class="about-image">
        <img src="images/about/about.jpg" alt="Minangun Farm Resort">
      </div>
    </div>
  </div>
</div>


<div class="container mt-5">
  <div class="row">
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="stats-box text-center stats-box-1">
        <img src="images/about/hotel.svg" alt="Rooms">
        <h4>2 ROOMS</h4>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="stats-box text-center stats-box-2">
        <img src="images/about/customers.svg" alt="Customers">
        <h4>50+ Customers</h4>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="stats-box text-center stats-box-3">
        <img src="images/about/rating.svg" alt="Reviews">
        <h4>20 Reviews</h4>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="stats-box text-center stats-box-4">
        <img src="images/about/pool.svg" alt="Pool">
        <h4>Pool</h4>
      </div>
    </div>
  </div>
</div>

<div class="team-section">
  <h3 class="team-title h-font">MANAGEMENT TEAM</h3>

  <div class="container">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-5">
        <?php
          $about_r = selectAll('team_details');
          $path=ABOUT_IMG_PATH;
          while($row = mysqli_fetch_assoc($about_r)){
            echo <<<data
              <div class="swiper-slide team-slide">
                <img src="$path$row[picture]" alt="Team Member">
                <h5>$row[name]</h5>
              </div>
            data;
          }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>

<?php require('inc/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 5,
    spaceBetween: 40,
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 3,
      },
    }
  });
</script>

</body>
</html>