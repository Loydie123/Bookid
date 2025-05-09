<?php 

    require('inc/essentials.php');
    require('inc/db_config.php'); // Ensure the database connection is available

    session_start();

    if(isset($_SESSION['admin_name'])) {
        logAuditTrail($_SESSION['admin_name'], 'LOGOUT', 'Admin logged out successfully');
    }

    session_destroy();
    redirect('index.php');

?>
