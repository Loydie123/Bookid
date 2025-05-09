<?php 

require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

if(isset($_GET['email_confirmation']))
{
    $data = filteration($_GET);

    $query = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? LIMIT 1",
                [$data['email'],$data['token']], 'ss');

    if(mysqli_num_rows($query)==1)
    {
        $fetch = mysqli_fetch_assoc($query);
        
        // Check if token has expired
        $expired = false;
        if($fetch['t_expire']) {
            $expiry_timestamp = strtotime($fetch['t_expire']);
            $current_timestamp = time();
            if($current_timestamp > $expiry_timestamp) {
                $expired = true;
            }
        }
        
        if($expired) {
            // Token has expired, redirect to expired page or login with message
            header("Location: index.php?expired=1");
            exit;
        }
        
        if($fetch['is_verified']==0){
            // Only update if not already verified
            update("UPDATE `user_cred` SET `is_verified`=? WHERE `id`=?",[1,$fetch['id']],'ii');
        }

        // Always login and redirect
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['uId'] = $fetch['id'];
        $_SESSION['uName'] = $fetch['name'];
        $_SESSION['uPic'] = $fetch['profile'];
        $_SESSION['uPhone'] = $fetch['phonenum'];
        
        // Direct redirect without alert
        header("Location: index.php");
        exit;
    }
    else
    {
        // Just redirect even if invalid
        header("Location: index.php");
        exit;
    }       
}
else
{
    // Redirect if no parameters
    header("Location: index.php");
    exit;
}

?>