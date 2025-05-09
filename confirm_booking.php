<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - CONFIRM BOOKING</title>
    <link rel="icon" href="images/about/title.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <style>
      :root {
        --primary-color: #2c3e50;
        --secondary-color: #d4af37;
        --text-dark: #2c3e50;
        --text-light: #95a5a6;
      }

      body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
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
        background-color: var(--primary-color);
      }

      .h-font {
        color: var(--primary-color);
        letter-spacing: 1px;
      }

      .form-control {
        border-radius: 10px;
        padding: 10px 15px;
        font-size: 15px;
        border: 1px solid #e1e1e1;
        transition: all 0.3s;
      }

      .form-control:focus {
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
        border-color: var(--secondary-color);
      }

      .form-label {
        color: var(--text-dark);
        font-weight: 500;
        margin-bottom: 5px;
      }

      .custom-bg {
        background: linear-gradient(to right, var(--primary-color), #34495e);
        color: white;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border: none;
      }

      .custom-bg:hover {
        background: linear-gradient(to right, var(--secondary-color), #e0c675);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      }

      .payment-section {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(to bottom, #ffffff, #f8f9fa);
        padding: 30px 25px;
        border-radius: 20px;
        text-align: center;
        width: 90%;
        max-width: 320px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        z-index: 2000;
        border: 1px solid rgba(212, 175, 55, 0.3);
      }
      
      .payment-section h2 {
        font-size: 1.3rem;
        margin-bottom: 8px;
        color: var(--primary-color);
        font-weight: 700;
        letter-spacing: 0.5px;
        position: relative;
        padding-bottom: 8px;
      }
      
      .payment-section h2:after {
        content: '';
        position: absolute;
        width: 40px;
        height: 2px;
        background: linear-gradient(to right, var(--secondary-color), transparent);
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
      }
      
      .payment-section p {
        color: var(--text-light);
        font-size: 0.85rem;
        margin-bottom: 5px;
        line-height: 1.4;
      }
      
      .payment-section p:last-of-type {
        margin-bottom: 5px;
      }
      
      .payment-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1999;
        backdrop-filter: blur(5px);
      }
      
      .payment-section img {
        width: 100%;
        max-width: 200px;
        height: auto;
        margin: 10px auto;
        display: block;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        transition: transform 0.3s;
        border: 2px solid white;
      }

      .payment-section img:hover {
        transform: scale(1.02);
      }
      
      .close-payment {
        position: absolute;
        right: 15px;
        top: 15px;
        font-size: 22px;
        color: var(--text-light);
        cursor: pointer;
        background: rgba(248, 249, 250, 0.8);
        border: none;
        padding: 0;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      }
      
      .close-payment:hover {
        background: white;
        color: var(--primary-color);
        transform: rotate(90deg);
      }
      
      .btn-paid {
        display: inline-block;
        width: 100%;
        padding: 10px 15px;
        margin-top: 10px;
        background: linear-gradient(to right, var(--primary-color), #34495e);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-weight: 600;
        letter-spacing: 0.8px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        text-transform: uppercase;
      }
      
      .btn-paid:hover {
        background: linear-gradient(to right, var(--secondary-color), #e0c675);
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.2);
      }
      
      @keyframes fadeIn {
        from { opacity: 0; transform: translate(-50%, -48%); }
        to { opacity: 1; transform: translate(-50%, -50%); }
      }
      
      @keyframes fadeOut {
        from { opacity: 1; transform: translate(-50%, -50%); }
        to { opacity: 0; transform: translate(-50%, -48%); }
      }
      
      .payment-section.show {
        animation: fadeIn 0.3s ease forwards;
      }
      
      .payment-section.hide {
        animation: fadeOut 0.3s ease forwards;
      }

      /* Confirmation Modal Styles */
      .confirmation-section {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(to bottom, #ffffff, #f8f9fa);
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        width: 90%;
        max-width: 380px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        z-index: 2000;
        border: 1px solid rgba(212, 175, 55, 0.3);
      }
      
      .confirmation-section h2 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: var(--primary-color);
        font-weight: 700;
        letter-spacing: 0.5px;
        position: relative;
        padding-bottom: 10px;
      }
      
      .confirmation-section h2:after {
        content: '';
        position: absolute;
        width: 50px;
        height: 2px;
        background: linear-gradient(to right, var(--secondary-color), transparent);
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
      }
      
      .confirmation-section p {
        color: var(--text-light);
        font-size: 0.95rem;
        margin-bottom: 20px;
        line-height: 1.5;
      }
      
      .confirmation-section input, 
      .confirmation-section textarea {
        width: 100%;
        padding: 12px 15px;
        margin: 10px 0;
        border: 1px solid #e1e1e1;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s;
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
      }
      
      .confirmation-section input:focus, 
      .confirmation-section textarea:focus {
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
        border-color: var(--secondary-color);
        outline: none;
        background-color: white;
      }
      
      .confirmation-section textarea {
        resize: vertical;
        min-height: 80px;
      }
      
      .btn-submit {
        display: inline-block;
        width: 100%;
        padding: 14px 20px;
        margin-top: 20px;
        background: linear-gradient(to right, var(--primary-color), #34495e);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-size: 15px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-weight: 600;
        letter-spacing: 0.8px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        text-transform: uppercase;
      }
      
      .btn-submit:hover {
        background: linear-gradient(to right, var(--secondary-color), #e0c675);
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.2);
      }

      /* File upload styling */
      .confirmation-section input[type="file"] {
        border: 2px dashed #e1e1e1;
        background-color: #f8f9fa;
        padding: 20px 15px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
      }
      
      .confirmation-section input[type="file"]:hover {
        border-color: var(--secondary-color);
        background-color: #fff;
      }

      /* Notification Styles */
      .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 25px;
        color: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        z-index: 9999;
        opacity: 0;
        transform: translateY(-20px);
        transition: all 0.3s ease-in-out;
        font-weight: 500;
      }

      .notification.show {
        opacity: 1;
        transform: translateY(0);
      }

      /* Breadcrumb */
      .breadcrumb-container a {
        color: var(--primary-color);
        transition: all 0.3s;
        text-decoration: none;
        font-weight: 500;
      }

      .breadcrumb-container a:hover {
        color: var(--secondary-color);
      }

      .breadcrumb-container span {
        color: var(--text-light);
      }

      /* Room card styling */
      .room-image-container {
        overflow: hidden;
        border-radius: 10px;
      }

      .room-details h5 {
        color: var(--primary-color);
        font-weight: 600;
        margin: 15px 0 5px 0;
      }

      .room-details h6 {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.2rem;
      }

      .page-title {
        color: var(--primary-color);
        font-weight: 700;
        letter-spacing: 0.5px;
      }

      /* Note section */
      .note-section {
        background-color: #f8f9fa;
        border-left: 3px solid var(--secondary-color);
        padding: 15px;
        border-radius: 5px;
        margin-top: 20px;
      }

      .note-section h6 {
        color: var(--primary-color);
        font-weight: 600;
      }

      /* For file input */
      input[type="file"] {
        border: 1px dashed #ccc;
        padding: 15px;
        border-radius: 10px;
        width: 100%;
        background-color: #f8f9fa;
        transition: all 0.3s;
      }

      input[type="file"]:hover {
        border-color: var(--secondary-color);
        background-color: #f0f0f0;
      }

      /* Premium styling for payment section */
      .qr-container {
        position: relative;
        margin: 10px 0;
        overflow: hidden;
      }
      
      .qr-container:before {
        content: '';
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        background: linear-gradient(45deg, var(--secondary-color), transparent, var(--secondary-color));
        opacity: 0.2;
        border-radius: 15px;
        animation: rotate 8s linear infinite;
        z-index: -1;
      }
      
      @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      
      .form-group {
        margin-bottom: 15px;
        position: relative;
      }
      
      .form-label {
        display: block;
        text-align: left;
        margin-bottom: 5px;
        font-weight: 500;
      }
      
      /* Style to add a subtle pulse effect to the submit buttons */
      @keyframes subtle-pulse {
        0% { box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
        50% { box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3); }
        100% { box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
      }
      
      .btn-paid, .btn-submit {
        animation: subtle-pulse 3s infinite;
      }
      
      /* Add a premium badge to the payment section */
      .payment-section:before {
        content: '✓ Secure Payment';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        background: var(--secondary-color);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }
      
      /* Enhance the notification */
      .notification {
        border-left: 4px solid #2ecc71;
        padding-left: 20px;
      }
      
      /* Make form inputs look more premium */
      .confirmation-section input[readonly], 
      .confirmation-section textarea[readonly] {
        background: linear-gradient(to right, rgba(248, 249, 250, 0.5), rgba(255, 255, 255, 0.8));
        cursor: default;
        border: 1px solid rgba(212, 175, 55, 0.2);
        color: #2c3e50;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        transition: all 0.3s ease;
      }

      .confirmation-section input[readonly]:focus,
      .confirmation-section textarea[readonly]:focus {
        outline: none;
        box-shadow: 0 3px 15px rgba(212, 175, 55, 0.1);
        border-color: rgba(212, 175, 55, 0.3);
        transform: translateY(-1px);
      }

      .form-group {
        margin-bottom: 20px;
        position: relative;
      }

      .form-group:before {
        content: '';
        position: absolute;
        left: 0;
        top: -5px;
        width: 30px;
        height: 2px;
        background: linear-gradient(to right, #d4af37, transparent);
        opacity: 0.5;
      }

      .confirmation-section h2 {
        color: #2c3e50;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 25px;
        position: relative;
      }

      .confirmation-section h2:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 2px;
        background: linear-gradient(to right, #d4af37, transparent);
      }

      .confirmation-section p {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 25px;
      }

      #payment_proof {
        border: 2px dashed rgba(212, 175, 55, 0.2);
        padding: 15px;
        border-radius: 10px;
        background: rgba(248, 249, 250, 0.5);
        transition: all 0.3s ease;
      }

      #payment_proof:hover {
        border-color: rgba(212, 175, 55, 0.4);
        background: rgba(255, 255, 255, 0.8);
      }

      .btn-submit {
        background: linear-gradient(to right, #2c3e50, #34495e);
        border: none;
        color: white;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }

      .btn-submit:hover {
        background: linear-gradient(to right, #d4af37, #e0c675);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 175, 55, 0.2);
      }

      /* Update the room-type class in the style section */
      .room-type {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        display: block;
        font-size: 14px;
        text-align: center;
        width: 100% !important;
        margin: 0 auto;
      }
      .room-type-daytour {
        background: rgba(0, 123, 255, 0.1) !important;
        color: #007bff !important;
        border-color: rgba(0, 123, 255, 0.2) !important;
      }
      .room-type-overnight {
        background: rgba(255, 105, 180, 0.1) !important;
        color: #ff69b4 !important;
        border-color: rgba(255, 105, 180, 0.2) !important;
      }

      /* Style for disabled dates */
      .date-disabled {
        background-color: #ffebee !important;
        color: #d32f2f !important;
        cursor: not-allowed !important;
        opacity: 0.7;
      }

    </style>
</head>
<body class="bg-light">
    
    <div id="notification" class="notification" style="display: none;">
      Booking confirmed! We will process your request soon.
    </div>

 <?php require('inc/header.php');?>

 <?php

      /*
        check room id from POST is present or not
        shutdown mode is active or not
        user is logged in or not
      */

    if(!isset($_POST['id']) || $settings_r['shutdown']==true){
      redirect('confirm_booking.php');
    }
    else if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
      redirect('confirm_booking.php');
    }

    // filter and get room and user data

    $data = filteration($_POST);

    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');

    if(mysqli_num_rows($room_res)==0){
      redirect('confirm_booking.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);

    $_SESSION['room'] = [
      "id" => $room_data['id'],
      "name" => $room_data['name'],
      "price" => $room_data['price'],
      "payment" => null,
      "available" => false,
    ];

    $user_res = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['uId']],"i");
    $user_data = mysqli_fetch_assoc($user_res);
 ?>

<div class="container">
  <div class="row">

    <div class="col-12 my-5 mb-4 px-4" data-aos="fade-down">
      <h2 class="fw-bold page-title">CONFIRM BOOKING</h2>
      <div class="breadcrumb-container mt-2" style="font-size: 14px;">
        <a href="index.php">HOME</a>
        <span> > </span>
        <a href="book.php">BOOK</a>
        <span> > </span>
        <a href="#">CONFIRM</a>
      </div>
      <div class="h-line bg-dark mt-3" data-aos="fade-up" data-aos-delay="100" style="width: 150px; height: 2px;"></div>
    </div>

    <div class="col-lg-7 col-md-12 px-4" data-aos="fade-up" data-aos-delay="200">
    
      <?php 
      
        $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
        $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
                  WHERE `room_id`='$room_data[id]' AND `thumb`='1'");

        if(mysqli_num_rows($thumb_q)>0){
          $thumb_res = mysqli_fetch_assoc($thumb_q);
          $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
        }  

        echo<<<data
          <div class="card p-3 shadow-sm rounded">
            <div class="room-image-container">
              <img src="$room_thumb" class="img-fluid rounded">
            </div>
            <div class="room-details mt-3">
              <h5>$room_data[name]</h5>
              <h6>₱$room_data[price]</h6>
            </div>
          </div>
        data;
      
      ?>

    </div>

    <div class="col-lg-5 col-md-12 px-4" data-aos="fade-up" data-aos-delay="300">
      <div class="card mb-4 border-0 shadow-sm rounded-3">
        <div class="card-body p-4">
          <form id="booking_form">
            <div class="booking-details">
              <h5 class="mb-4 fw-bold h-font">BOOKING DETAILS</h5>
              <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input name="phonenum" type="number" value="<?php echo $user_data['phonenum'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control shadow-none" rows="1" required><?php echo $user_data['address'] ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Check-in</label>
                    <input name="checkin" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Check-out</label>
                    <input name="checkout" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                </div>
              </div>
              <div class="spinner-border text-info mb-3 d-none" id="info_loader" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <h6 class="mb-3 p-2 text-center rounded" id="pay_info" style="background: #f8f9fa;">Provide check-in & check-out date!</h6>
              <button type="submit" name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled>Pay Now</button>

              <div class="note-section mt-3">
                <h6 class="mb-2 text-danger fw-bold">Note:</h6>
                <p class="small mb-1 text-danger">Keep in mind that downpayments are non-refundable.</p>
                <p class="small">Kindly review the <a href="policy.php" class="btn btn-sm" style="background: var(--secondary-color); color: white; font-weight: 500; border-radius: 20px; padding: 3px 10px; text-decoration: none; display: inline-block; margin-top: 3px; transition: all 0.3s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.1); font-size: 0.8rem;">Minangun's Resort Policies</a> before making a payment.</p>
              </div>
            </div>
          </form>
        </div>
      </div>    
    </div>
  </div>
</div>

<!-- Payment Section -->
<div class="payment-overlay" id="paymentOverlay"></div>
<div class="payment-section" id="paymentSection">
    <button class="close-payment" onclick="togglePaymentSection('hide')">&times;</button>
    <h2>GCash Payment</h2>
    <p>Scan this QR code to pay via GCash</p>
    <div id="booking_dates_display" class="mb-3 p-2 text-center rounded" style="background: #f8f9fa; font-size: 0.85rem;"></div>
    <div class="qr-container">
        <img src="images/about/gcash.jpg" alt="GCash QR Code">
    </div>
    <button type="button" class="btn-paid" onclick="showConfirmation()">
        <i class="bi bi-check2-circle me-2"></i>Confirm Payment
    </button>
</div>

<!-- Confirmation Section -->
<div class="confirmation-section" id="confirmationSection">
    <button class="close-payment" onclick="toggleConfirmation('hide')">&times;</button>
    <h2>Payment Confirmation</h2>
    <p>Please upload your proof of payment to complete your booking</p>
    <form id="confirmationForm" onsubmit="submitConfirmation(event)">
        <div class="form-group">
            <input type="text" value="<?php echo $_SESSION['room']['name']; ?>" readonly class="form-control mb-2 room-type <?php echo (strcasecmp($_SESSION['room']['name'], 'daytour') === 0) ? 'room-type-daytour' : 'room-type-overnight'; ?>" style="border-width: 1px;">
        </div>
        <div class="form-group">
            <input type="text" name="name" id="conf_name" readonly class="form-control">
        </div>
        <div class="form-group">
            <input type="email" name="email" value="<?php echo $user_data['email'] ?>" readonly class="form-control">
        </div>
        <div class="form-group">
            <textarea name="remarks" id="conf_dates_checkin" readonly class="form-control mb-2" style="min-height: 40px;"></textarea>
            <textarea name="remarks" id="conf_dates_checkout" readonly class="form-control" style="min-height: 40px;"></textarea>
        </div>
        <div class="form-group">
            <label for="payment_proof" class="form-label small text-muted">Upload Screenshot of Payment</label>
            <input type="file" name="payment_proof" id="payment_proof" accept="image/*" required>
        </div>
        <button type="submit" class="btn-submit">
            <i class="bi bi-upload me-2"></i>Submit Confirmation
        </button>
    </form>
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

  let booking_form = document.getElementById('booking_form');
  let info_loader = document.getElementById('info_loader');
  let pay_info = document.getElementById('pay_info');
  let paymentSection = document.getElementById('paymentSection');
  let paymentOverlay = document.getElementById('paymentOverlay');
  let bookingDetails = document.querySelector('.booking-details');
  let confirmationSection = document.getElementById('confirmationSection');
  let conf_name = document.getElementById('conf_name');
  let conf_dates_checkin = document.getElementById('conf_dates_checkin');
  let conf_dates_checkout = document.getElementById('conf_dates_checkout');

  booking_form.onsubmit = function(event) {
    event.preventDefault();
    togglePaymentSection('show');
  };

  function togglePaymentSection(action) {
    if (action === 'show') {
      paymentOverlay.style.display = 'block';
      paymentSection.style.display = 'block';
      paymentSection.classList.add('show');
      paymentSection.classList.remove('hide');
    } else {
      paymentSection.classList.add('hide');
      paymentSection.classList.remove('show');
      setTimeout(() => {
        paymentOverlay.style.display = 'none';
        paymentSection.style.display = 'none';
      }, 300);
    }
  }

  // Close payment if clicked outside
  paymentOverlay.onclick = function() {
    togglePaymentSection('hide');
  };

  // Add event listener for the close button
  document.querySelector('#paymentSection .close-payment').addEventListener('click', function(e) {
    e.preventDefault();
    togglePaymentSection('hide');
  });

  function check_availability()
   {
     let checkin_val = booking_form.elements['checkin'].value;
     let checkout_val = booking_form.elements['checkout'].value;

     booking_form.elements['pay_now'].setAttribute('disabled', true);

     if(checkin_val!='' && checkout_val!='')
     {

      pay_info.classList.add('d-none');
      pay_info.classList.replace('text-dark','text-danger');
      info_loader.classList.remove('d-none');

      let data = new FormData();

      data.append('check_availability','');
      data.append('check_in',checkin_val);
      data.append('check_out',checkout_val);

      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/confirm_booking.php",true);

      xhr.onload = function()
      {
       let data = JSON.parse(this.responseText);

       if(data.status == 'check_in_out_equal'){
        pay_info.innerText="You cannot check-out on the same day!";
        pay_info.style.background = "#f8d7da";
       }
       else if(data.status == 'check_out_earlier'){
        pay_info.innerText="Check-out date is earlier than check-in day!";
        pay_info.style.background = "#f8d7da";
       }
       else if(data.status == 'check_in_earlier'){
        pay_info.innerText="Check-in date is earlier than today's date!";
        pay_info.style.background = "#f8d7da";
       }
       else if(data.status == 'unavailable'){
        pay_info.innerText="Resort is not available for this check-in date!";
        pay_info.style.background = "#f8d7da";
       }
       else{
        pay_info.innerHTML = "No. of Days: "+data.days+"<br>Amount to Pay: ₱"+data.payment;
        pay_info.classList.replace('text-danger','text-dark');
        pay_info.style.background = "#d4edda";
        booking_form.elements['pay_now'].removeAttribute('disabled');
       }
        
       pay_info.classList.remove('d-none');
       info_loader.classList.add('d-none');
      }

      xhr.send(data);
     }
   }

  function showConfirmation() {
    // Get values from booking form
    let name = booking_form.elements['name'].value;
    let checkin = booking_form.elements['checkin'].value;
    let checkout = booking_form.elements['checkout'].value;
    
    // Format dates
    let checkinDate = new Date(checkin).toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
    let checkoutDate = new Date(checkout).toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });

    // Set values in confirmation form
    conf_name.value = name;
    conf_dates_checkin.value = `Check-in: ${checkinDate}`;
    conf_dates_checkout.value = `Check-out: ${checkoutDate}`;

    togglePaymentSection('hide');
    setTimeout(() => {
      toggleConfirmation('show');
    }, 300);
  }

  function toggleConfirmation(action) {
    if (action === 'show') {
      paymentOverlay.style.display = 'block';
      confirmationSection.style.display = 'block';
      confirmationSection.classList.add('show');
      confirmationSection.classList.remove('hide');
    } else {
      confirmationSection.classList.add('hide');
      confirmationSection.classList.remove('show');
      setTimeout(() => {
        paymentOverlay.style.display = 'none';
        confirmationSection.style.display = 'none';
      }, 300);
    }
  }

  function submitConfirmation(event) {
    event.preventDefault();
    
    let formData = new FormData(document.getElementById('confirmationForm'));
    let checkin = booking_form.elements['checkin'].value;
    let checkout = booking_form.elements['checkout'].value;
    let room_type = "<?php echo $_SESSION['room']['name']; ?>";
    let room_price = "<?php echo $_SESSION['room']['price']; ?>";
    
    formData.append('check_in', checkin);
    formData.append('check_out', checkout);
    formData.append('room_type', room_type);
    formData.append('room_price', room_price);
    
    // Show loading state
    document.querySelector('.btn-submit').innerHTML = `
        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
        Processing...
    `;
    document.querySelector('.btn-submit').disabled = true;
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload_proof.php', true);
    
    xhr.onload = function() {
        if (this.responseText === 'success') {
            toggleConfirmation('hide');
            
            // Add a delay before showing the notification
            setTimeout(() => {
                // Show notification
                const notification = document.getElementById('notification');
                notification.style.display = 'block';
                
                // Force reflow before adding show class
                notification.offsetHeight;
                
                setTimeout(() => {
                    notification.classList.add('show');
                }, 50);
                
                // Disable form elements
                booking_form.elements['pay_now'].setAttribute('disabled', true);
                booking_form.elements['checkin'].setAttribute('disabled', true);
                booking_form.elements['checkout'].setAttribute('disabled', true);
                
                // Hide notification after delay
                setTimeout(() => {
                    notification.classList.remove('show');
                    setTimeout(() => {
                        notification.style.display = 'none';
                    }, 300);
                }, 3000);
            }, 500); // Wait 500ms after confirmation modal closes
        } else {
            // Reset button state
            document.querySelector('.btn-submit').innerHTML = `
                <i class="bi bi-upload me-2"></i>Submit Confirmation
            `;
            document.querySelector('.btn-submit').disabled = false;
            alert('Error: ' + this.responseText);
        }
    };
    
    xhr.send(formData);
  }

  // Function to show notification
  function showNotification(message, isError = false) {
    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.style.background = isError ? '#ff6b6b' : '#2ecc71';
    notification.style.display = 'block';
    
    setTimeout(() => {
      notification.classList.add('show');
    }, 100);
    
    setTimeout(() => {
      notification.classList.remove('show');
      setTimeout(() => {
        notification.style.display = 'none';
      }, 300);
    }, 3000);
  }

  // Function to disable booked dates
  function disableBookedDates() {
    fetch('get_booked_dates.php')
        .then(response => response.json())
        .then(data => {
            const bookedDates = new Set(data.booked_dates);
            
            // Get the date inputs
            const checkinInput = document.querySelector('input[name="checkin"]');
            const checkoutInput = document.querySelector('input[name="checkout"]');
            
            // Set min date to today
            const today = new Date().toISOString().split('T')[0];
            checkinInput.min = today;
            checkoutInput.min = today;
            
            // Function to handle date selection
            function handleDateInput(e) {
                const selectedDate = e.target.value;
                if(bookedDates.has(selectedDate)) {
                    e.target.classList.add('date-disabled');
                    e.target.value = '';
                    showNotification('This date is already booked. Please select another date.', true);
                } else {
                    e.target.classList.remove('date-disabled');
                }
            }
            
            // Add event listeners
            checkinInput.addEventListener('change', handleDateInput);
            checkoutInput.addEventListener('change', handleDateInput);
        })
        .catch(error => console.error('Error:', error));
  }

  // Call when page loads
  document.addEventListener('DOMContentLoaded', disableBookedDates);
</script>

</body>
</html>
