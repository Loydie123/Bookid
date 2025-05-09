<?php 
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minangun - Dashboard</title>
    <link rel="icon" href="../images/about/title.png" type="image/x-icon" />
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --resort-primary: #8B4513;
            --resort-secondary: #DEB887;
            --resort-accent: #F4A460;
            --resort-light: #FFEFD5;
        }

        .dashboard-card {
            background: white;
            border: none !important;
            border-radius: 15px !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15) !important;
        }

        .card-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--resort-primary);
        }

        .section-title {
            color: var(--resort-primary);
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: var(--resort-accent);
            border-radius: 2px;
        }

        .stats-value {
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--resort-primary);
            margin: 10px 0;
        }

        .stats-label {
            color: #666;
            font-size: 1rem;
            font-weight: 500;
        }

        .bg-resort-light {
            background-color: var(--resort-light);
        }
    </style>
</head>
<body class="bg-resort-light">
    
<?php 
require('inc/header.php'); 

$is_shutdown = mysqli_fetch_assoc(mysqli_query($con, "SELECT `shutdown` FROM `settings`"));

// ✅ Get Confirmed and Pending booking counts
$booking_stats = mysqli_fetch_assoc(mysqli_query($con, "
    SELECT 
        COUNT(CASE WHEN status='Paid' THEN 1 END) AS confirmed_bookings,
        COUNT(CASE WHEN status='Pending' THEN 1 END) AS pending_bookings
    FROM payment_confirmations
"));

// ✅ User Stats
$current_users = mysqli_fetch_assoc(mysqli_query($con,"
    SELECT
        COUNT(id) AS `total`,
        COUNT(CASE WHEN `status`=1 AND `is_verified`=1 THEN 1 END) AS `active`, 
        COUNT(CASE WHEN `is_verified`=0 THEN 1 END) AS `unverified`
    FROM `user_cred`
"));
?>      

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="section-title">DASHBOARD</h3>
            </div>

            <div class="row mb-4">
                <div class="col-md-3 mb-4">
                    <div class="dashboard-card card text-center p-4">
                        <i class="fas fa-check-circle card-icon"></i>
                        <h6 class="stats-label">Confirmed Bookings</h6>
                        <div class="stats-value"><?php echo $booking_stats['confirmed_bookings']; ?></div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="dashboard-card card text-center p-4">
                        <i class="fas fa-clock card-icon"></i>
                        <h6 class="stats-label">Pending Bookings</h6>
                        <div class="stats-value"><?php echo $booking_stats['pending_bookings']; ?></div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="section-title">USERS</h3>
            </div>

            <div class="row mb-4">
                <div class="col-md-3 mb-4">
                    <div class="dashboard-card card text-center p-4">
                        <i class="fas fa-users card-icon"></i>
                        <h6 class="stats-label">Total Users</h6>
                        <div class="stats-value"><?php echo $current_users['total'] ?></div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="dashboard-card card text-center p-4">
                        <i class="fas fa-user-check card-icon"></i>
                        <h6 class="stats-label">Verified Users</h6>
                        <div class="stats-value"><?php echo $current_users['active'] ?></div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="dashboard-card card text-center p-4">
                        <i class="fas fa-user-times card-icon"></i>
                        <h6 class="stats-label">Unverified Users</h6>
                        <div class="stats-value"><?php echo $current_users['unverified'] ?></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require('inc/scripts.php'); ?>
</body>
</html>
