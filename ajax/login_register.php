<?php 

require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
require("../mail_config.php");

date_default_timezone_set("Asia/Manila");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

function send_mail($uemail,$token,$type)
{
    if($type == "email_confirmation"){
        $page = 'email_confirm.php';
        $subject = "Verify Your Bookid Account";
        $content = "confirm your email";
        
        $verification_link = SITE_URL . "verify_email.php?email=$uemail&token=$token&redirect=index.php?email_verified=true";
        
        $message = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e1e1e1; border-radius: 10px;'>
            <div style='text-align: center; margin-bottom: 20px;'>
                <h2 style='color: #0f172a; margin-bottom: 5px;'>Welcome to Bookid!</h2>
                <p style='color: #555; margin-bottom: 20px;'>Thank you for creating your account</p>
            </div>
            
            <div style='background-color: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 20px;'>
                <p style='color: #333; line-height: 1.5;'>Please verify your email address to complete your registration and gain full access to our services.</p>
                <p style='color: #333; line-height: 1.5;'>Your verification link will expire in 24 hours for security reasons.</p>
            </div>
            
            <div style='text-align: center; margin: 30px 0;'>
                <a href='$verification_link' style='background-color: #0f172a; color: white; padding: 12px 30px; text-decoration: none; border-radius: 50px; font-weight: bold; display: inline-block; font-size: 16px;'>Verify My Email</a>
            </div>
            
            <div style='margin-top: 30px; font-size: 14px; color: #777; line-height: 1.5;'>
                <p>If you didn't create an account with us, please ignore this email.</p>
                <p>If the button above doesn't work, copy and paste the following link into your browser:</p>
                <p style='word-break: break-all;'><a href='$verification_link' style='color: #b8860b; text-decoration: none;'>$verification_link</a></p>
            </div>
            
            <div style='margin-top: 30px; padding-top: 20px; border-top: 1px solid #e1e1e1; text-align: center; font-size: 14px; color: #777;'>
                <p>&copy; ".date('Y')." Bookid. All rights reserved.</p>
                <p>For assistance, please contact our support team.</p>
            </div>
        </div>";
    }
    else {
        $page = 'index.php';
        $subject = "Reset Your Bookid Account Password";
        $content = "reset your account";
        
        $message = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e1e1e1; border-radius: 10px;'>
            <div style='text-align: center; margin-bottom: 20px;'>
                <h2 style='color: #0f172a; margin-bottom: 5px;'>Reset Your Password</h2>
                <p style='color: #555; margin-bottom: 20px;'>We received a request to reset your Bookid account password</p>
            </div>
            
            <div style='background-color: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 20px;'>
                <p style='color: #333; line-height: 1.5;'>If you requested a password reset, click the button below to create a new password.</p>
                <p style='color: #333; line-height: 1.5;'>Your password reset link will expire in 24 hours for security reasons.</p>
            </div>
            
            <div style='text-align: center; margin: 30px 0;'>
                <a href='".SITE_URL."$page?$type&email=$uemail&token=$token"."' style='background-color: #0f172a; color: white; padding: 12px 30px; text-decoration: none; border-radius: 50px; font-weight: bold; display: inline-block; font-size: 16px;'>Reset My Password</a>
            </div>
            
            <div style='margin-top: 30px; font-size: 14px; color: #777; line-height: 1.5;'>
                <p>If you didn't request a password reset, please ignore this email or contact us if you have concerns.</p>
                <p>If the button above doesn't work, copy and paste the following link into your browser:</p>
                <p style='word-break: break-all;'><a href='".SITE_URL."$page?$type&email=$uemail&token=$token"."' style='color: #b8860b; text-decoration: none;'>".SITE_URL."$page?$type&email=$uemail&token=$token"."</a></p>
            </div>
            
            <div style='margin-top: 30px; padding-top: 20px; border-top: 1px solid #e1e1e1; text-align: center; font-size: 14px; color: #777;'>
                <p>&copy; ".date('Y')." Bookid. All rights reserved.</p>
                <p>For assistance, please contact our support team.</p>
            </div>
        </div>";
    }

    $result = sendMail($uemail, $subject, $message);
    return $result === true ? 1 : 0;
} 


