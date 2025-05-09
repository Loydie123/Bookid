<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - PRIVACY POLICY</title>
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

        .privacy-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 50px;
            border: none;
            transition: all 0.3s ease;
        }

        .privacy-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .privacy-header {
            background: linear-gradient(to right, var(--primary-color), #34495e);
            color: white;
            padding: 25px 30px;
            position: relative;
            overflow: hidden;
        }

        .privacy-header h3 {
            position: relative;
            z-index: 1;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .privacy-header::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .privacy-header::after {
            content: "";
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 250px;
            height: 250px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .privacy-body {
            padding: 30px;
        }

        .privacy-section {
            margin-bottom: 30px;
        }

        .privacy-section h4 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .privacy-section p {
            color: var(--text-dark);
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .privacy-list {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
        }

        .privacy-list li {
            margin-bottom: 15px;
            padding-left: 30px;
            position: relative;
            font-size: 1.05rem;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .privacy-list li::before {
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

        .privacy-icon {
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
            <h2 class="fw-bold page-title">PRIVACY POLICY</h2>
            <div class="breadcrumb-container mt-2" style="font-size: 14px;">
                <a href="index.php">HOME</a>
                <span> > </span>
                <a href="#">PRIVACY</a>
            </div>
            <div class="h-line bg-dark mt-3" data-aos="fade-up" data-aos-delay="100" style="width: 150px; height: 2px;"></div>
        </div>

        <div class="col-12 px-4" data-aos="fade-up" data-aos-delay="200">
            <div class="privacy-container">
                <div class="privacy-header">
                    <h3><i class="bi bi-shield-lock privacy-icon"></i> Minangun Resort Privacy Policy</h3>
                </div>
                <div class="privacy-body">
                    <p class="lead mb-4">At Minangun Resort, we respect your privacy and are committed to protecting your personal data. This privacy policy explains how we collect, use, and safeguard your information when you visit our website or use our services.</p>
                    
                    <div class="privacy-section">
                        <h4>1. Information We Collect</h4>
                        <p>We collect personal information that you voluntarily provide to us when you make a reservation, register for an account, or contact us. This may include:</p>
                        <ul class="privacy-list">
                            <li>Contact information (name, email address, phone number, mailing address)</li>
                            <li>Payment information (credit card details, billing address)</li>
                            <li>Identification details (ID cards, passports)</li>
                            <li>Reservation preferences and special requests</li>
                            <li>Feedback and survey responses</li>
                            <li>Device information and browsing data when you visit our website</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h4>2. How We Use Your Information</h4>
                        <p>We use the information we collect for various purposes, including:</p>
                        <ul class="privacy-list">
                            <li>Processing and confirming your reservations</li>
                            <li>Providing and personalizing our services to meet your needs</li>
                            <li>Communicating with you about your reservation or account</li>
                            <li>Sending promotional offers and marketing communications (with your consent)</li>
                            <li>Improving our website, services, and customer experience</li>
                            <li>Complying with legal obligations and preventing fraudulent activities</li>
                        </ul>
                    </div>

                    <div class="privacy-section">
                        <h4>3. Information Sharing and Disclosure</h4>
                        <p>We may share your personal information in limited circumstances:</p>
                        <ul class="privacy-list">
                            <li>With service providers who assist us in operating our business</li>
                            <li>With third-party payment processors to complete transactions</li>
                            <li>With trusted partners to provide services you've requested</li>
                            <li>To comply with legal requirements, enforce our policies, or respond to legal process</li>
                            <li>In connection with a business transaction such as a merger or acquisition</li>
                        </ul>
                        <p>We do not sell or rent your personal information to third parties for marketing purposes.</p>
                    </div>

                    <div class="privacy-section">
                        <h4>4. Data Security</h4>
                        <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, accidental loss, or damage. While we strive to protect your personal information, no method of transmission over the Internet or electronic storage is 100% secure.</p>
                    </div>

                    <div class="privacy-section">
                        <h4>5. Your Rights and Choices</h4>
                        <p>Depending on your location, you may have certain rights regarding your personal information, including:</p>
                        <ul class="privacy-list">
                            <li>Accessing and reviewing the personal information we hold about you</li>
                            <li>Updating or correcting inaccurate information</li>
                            <li>Requesting deletion of your personal information</li>
                            <li>Opting out of marketing communications</li>
                            <li>Withdrawing consent where processing is based on consent</li>
                        </ul>
                        <p>To exercise these rights, please contact us using the information provided below.</p>
                    </div>

                    <div class="privacy-section">
                        <h4>6. Cookies and Tracking Technologies</h4>
                        <p>Our website uses cookies and similar technologies to enhance your browsing experience and analyze website traffic. You can manage your cookie preferences through your browser settings.</p>
                    </div>

                    <div class="privacy-section">
                        <h4>7. Changes to This Privacy Policy</h4>
                        <p>We may update this privacy policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. The updated policy will be posted on our website with the revised effective date.</p>
                    </div>

                    <div class="privacy-section">
                        <h4>8. Contact Us</h4>
                        <p>If you have any questions, concerns, or requests regarding this privacy policy or our data practices, please contact us at:</p>
                        <p>Email: info@minangunresort.com<br>
                        Phone: +63 912 345 6789<br>
                        Address: Minangun Resort, Alaminos, Philippines</p>
                    </div>
                    
                    <div class="alert alert-warning mt-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Effective Date:</strong> This privacy policy was last updated on August 1, 2023.
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
