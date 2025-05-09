<?php 

    require('admin/inc/essentials.php');
    require('admin/inc/db_config.php'); // Ensure this file sets up $con

    session_start();

    // Log the logout event before destroying the session
    if (isset($_SESSION['uName'])) {
        logAuditTrail($_SESSION['uName'], 'LOGOUT', 'User logged out');
    }

    session_destroy();
    redirect('index.php');

?>