if(isset($_POST['register']))
{
    try {
        // Log the received data
        file_put_contents('../debug_log.txt', "Registration attempt - POST data: " . print_r($_POST, true) . "\n", FILE_APPEND);
        file_put_contents('../debug_log.txt', "FILES data: " . print_r($_FILES, true) . "\n", FILE_APPEND);

        $data = filteration($_POST);

        // match password and confirm password field
        if($data['password'] != $data['cpass']) {
            file_put_contents('../debug_log.txt', "Password mismatch\n", FILE_APPEND);
            echo 'pass_mismatch';
            exit;
        }

        // check user exists or not
        $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1",
            [$data['email'],$data['phonenum']],"ss");

        if(mysqli_num_rows($u_exist)!=0){
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            file_put_contents('../debug_log.txt', "User exists check failed\n", FILE_APPEND);
            echo ($u_exist_fetch['email'] == $data['email']) ? 'email already' : 'phone_already';
            exit;
        }
        
        // Combine address components into a complete address
        $complete_address = $data['address'];
        if(isset($data['barangay']) && !empty($data['barangay'])) {
            $complete_address = "$data[barangay], $complete_address";
        }
        if(isset($data['city']) && !empty($data['city'])) {
            $complete_address = "$data[city], $complete_address";
        }
        if(isset($data['province']) && !empty($data['province'])) {
            $complete_address = "$data[province], $complete_address";
        }
        if(isset($data['region']) && !empty($data['region'])) {
            $complete_address = "$data[region], $complete_address";
        }

        file_put_contents('../debug_log.txt', "Complete address: $complete_address\n", FILE_APPEND);

        // Check if profile image was uploaded
        if(!isset($_FILES['profile']) || !isset($_FILES['profile']['tmp_name'])) {
            file_put_contents('../debug_log.txt', "No profile image uploaded\n", FILE_APPEND);
            echo 'no_image';
            exit;
        }

        // upload user image to server
        $img = uploadUserImage($_FILES['profile']);
        file_put_contents('../debug_log.txt', "Image upload result: $img\n", FILE_APPEND);

        if($img == 'inv_img'){
            echo 'inv_img';
            exit;
        }
        else if($img == 'upd_failed'){
            echo 'upd_failed';
            exit;
        }

        // send confirmation link to user's email
        $token = bin2hex(random_bytes(16));

        // Set token expiration time (24 hours from now)
        $expire_date = date('Y-m-d H:i:s', strtotime('+24 hours'));

        if(!send_mail($data['email'],$token,"email_confirmation")){
            file_put_contents('../debug_log.txt', "Mail sending failed\n", FILE_APPEND);
            echo 'mail_failed';
            exit;
        }

        $enc_pass = password_hash($data['password'],PASSWORD_BCRYPT);

        $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `zipcode`, `dob`,
                `profile`, `password`, `token`, `t_expire`) VALUES (?,?,?,?,?,?,?,?,?,?)";

        $values = [$data['name'],$data['email'],$complete_address,$data['phonenum'],$data['zipcode'],$data['dob'],
                $img,$enc_pass,$token,$expire_date];

        file_put_contents('../debug_log.txt', "About to execute query: $query\n", FILE_APPEND);
        file_put_contents('../debug_log.txt', "Values: " . print_r($values, true) . "\n", FILE_APPEND);

        $result = insert($query,$values,'ssssssssss');
        if($result === false) {
            file_put_contents('../debug_log.txt', "Insert failed with database error\n", FILE_APPEND);
            echo 'db_error';
            exit;
        } else if($result > 0) {
            // Log the registration in audit trail
            logAuditTrail($data['name'], 'SIGNUP', 'New user registration');
            file_put_contents('../debug_log.txt', "Insert successful\n", FILE_APPEND);
            echo 1;
        } else {
            file_put_contents('../debug_log.txt', "Insert failed - no rows affected\n", FILE_APPEND);
            echo 'ins_failed';
        }
    } catch (Exception $e) {
        file_put_contents('../debug_log.txt', "Error: " . $e->getMessage() . "\n", FILE_APPEND);
        echo 'error';
    }
} 

