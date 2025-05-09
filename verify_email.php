<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

if(isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Verify the token and update user status
    $query = "SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `is_verified`=? LIMIT 1";
    $values = [$email, $token, 0];
    $result = select($query, $values, 'ssi');

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Check if token has expired
        if($user['t_expire'] && strtotime($user['t_expire']) < time()) {
            header("Location: index.php?expired=1");
            exit();
        }

        // Update user verification status
        $update = "UPDATE `user_cred` SET `is_verified`=?, `token`=?, `t_expire`=? WHERE `email`=?";
        $update_values = [1, null, null, $email];
        
        if(update($update, $update_values, 'isss')) {
            // Start session and log user in
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['uId'] = $user['id'];
            $_SESSION['uName'] = $user['name'];
            $_SESSION['uPic'] = $user['profile'];
            $_SESSION['uPhone'] = $user['phonenum'];

            // Handle redirect
            if (isset($_GET['redirect'])) {
                $redirect_url = $_GET['redirect'];
                header("Location: $redirect_url");
            } else {
                header("Location: index.php?email_verified=true");
            }
            exit();
        }
    }
}

// If verification fails, redirect to index
header("Location: index.php");
exit(); 