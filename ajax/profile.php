<?php 

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');

    date_default_timezone_set("Asia/Manila");

    if(isset($_POST['info_form']))
    {
        $frm_data = filteration($_POST);
        session_start();

        $u_exist = select("SELECT * FROM `user_cred` WHERE `phonenum`=? AND `id` !=? LIMIT 1",
        [$frm_data['phonenum'],$_SESSION['uId']],"ss");

        if(mysqli_num_rows($u_exist)!=0){
            echo 'phone_already';
            exit;
        }

        // Complete address is stored in the address field, including region, province, city, barangay details
        $query = "UPDATE `user_cred` SET `name`=?, `address`=?, `phonenum`=?,
        `zipcode`=?, `dob`=? WHERE `id`=?";

        $values = [$frm_data['name'],$frm_data['address'],$frm_data['phonenum'],
        $frm_data['zipcode'],$frm_data['dob'],$_SESSION['uId']];

        if(update($query,$values,'ssssss')){
            $_SESSION['uName'] = $frm_data['name'];
            
            // Log the profile information update to audit trail with specific username
            logAuditTrail($_SESSION['uName'], 'UPDATE', $_SESSION['uName'] . ' updated their profile information');
            
            echo 1; 
        }
        else{
            echo 0;
        }
    }

    if(isset($_POST['profile_form']))
    {
        session_start();

        $img = uploadUserImage($_FILES['profile']);

        if($img == 'inv_img'){
            echo 'inv_img';
            exit;
        }
        else if($img == 'upd_failed'){
            echo 'upd_failed';
            exit;
        }

        $u_exist = select("SELECT `profile` FROM `user_cred` WHERE `id`=? LIMIT 1",[$_SESSION['uId']],"s");
        $u_fetch = mysqli_fetch_assoc($u_exist);

        deleteImage($u_fetch['profile'],USERS_FOLDER);

        $query = "UPDATE `user_cred` SET `profile`=? WHERE `id`=?";

        $values = [$img,$_SESSION['uId']];

        if(update($query,$values,'ss')){
            $_SESSION['uPic'] = $img;
            
            // Log the profile picture update to audit trail with specific username
            logAuditTrail($_SESSION['uName'], 'UPDATE', $_SESSION['uName'] . ' updated their profile picture');
            
            echo 1; 
        }
        else{
            echo 0;
        }
    }

?>