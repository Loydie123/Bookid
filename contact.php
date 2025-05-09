<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - CONTACT</title>
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

      /* Contact Card Styling */
      .contact-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        height: 100%;
        padding: 30px;
        animation: fadeInLeft 0.8s forwards;
        transform: translateY(20px);
        opacity: 0;
        animation-delay: 0.3s;
      }

      .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
      }

      .contact-card iframe {
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
      }

      .contact-card iframe:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      }

      .contact-card h5 {
        color: var(--primary-color);
        font-size: 1.2rem;
        font-weight: 600;
        margin: 25px 0 15px;
        letter-spacing: 0.5px;
        position: relative;
        padding-left: 12px;
      }

      .contact-card h5::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background: var(--secondary-color);
        border-radius: 2px;
      }

      .contact-card a {
        color: var(--text-dark) !important;
        transition: all 0.3s ease;
        font-size: 1.05rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        margin-bottom: 10px;
      }

      .contact-card a i {
        margin-right: 10px;
        font-size: 1.2rem;
        color: var(--primary-color);
        transition: all 0.3s ease;
      }

      .contact-card a:hover {
        color: var(--primary-color) !important;
        transform: translateX(5px);
      }

      .contact-card a:hover i {
        color: var(--secondary-color);
        transform: scale(1.2);
      }

      /* Form Styling */
      .form-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        padding: 30px;
        animation: fadeInRight 0.8s forwards;
        transform: translateY(20px);
        opacity: 0;
        animation-delay: 0.5s;
        transition: all 0.4s ease;
      }

      .form-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
      }

      .form-card h5 {
        color: var(--primary-color);
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 25px;
        letter-spacing: 0.5px;
        position: relative;
        display: inline-block;
      }

      .form-card h5::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -8px;
        width: 40%;
        height: 3px;
        background: var(--secondary-color);
        transition: width 0.3s ease;
      }

      .form-card:hover h5::after {
        width: 100%;
      }

      .form-label {
        color: var(--text-dark);
        font-weight: 500;
        margin-bottom: 10px;
        font-size: 1.05rem;
      }

      .form-control {
        border-radius: 10px;
        padding: 12px 15px;
        border: 2px solid #eee;
        transition: all 0.3s ease;
        margin-bottom: 15px;
      }

      .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transform: translateY(-2px);
      }

      textarea.form-control {
        min-height: 120px;
      }

      .custom-bg {
        background-color: var(--primary-color) !important;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 500;
        letter-spacing: 0.5px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
      }

      .custom-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--secondary-color);
        transition: all 0.4s ease;
        z-index: -1;
      }

      .custom-bg:hover::before {
        left: 0;
      }

      .custom-bg:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }

      .social-links a {
        font-size: 1.5rem !important;
        margin-right: 15px;
        transition: all 0.3s ease;
      }

      .social-links a:hover {
        transform: translateY(-3px) scale(1.2) !important;
        color: var(--secondary-color) !important;
      }

      .container {
        padding: 0 30px 60px;
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

        .contact-card, .form-card {
          padding: 20px;
          margin-bottom: 30px;
        }

        .container {
          padding: 0 20px 40px;
        }
      }
    </style>
</head>
<body class="contact-page">
    
 <?php require('inc/header.php');?>

<div class="page-title">
  <h2 class="h-font">CONTACT US</h2>
  <div class="h-line"></div>
  <p>
    Welcome to Minangun Farm Resort!<br>
    At Minangun Farm Resort, your satisfaction is our top priority.<br>
    If you have any concerns or feedback, please don't hesitate to reach out!
  </p>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 mb-5">
      <div class="contact-card">
        <iframe class="w-100" height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       
        <h5>Address</h5>
        <a href="<?php echo $contact_r['gmap'] ?>" target="_blank">
          <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address'] ?>
        </a>

        <h5>Call us</h5>
        <a href="tel: +<?php echo $contact_r['pn1'] ?>">
          <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
        </a>
        <br>
        <?php 
           if($contact_r['pn2']!=''){
            echo<<<data
              <a href="tel: +$contact_r[pn2]">
                <i class="bi bi-telephone-fill"></i> +$contact_r[pn2]
              </a>
            data;
           }        
        ?>      

        <h5>Email</h5>
        <a href="mailto: <?php echo $contact_r['email'] ?>">
          <i class="bi bi-envelope-fill"></i> <?php echo $contact_r['email'] ?>
        </a>

        <h5>Follow us</h5>
        <div class="social-links">
          <?php 
            if($contact_r['fb']!=''){
              echo<<<data
              <a href="$contact_r[fb]" target="_blank">
                <i class="bi bi-facebook"></i>
              </a>
              data;
            }
          ?>
          <a href="<?php echo $contact_r['insta'] ?>" target="_blank">
            <i class="bi bi-instagram"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6">
      <div class="form-card">
        <form method="POST">
          <h5>Send a message</h5>
          <div class="mt-3">
            <label class="form-label">Name</label>
            <input name="name" required type="text" class="form-control shadow-none">
          </div>
          <div class="mt-3">
            <label class="form-label">Email</label>
            <input name="email" required type="email" class="form-control shadow-none">
          </div>
          <div class="mt-3">
            <label class="form-label">Subject</label>
            <input name="subject" required type="text" class="form-control shadow-none">
          </div>
          <div class="mt-3">
            <label class="form-label">Message</label>
            <textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
          </div>
          <button type="submit" name="send" class="btn text-white custom-bg mt-4">SEND MESSAGE</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  if(isset($_POST['send']))
  {
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
    $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

    $res = insert($q,$values,'ssss');
    if($res==1){
      alert('success','Mail Sent!');
    }
    else{
      alert('error','Server down! Try again later.');
    }
  }
?>

<?php require('inc/footer.php'); ?>

</body>
</html>