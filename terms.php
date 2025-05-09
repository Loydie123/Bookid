<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - TERMS AND CONDITIONS</title>
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

        .terms-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 50px;
            border: none;
            transition: all 0.3s ease;
        }

        .terms-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .terms-header {
            background: linear-gradient(to right, var(--primary-color), #34495e);
            color: white;
            padding: 25px 30px;
            position: relative;
            overflow: hidden;
        }

        .terms-header h3 {
            position: relative;
            z-index: 1;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .terms-header::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .terms-header::after {
            content: "";
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 250px;
            height: 250px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .terms-body {
            padding: 30px;
        }

        .terms-section {
            margin-bottom: 30px;
        }

        .terms-section h4 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .terms-section p {
            color: var(--text-dark);
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .terms-list {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
        }

        .terms-list li {
            margin-bottom: 15px;
            padding-left: 30px;
            position: relative;
            font-size: 1.05rem;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .terms-list li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 8px;
            width: 8px;
            height: 8px;
            background-color: var(--secondary-color);
            border-radius: 50%;
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            letter-spacing: 0.5px;
        }

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

        .terms-icon {
            font-size: 1.5rem;
            color: var(--secondary-color);
            margin-right: 10px;
            vertical-align: middle;
        }

        .custom-bg {
            background-color: var(--primary-color) !important;
            transition: all 0.3s ease;
        }
        
        .custom-bg:hover {
            background-color: #34495e !important;
        }
    </style>
</head>
<body class="bg-light">
    
<?php require('inc/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-12 my-5 mb-4 px-4" data-aos="fade-down">
            <h2 class="fw-bold page-title">TERMS AND CONDITIONS</h2>
            <div class="breadcrumb-container mt-2" style="font-size: 14px;">
                <a href="index.php">HOME</a>
                <span> > </span>
                <a href="#">TERMS</a>
            </div>
            <div class="h-line bg-dark mt-3" data-aos="fade-up" data-aos-delay="100" style="width: 150px; height: 2px;"></div>
        </div>

        <div class="col-12 px-4" data-aos="fade-up" data-aos-delay="200">
            <div class="terms-container">
                <div class="terms-header">
                    <h3><i class="bi bi-file-earmark-text terms-icon"></i> Minangun Resort Terms and Conditions</h3>
                </div>
                <div class="terms-body">
                    <p class="lead mb-4">Please read these terms and conditions carefully before making a reservation or using our facilities. By engaging with our services, you agree to be bound by these terms.</p>
                    
                    <div class="terms-section">
                        <h4>1. Reservation and Booking Terms</h4>
                        <ul class="terms-list">
                            <li>Reservations are subject to availability and confirmation by the resort management.</li>
                            <li>A valid ID is required upon check-in for verification purposes.</li>
                            <li>The person making the reservation must be at least 18 years of age.</li>
                            <li>A 50% non-refundable deposit is required to confirm your booking.</li>
                            <li>Full payment must be made upon check-in.</li>
                            <li>Modifications to bookings must be communicated at least 72 hours prior to scheduled check-in.</li>
                        </ul>
                    </div>

                    <div class="terms-section">
                        <h4>2. Cancellation Policy</h4>
                        <ul class="terms-list">
                            <li>Cancellations made more than 7 days prior to arrival: Admin fee of 10% of the deposit.</li>
                            <li>Cancellations made within 3-7 days prior to arrival: 50% of the deposit will be forfeited.</li>
                            <li>Cancellations made less than 3 days prior to arrival: 100% of the deposit will be forfeited.</li>
                            <li>No-shows: The entire deposit will be forfeited.</li>
                            <li>Rescheduling is allowed once, subject to availability and must be within 30 days of the original booking date.</li>
                        </ul>
                    </div>

                    <div class="terms-section">
                        <h4>3. Check-in and Check-out</h4>
                        <ul class="terms-list">
                            <li>Day tours: Check-in at 2:00 PM, Check-out at 11:00 PM.</li>
                            <li>Overnight stays: Check-in at 2:00 PM, Check-out at 11:00 AM.</li>
                            <li>Early check-in and late check-out requests are subject to availability and may incur additional charges.</li>
                            <li>A penalty fee will be charged for late check-outs without prior arrangement.</li>
                        </ul>
                    </div>

                    <div class="terms-section">
                        <h4>4. Resort Facilities and Conduct</h4>
                        <ul class="terms-list">
                            <li>Guests are responsible for their personal belongings. The resort is not liable for any loss or damage.</li>
                            <li>Guests will be held financially responsible for any damage to resort property.</li>
                            <li>Minangun is a pet-friendly resort, but owners are responsible for their pets' behavior and cleanliness.</li>
                            <li>Smoking is only permitted in designated areas.</li>
                            <li>Excessive noise that disturbs other guests is not allowed, especially between 10:00 PM and 8:00 AM.</li>
                            <li>Possession of illegal drugs, weapons, or hazardous materials is strictly prohibited and will result in immediate eviction without refund.</li>
                        </ul>
                    </div>

                    <div class="terms-section">
                        <h4>5. Force Majeure</h4>
                        <p>The resort shall not be liable for any failure to perform its obligations under this agreement where such failure is due to circumstances beyond its reasonable control, including but not limited to natural disasters, government actions, or other unforeseen events.</p>
                    </div>

                    <div class="terms-section">
                        <h4>6. Amendments to Terms</h4>
                        <p>Minangun Resort reserves the right to modify these terms and conditions at any time. Updated terms will be made available on our website and at the reception desk.</p>
                    </div>
                    
                    <div class="alert alert-warning mt-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Important Notice:</strong> By making a reservation, you acknowledge that you have read, understood, and agreed to be bound by these terms and conditions.
                    </div>
                    
                    <div class="text-center mt-5">
                        <a href="book.php" class="btn text-white custom-bg shadow-none px-4 py-2">
                            <i class="bi bi-calendar-check me-2"></i>Book Now!
                        </a>
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
</script>

</body>
</html>
