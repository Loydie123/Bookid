<style>
  .footer-link {
    color: #D4AF37 !important;
    transition: all 0.3s ease;
    font-weight: bold;
    display: inline-flex;
    align-items: center;
  }
  .footer-link:hover {
    transform: translateX(5px);
    text-shadow: 0 0 5px rgba(212, 175, 55, 0.5);
  }
  .footer-link i {
    margin-right: 8px;
    transition: all 0.3s ease;
  }
  .footer-link:hover i {
    transform: rotate(15deg);
  }
  .footer-gold-top {
    border-top: 2px solid #D4AF37;
  }
  .footer-gold-bottom {
    background-color: #fff;
  }
  .footer-heading {
    position: relative;
    color: #B18C3E;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding-bottom: 10px;
    margin-bottom: 15px;
  }
  .footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: linear-gradient(to right, #D4AF37, transparent);
  }
</style>

<div class="container-fluid bg-white mt-4 footer-gold-top">
  <div class="row">
    <div class="col-lg-4 p-4" style="max-width: 320px; margin: auto;">
     <img src="images/about/logo.png" class="card-img-bottom">
     <p></p>
    </div>
    <div class="col-lg-4 p-4">
       <h5 class="footer-heading">Quick Links</h5>
       <a href="index.php" class="d-inline-block mb-2 text-decoration-none footer-link"><i class="bi bi-house-door"></i> Home</a> <br>
       <a href="book.php" class="d-inline-block mb-2 text-decoration-none footer-link"><i class="bi bi-calendar-check"></i> Book</a> <br>
       <a href="facilities.php" class="d-inline-block mb-2 text-decoration-none footer-link"><i class="bi bi-building"></i> Facilities</a> <br>
       <a href="contact.php" class="d-inline-block mb-2 text-decoration-none footer-link"><i class="bi bi-envelope"></i> Contact us</a> <br>
       <a href="about.php" class="d-inline-block mb-2 text-decoration-none footer-link"><i class="bi bi-info-circle"></i> About</a>
    </div>
    <div class="col-lg-4 p-4">
       <h5 class="footer-heading">Connect</h5>
       <?php
         if($contact_r['fb']!=''){
          echo<<<data
           <a href="$contact_r[fb]" class="d-inline-block text-decoration-none mb-2 footer-link" target="_blank">
           <i class="bi bi-facebook"></i> Facebook
           </a><br>

          data;
         }
       ?>
       
      <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-decoration-none mb-2 footer-link" target="_blank">
        <i class="bi bi-instagram"></i> Instagram
      </a>
    </div>
  </div>
</div>

<h6 class="text-center p-2 m-0 footer-gold-bottom" style="background: linear-gradient(135deg, #E6C773, #B18C3E); color: #fff; text-shadow: 0px 1px 2px rgba(0,0,0,0.2); font-weight: 500; letter-spacing: 1px; font-size: 0.9rem;">
  <i class="bi bi-c-circle-fill"></i> BOOKID | All Rights Reserved <?php echo date('Y'); ?>
