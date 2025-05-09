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
    <title>Admin Panel - Guests</title>
    <link rel="icon" href="../images/about/title.png" type="image/x-icon" />
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --resort-primary: #8B4513;
            --resort-secondary: #DEB887;
            --resort-accent: #F4A460;
            --resort-light: #FFEFD5;
            --resort-dark: #5C2E0B;
            --gold: #D4AF37;
            --light-gold: #F4E7BE;
        }

        #main-content {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            margin: 20px;
            padding: 25px;
        }

        .card {
            border-radius: 15px !important;
            overflow: hidden;
            border: none !important;
            box-shadow: 0 0 25px rgba(0,0,0,0.05) !important;
        }

        .card-body {
            padding: 25px;
        }

        h3 {
            color: var(--resort-dark);
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--resort-accent);
            border-radius: 2px;
        }

        .search-container {
            position: relative;
            max-width: 300px;
            margin-left: auto;
        }

        .search-container::before {
            content: '\f002';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--resort-primary);
            opacity: 0.7;
            z-index: 1;
        }

        .search-input {
            padding: 12px 40px 12px 20px;
            border: 2px solid #e1e1e1;
            border-radius: 12px;
            width: 100%;
            transition: all 0.3s;
            font-size: 14px;
        }

        .search-input:focus {
            border-color: var(--resort-accent);
            box-shadow: 0 0 15px rgba(244, 164, 96, 0.1);
            outline: none;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            margin-top: 20px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark)) !important;
        }

        .table th {
            color: var(--resort-light) !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
            padding: 15px !important;
            border: none !important;
            white-space: nowrap;
        }

        .table td {
            padding: 15px !important;
            vertical-align: middle;
            border-bottom: 1px solid rgba(0,0,0,0.05) !important;
            font-size: 14px;
        }

        .table tbody tr {
            transition: all 0.3s;
        }

        .table tbody tr:hover {
            background-color: rgba(244, 164, 96, 0.05);
        }

        .verified-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .verified-badge.yes {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
        }

        .verified-badge.no {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-badge.active {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
        }

        .status-badge.inactive {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }

        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid var(--resort-light);
            border-top-color: var(--resort-accent);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--resort-dark);
        }

        .empty-state i {
            font-size: 48px;
            color: var(--resort-accent);
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .search-container {
                max-width: 100%;
                margin-bottom: 20px;
            }

            .table-responsive {
                border-radius: 12px;
                overflow: hidden;
            }

            .table td, .table th {
                padding: 12px !important;
            }
        }
    </style>
</head>
<body class="bg-light">
    
<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Guests</h3>
                <div class="search-container">
                    <input type="text" oninput="search_user(this.value)" class="search-input" placeholder="Search guests...">
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="loading-overlay">
                            <div class="loading-spinner"></div>
                        </div>
                        <table class="table table-hover" style="min-width: 1300px;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone no.</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Verified</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody id="users-data">               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>

<?php require('inc/scripts.php'); ?>

<script src="scripts/users.js"></script>

<script>
// Add this to your existing users.js or create a new script
document.addEventListener('DOMContentLoaded', function() {
    // Function to format the verified and status badges
    function formatBadges() {
        // Format verified badges
        document.querySelectorAll('[data-verified]').forEach(badge => {
            const isVerified = badge.getAttribute('data-verified');
            badge.className = `verified-badge ${isVerified === 'yes' ? 'yes' : 'no'}`;
            badge.innerHTML = `
                <i class="fas fa-${isVerified === 'yes' ? 'check-circle' : 'times-circle'}"></i>
                ${isVerified === 'yes' ? 'Verified' : 'Not Verified'}
            `;
        });

        // Format status badges
        document.querySelectorAll('[data-status]').forEach(badge => {
            const status = badge.getAttribute('data-status');
            badge.className = `status-badge ${status.toLowerCase()}`;
            badge.innerHTML = `
                <i class="fas fa-${status.toLowerCase() === 'active' ? 'circle' : 'circle-xmark'}"></i>
                ${status}
            `;
        });
    }

    // Call formatBadges after loading data
    const originalSearchUser = window.search_user;
    window.search_user = function(value) {
        const loadingOverlay = document.querySelector('.loading-overlay');
        loadingOverlay.style.display = 'flex';

        // Call the original search function
        originalSearchUser(value);

        // Format badges after a short delay to ensure data is loaded
        setTimeout(() => {
            formatBadges();
            loadingOverlay.style.display = 'none';
        }, 300);
    };

    // Initial call to format existing badges
    formatBadges();
});
</script>

</body>
</html> 