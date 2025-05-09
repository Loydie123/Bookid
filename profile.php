<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - PROFILE</title>
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

      .custom-bg {
        background: linear-gradient(to right, var(--primary-color), #34495e);
        color: white;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border: none;
      }

      .custom-bg:hover {
        background: linear-gradient(to right, var(--secondary-color), #e0c675);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      }

      .form-control {
        border-radius: 10px;
        padding: 10px 15px;
        font-size: 15px;
        border: 1px solid #e1e1e1;
        transition: all 0.3s;
      }

      .form-control:focus {
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
        border-color: var(--secondary-color);
      }

      .form-label {
        color: var(--text-dark);
        font-weight: 500;
        margin-bottom: 5px;
      }
      
      .profile-section {
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      }
      
      .profile-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
      }
      
      .profile-header {
        background: linear-gradient(to right, var(--primary-color), #34495e);
        color: white;
        padding: 20px;
        border-radius: 15px 15px 0 0;
      }
      
      .profile-header h5 {
        margin: 0;
        font-weight: 700;
        letter-spacing: 1px;
      }
      
      .profile-content {
        padding: 25px;
        background: white;
        border-radius: 0 0 15px 15px;
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
      
      .page-title {
        color: var(--primary-color);
        font-weight: 700;
        letter-spacing: 0.5px;
      }
      
      .h-line {
        width: 150px;
        margin: 0;
        height: 2px;
        background-color: var(--secondary-color);
      }
      
      .profile-img-container {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 20px auto;
      }
      
      .profile-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s;
      }
      
      .edit-overlay {
        position: absolute;
        bottom: 0;
        right: 0;
        background: var(--secondary-color);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
      }
      
      .btn {
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: 600;
        letter-spacing: 0.5px;
      }
      
      /* Style to add a subtle pulse effect to the submit buttons */
      @keyframes subtle-pulse {
        0% { box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
        50% { box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3); }
        100% { box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
      }
      
      .btn.custom-bg {
        animation: subtle-pulse 3s infinite;
      }
      
      .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        margin-bottom: 20px;
      }
      
      .upload-btn {
        background: linear-gradient(to right, var(--primary-color), #34495e);
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 14px;
        cursor: pointer;
        display: inline-block;
        transition: all 0.3s;
      }
      
      .upload-btn:hover {
        background: linear-gradient(to right, var(--secondary-color), #e0c675);
        transform: translateY(-2px);
      }
      
      input[type="file"] {
        position: relative;
        z-index: 1;
      }
      
      /* Custom Alert Styling */
      .custom-alert {
        position: fixed;
        top: 80px;
        right: 25px;
        max-width: 300px;
        z-index: 9999;
        border-left: 4px solid;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        animation: slideIn 0.3s forwards;
      }
      
      @keyframes slideIn {
        from {
          transform: translateX(100%);
          opacity: 0;
        }
        to {
          transform: translateX(0);
          opacity: 1;
        }
      }
      
      /* Notification Styles to match confirm_booking.php */
      .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 25px;
        background: linear-gradient(to right, #2ecc71, #27ae60);
        color: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        z-index: 9999;
        opacity: 0;
        transform: translateY(-20px);
        transition: all 0.3s ease-in-out;
        font-weight: 500;
        border-left: 4px solid #2ecc71;
        padding-left: 20px;
      }

      .notification.show {
        opacity: 1;
        transform: translateY(0);
      }
      
      .notification.error {
        background: linear-gradient(to right, #e74c3c, #c0392b);
        border-left: 4px solid #e74c3c;
      }
    </style>
</head>

<body class="bg-light">
    
    <div id="notification" class="notification" style="display: none;">
      <i class="bi bi-check-circle-fill me-2"></i>
      <span id="notification-text">Profile updated successfully!</span>
    </div>
    
    <?php 
        require('inc/header.php');

        if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
            redirect('index.php');
        }

        $u_exist = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['uId']],'s');

        if(mysqli_num_rows($u_exist)==0){
            redirect('index.php');
        }

        $u_fetch = mysqli_fetch_assoc($u_exist) ;
    ?>

    <div class="container">
        <div class="row">

            <div class="col-12 my-5 px-4" data-aos="fade-down">
                <h2 class="fw-bold page-title">MY PROFILE</h2>
                <div class="breadcrumb-container mt-2" style="font-size: 14px;">
                    <a href="index.php">HOME</a>
                    <span> > </span>
                    <a href="#">PROFILE</a>
                </div>
                <div class="h-line mt-3" data-aos="fade-up" data-aos-delay="100"></div>
            </div>
            
            <div class="col-md-4 mb-4 ps-md-4 pe-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="profile-section">
                    <div class="profile-header">
                        <h5><i class="bi bi-person-circle me-2"></i>PROFILE PICTURE</h5>
                    </div>
                    <div class="profile-content text-center">
                        <form id="profile-form">
                            <div class="profile-img-container">
                                <img src="<?php echo USERS_IMG_PATH.$u_fetch['profile'] ?>" class="profile-img">
                                <label for="profile_input" class="edit-overlay">
                                    <i class="bi bi-pencil-fill"></i>
                                </label>
                                <input type="file" name="profile" id="profile_input" accept=".jpg, .jpeg, .png, .webp" class="d-none" required>
                            </div>
                            
                            <button type="submit" class="btn text-white custom-bg shadow-none mt-3">
                                <i class="bi bi-check-circle me-2"></i>Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-4 ps-md-4 pe-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="profile-section h-100">
                    <div class="profile-header">
                        <h5><i class="bi bi-person-vcard me-2"></i>PERSONAL INFORMATION</h5>
                    </div>
                    <div class="profile-content">
                        <form id="info-form">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" value="<?php echo $u_fetch['name'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input name="phonenum" type="number" value="<?php echo $u_fetch['phonenum'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input name="dob" type="date" value="<?php echo $u_fetch['dob'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control shadow-none" rows="1" required><?php echo $u_fetch['address'] ?></textarea>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Zipcode</label>
                                    <input name="zipcode" type="number" value="<?php echo $u_fetch['zipcode'] ?>" class="form-control shadow-none" required>
                                </div>
                            </div>
                            <button type="submit" class="btn text-white custom-bg shadow-none">
                                <i class="bi bi-save me-2"></i>Save Changes
                            </button>
                        </form>
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

        // Alert function
        function alert(type, msg) {
            // Get the notification elements
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notification-text');
            
            // Set the message and class based on type
            notificationText.textContent = msg;
            
            if (type === 'error') {
                notification.classList.add('error');
            } else {
                notification.classList.remove('error');
            }
            
            // Show the notification
            notification.style.display = 'block';
            setTimeout(() => {
                notification.classList.add('show');
            }, 10);
            
            // Hide notification after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 300);
            }, 3000);
        }

        // Preview profile image before upload
        document.getElementById('profile_input').onchange = function() {
            const [file] = this.files;
            if (file) {
                document.querySelector('.profile-img').src = URL.createObjectURL(file);
            }
        };

        let info_form = document.getElementById("info-form");

        info_form.addEventListener('submit',function(e){
            e.preventDefault();

            let data = new FormData();
            data.append('info_form','');
            data.append('name',info_form.elements['name'].value);
            data.append('phonenum',info_form.elements['phonenum'].value);
            data.append('address',info_form.elements['address'].value);
            data.append('zipcode',info_form.elements['zipcode'].value);
            data.append('dob',info_form.elements['dob'].value);

            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/profile.php",true);

            xhr.onload = function(){
                if(this.responseText == 'phone_already'){
                    alert('error', "Phone number is already registered!");
                }
                else if(this.responseText == 0){
                    alert('error', "No Changes Made!");
                }
                else{
                    alert('success', 'Changes saved!');
                }
            }

            xhr.send(data);

        })


        let profile_form = document.getElementById('profile-form');

        profile_form.addEventListener('submit',function(e){
            e.preventDefault();
            
            let submitBtn = this.querySelector('button[type="submit"]');
            let originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...';
            submitBtn.disabled = true;

            let data = new FormData();
            data.append('profile_form','');
            data.append('profile',profile_form.elements['profile'].files[0]);

            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/profile.php",true);

            xhr.onload = function()
            {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                if(this.responseText == 'inv_img'){
                    alert('error', "Only JPG, WEBP & PNG images are allowed!");
                }
                else if(this.responseText == 'upd_failed'){
                    alert('error', "Image upload failed!");
                }
                else if(this.responseText == 0){
                    alert('error', "Update failed!");
                }
                else{
                    alert('success', 'Profile picture updated successfully!');
                    // Instead of reloading, update the image src
                    let fileReader = new FileReader();
                    fileReader.onload = function() {
                        document.querySelector('.profile-img').src = fileReader.result;
                    }
                    fileReader.readAsDataURL(profile_form.elements['profile'].files[0]);
                }
            }

            xhr.send(data);

        })

    </script>

</body>
</html> 