</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

  function alert(type, msg, position='body') 
  {
    const notification = document.getElementById('notification');
    
    // Clear any existing timeouts
    if (window.notificationTimeout) {
        clearTimeout(window.notificationTimeout);
    }
    
    // Set the message and reset classes
    notification.textContent = msg;
    notification.className = 'notification';
    
    // Add appropriate class based on type
    notification.classList.add(type === 'success' ? 'success' : 'error');
    
    // Show notification immediately
    notification.style.display = 'block';
    
    // Force reflow to ensure transition works
    notification.offsetHeight;
    
    // Add show class immediately
    notification.classList.add('show');
    
    // Hide notification after 3 seconds (reduced from 5)
    window.notificationTimeout = setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.style.display = 'none';
        }, 300);
    }, 3000);
  }

  function setActive()
  {
    let navbar = document.getElementById('dashboard-menu');
    let a_tags = navbar.getElementsByTagName('a');

    for(i=0; i<a_tags.length; i++)
    {
      let file = a_tags[i].href.split('/').pop();
      let file_name = file.split('.')[0];

      if(document.location.href.indexOf(file_name) >= 0){
        a_tags[i].classList.add('active');
      }
     
    }
  }

  let register_form = document.getElementById('register-form');

  register_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    // Ensure all required fields are filled
    if (!register_form.checkValidity()) {
        register_form.reportValidity();
        return;
    }

    // Disable submit button and show loading state
    const submitBtn = register_form.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';

    // Make sure the selected indexes exist before accessing them
    const regionElement = register_form.elements['region'];
    const provinceElement = register_form.elements['province'];
    const cityElement = register_form.elements['city'];
    const barangayElement = register_form.elements['barangay'];

    data.append('name', register_form.elements['name'].value);
    data.append('email', register_form.elements['email'].value);
    data.append('phonenum', register_form.elements['phonenum'].value);
    
    // Only append region if a valid option is selected
    if (regionElement.selectedIndex > 0) {
        data.append('region', regionElement.options[regionElement.selectedIndex].textContent);
    }
    
    // Only append province if a valid option is selected
    if (provinceElement.selectedIndex > 0) {
        data.append('province', provinceElement.options[provinceElement.selectedIndex].textContent);
    }
    
    // Only append city if a valid option is selected
    if (cityElement.selectedIndex > 0) {
        data.append('city', cityElement.options[cityElement.selectedIndex].textContent);
    }
    
    // Only append barangay if a valid option is selected
    if (barangayElement.selectedIndex > 0) {
        data.append('barangay', barangayElement.options[barangayElement.selectedIndex].textContent);
    }
    
    data.append('address', register_form.elements['address'].value);
    data.append('zipcode', register_form.elements['zipcode'].value);
    data.append('dob', register_form.elements['dob'].value);
    data.append('password', register_form.elements['password'].value);
    data.append('cpass', register_form.elements['cpass'].value);
    
    // Check if a file is selected before appending
    if (register_form.elements['profile'].files.length > 0) {
        data.append('profile', register_form.elements['profile'].files[0]);
    }
    
    data.append('register', '');

    var myModal = document.getElementById('RegisterModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/login_register.php",true);

    xhr.onload = function(){
        // Re-enable submit button
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'REGISTER';

        if(this.responseText == 'pass_mismatch'){
            alert('error',"Password Mismatch!");
        }
        else if(this.responseText == 'email_already'){
            alert('error',"Email is already registered!");
        }
        else if(this.responseText == 'phone_already'){
            alert('error',"Phone number is already registered!");
        }
        else if(this.responseText == 'inv_img'){
            alert('error',"Only JPG, WEBP & PNG images are allowed!");
        }
        else if(this.responseText == 'upd_failed'){
            alert('error',"Image upload failed!");
        }
        else if(this.responseText == 'mail_failed'){
            alert('error',"Cannot send confirmation email! Server down!");
        }
        else if(this.responseText == 'ins_failed'){
            alert('error',"Registration failed! Server down!");
        }
        else{
            alert('success',"Registration successful. Confirmation sent to email!");
            register_form.reset();
        }
    }

    // Add timeout handling
    xhr.timeout = 10000; // 10 seconds timeout
    xhr.ontimeout = function() {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'REGISTER';
        alert('error', "Request timed out. Please try again.");
    };

    xhr.onerror = function() {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'REGISTER';
        alert('error', "Network error occurred. Please check your connection.");
    };

    xhr.send(data);
  });

  let login_form = document.getElementById('login-form');

  login_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('email_mob',login_form.elements['email_mob'].value);
    data.append('password',login_form.elements['password'].value);
    data.append('login','');

    var myModal = document.getElementById('LoginModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/login_register.php",true);

    xhr.onload = function(){
        if(this.responseText == 'inv_email_mob'){
          alert('error',"Invalid Email or Mobile Number!");
        }
        else if(this.responseText == 'not_verified'){
          alert('error',"Email is not verified!");
        }
        else if(this.responseText == 'inactive'){
          alert('error',"Account Suspended! Please contact Admin.");
        }
        else if(this.responseText == 'invalid_pass'){
          alert('error',"Incorrect Password!");
        }
        else{
          let fileurl = window.location.href.split('/').pop().split('?').shift();
          if(fileurl == 'book_details.php'){
            window.location = window.location.href;
          }
          else{
          window.location = window.location.pathname;
          }
       }
    }

    xhr.send(data);
  });

  let forgot_form = document.getElementById('forgot-form');

  forgot_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('email',forgot_form.elements['email'].value);
    data.append('forgot_pass','');

    var myModal = document.getElementById('ForgotModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/login_register.php",true);

    xhr.onload = function(){
        if(this.responseText == 'inv_email'){
          alert('error',"Invalid Email!");
        }
        else if(this.responseText == 'not_verified'){
          alert('error',"Email is not verified! Please contact Admin.");
        }
        else if(this.responseText == 'inactive'){
          alert('error',"Account Suspended! Please contact Admin.");
        }
        else if(this.responseText == 'mail_failed'){
          alert('error',"Cannot send email. Server Down!");
        }
        else if(this.responseText == 'upd_failed'){
          alert('error',"Password reset failed. Server Down!");
        }
        else{
          alert('success',"Reset link sent to email!");
          forgot_form.reset();
       }
    }

    xhr.send(data);
  });

  function checkLoginToBook(status,room_id){
    if(status){
      // Create a form element
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = 'confirm_booking.php';
      form.style.display = 'none';
      
      // Create an input element for room_id
      const input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'id';
      input.value = room_id;
      
      // Append the input to the form
      form.appendChild(input);
      
      // Append the form to the body
      document.body.appendChild(form);
      
      // Submit the form
      form.submit();
    }
    else{
      alert('error', 'Please login to book!');
    }
  }

  setActive();
</script>