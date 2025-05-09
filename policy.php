<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - RESORT POLICIES</title>
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

        .policy-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 50px;
            border: none;
            transition: all 0.3s ease;
        }

        .policy-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .policy-header {
            background: linear-gradient(to right, var(--primary-color), #34495e);
            color: white;
            padding: 25px 30px;
            position: relative;
            overflow: hidden;
        }

        .policy-header h3 {
            position: relative;
            z-index: 1;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .policy-header::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .policy-header::after {
            content: "";
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 250px;
            height: 250px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .policy-body {
            padding: 30px;
        }

        .policy-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .policy-list li {
            margin-bottom: 20px;
            padding-left: 30px;
            position: relative;
            font-size: 1.05rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .policy-list li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 8px;
            width: 12px;
            height: 12px;
            background-color: var(--secondary-color);
            border-radius: 50%;
        }

        .policy-list li:hover {
            transform: translateX(5px);
            color: var(--primary-color);
        }

        .important-policy {
            font-weight: 600;
            color: #e74c3c !important;
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

        .policy-icon {
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
            <h2 class="fw-bold page-title">RESORT POLICIES</h2>
            <div class="breadcrumb-container mt-2" style="font-size: 14px;">
                <a href="index.php">HOME</a>
                <span> > </span>
                <a href="#">POLICIES</a>
            </div>
            <div class="h-line bg-dark mt-3" data-aos="fade-up" data-aos-delay="100" style="width: 150px; height: 2px;"></div>
        </div>

        <div class="col-12 px-4" data-aos="fade-up" data-aos-delay="200">
            <div class="policy-container">
                <div class="policy-header">
                    <h3><i class="bi bi-shield-check policy-icon"></i> Minangun Resort Policies</h3>
                </div>
                <div class="policy-body">
                    <p class="lead mb-4">Please read and understand our resort policies to ensure a pleasant stay for all guests.</p>
                    
                    <ul class="policy-list">
                        <li>Daytour-Check-in time: 2:00 PM, Check-out time: 11:00 PM<br>Overnight-Check-in time: 2:00 PM, Check-out time: 11:00 AM</li>
                        <li>Minangun is a pet-friendly resort.</li>
                        <li>Guests are responsible for any damage caused to the property.</li>
                        <li class="important-policy">50% down payment of the total rate is REQUIRED, and is non-refundable.</li>
                        <li>Full payment should be made up check-in.</li>
                        <li>Deadly weapons and illegal drugs are prohibited.</li>
                        <li>Maintain cleanliness.</li>
                    </ul>
                    
                    <div class="alert alert-warning mt-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Important Notice:</strong> By making a reservation, you acknowledge that you have read, understood, and agreed to abide by these policies.
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