if(isset($_POST['login']))
{
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1",
    [$data['email_mob'],$data['email_mob']],"ss");

    if(mysqli_num_rows($u_exist)==0){
        echo 'inv_email_mob';
    }
    else{
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if($u_fetch['is_verified']==0){
            echo 'not_verified';
        }
        else if($u_fetch['status']==0){
            echo 'inactive';
        }
        else{
            if(!password_verify($data['password'],$u_fetch['password'])){
                echo 'invalid_pass';
            }
            else{
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['uId'] = $u_fetch['id'];
                $_SESSION['uName'] = $u_fetch['name'];
                $_SESSION['uPic'] = $u_fetch['profile'];
                $_SESSION['uPhone'] = $u_fetch['phonenum'];

                require_once('../admin/inc/essentials.php');
                logAuditTrail($_SESSION['uName'], 'LOGIN', 'User logged in');

                echo 1;
            }
        }
    }
}

if(isset($_POST['forgot_pass']))
{
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? LIMIT 1", [$data['email']],"s");

    if(mysqli_num_rows($u_exist)==0){
        echo 'inv_email';
    }
    else 
    {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if($u_fetch['is_verified']==0){
            echo 'not_verified';
        }
        else if($u_fetch['status']==0){
            echo 'inactive';
        }
        else{
            // send reset link to email
            $token = bin2hex(random_bytes(16));

            if(!send_mail($data['email'],$token,'account_recovery')){
                echo 'mail_failed';
            }
            else
            {
                $expire_date = date('Y-m-d H:i:s', strtotime('+24 hours'));

                $query = mysqli_query($con,"UPDATE `user_cred` SET `token`='$token', `t_expire`='$expire_date' 
                    WHERE `id`='$u_fetch[id]'");
                
                if($query){
                    echo 1;
                }
                else{
                    echo'upd_failed';
                }
            }
        }
    }
}

if(isset($_POST['recover_user']))
{
    $data = filteration($_POST);

    $enc_pass = password_hash($data['pass'],PASSWORD_BCRYPT);

    $query = "UPDATE `user_cred` SET `password`=?, `token`=?, `t_expire`=? 
        WHERE `email`=? AND `token`=?";

    $values = [$enc_pass,null,null,$data['email'],$data['token']];

    if(update($query,$values,'sssss'))
    {
        echo 1;
    }
    else{
        echo 'failed';
    }
}

if(isset($_POST['resend_confirmation']))
{
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? LIMIT 1", [$data['email']],"s");

    if(mysqli_num_rows($u_exist)==0){
        echo 'inv_email';
    }
    else 
    {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if($u_fetch['is_verified']==1){
            echo 'already_verified';
        }
        else {
            // Generate new token and expiration date
            $token = bin2hex(random_bytes(16));
            $expire_date = date('Y-m-d H:i:s', strtotime('+24 hours'));

            // Send confirmation email
            if(!send_mail($data['email'],$token,'email_confirmation')){
                echo 'mail_failed';
            }
            else
            {
                // Update token and expiration
                $query = "UPDATE `user_cred` SET `token`=?, `t_expire`=? WHERE `email`=?";
                $values = [$token, $expire_date, $data['email']];

                if(update($query,$values,'sss')){
                    echo 1;
                }
                else{
                    echo 'upd_failed';
                }
            }
        }
    }
}

?>