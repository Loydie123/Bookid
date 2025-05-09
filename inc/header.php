<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
  <!-- Notification element -->
  <div id="notification" class="notification" style="display: none;"></div>
  
  <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><?php echo $settings_r['site_title'] ?></a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link me-2 fw-medium"  href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 fw-medium"  href="calendar.php">Calendar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 fw-medium" href="facilities.php">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2 fw-medium" href="contact.php">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-medium" href="about.php">About</a>
        </li>
      </ul>
      <div class="d-flex">
        <?php 
          if(isset($_SESSION['login']) && $_SESSION['login']==true)
          {
            $path = USERS_IMG_PATH;
            echo<<<data
              <div class="btn-group">
                <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                  <img src="$path$_SESSION[uPic]" style="width: 28px; height: 28px;" class="me-2 rounded-circle">
                  $_SESSION[uName]
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end">
                  <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </div>
            data;
          }
          else
          {
            echo<<<data
              <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#LoginModal">
                  Sign In
              </button>
              <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#RegisterModal">
                  Sign Up
              </button>
            data;
          }
        ?>
     </div>
    </div>
  </div>
</nav>

<div class="modal fade" id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form id="login-form">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
         <i class="bi bi-person-circle fs-3 me-2"></i> User Login
        </h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email_mob" required class="form-control shadow-none">
        </div>
        <div class="mb-4">
          <label class="form-label">Password</label>
          <input type="password" name="password" required class="form-control shadow-none">
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
          <button type="button" class="btn text-secondary text-decoration-none shadow-none p-0" data-bs-toggle="modal" data-bs-target="#ForgotModal" data-bs-dismiss="modal">
            Forgot Password?
          </button>
        </div>
      </div>
     </form>
    </div>
  </div>
</div> 

<div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <form id="register-form" method="POST">
      <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
          <i class="bi bi-person-lines-fill fs-3 me-2"></i>
          User Registration
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
          Note: Your details must match with your ID
          that will be required during check-in.
        </span>
      <div class="container-fluid">
          <div class="row">
          <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Name</label>
              <input name="name" type="text" class="form-control shadow-none capitalize" required>
              <div id="nameError" class="error-feedback text-danger mt-1" style="display: none; font-size: 0.875rem;"></div>
              </div>
              <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Email</label>
              <input name="email" type="email" class="form-control shadow-none" required>
              <div id="emailError" class="error-feedback text-danger mt-1" style="display: none; font-size: 0.875rem;"></div>
              </div>
              <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Phone Number</label>
              <div class="input-group">
                <span class="input-group-text">+63</span>
                <input name="phonenum" type="number" class="form-control shadow-none" required>
              </div>
              <div id="phoneError" class="error-feedback text-danger mt-1" style="display: none; font-size: 0.875rem;"></div>
              </div>
              <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Picture</label>
              <div class="input-group">
                <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
              </div>
              </div>
              <div class="col-md-12 p-0 mb-3">
              <label class="form-label">Address Details</label>
              <div class="row g-3 mb-3">
                  <div class="col-md-6">
                      <select name="region" id="region" class="form-select shadow-none" required>
                          <option value="" selected disabled>Select Region</option>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <select name="province" id="province" class="form-select shadow-none" required disabled>
                          <option value="" selected disabled>Select Province</option>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <select name="city" id="city" class="form-select shadow-none" required disabled>
                          <option value="" selected disabled>Select City/Municipality</option>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <select name="barangay" id="barangay" class="form-select shadow-none" required disabled>
                          <option value="" selected disabled>Select Barangay</option>
                      </select>
                  </div>
              </div>
              <label class="form-label">Street Address</label>
              <textarea name="address" class="form-control shadow-none capitalize" rows="1" required placeholder="Enter detailed street address" style="min-height: 38px; height: 38px;"></textarea>
              <div id="addressError" class="error-feedback text-danger mt-1" style="display: none; font-size: 0.875rem;"></div>
              </div>
              <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Zipcode</label>
              <input name="zipcode" type="number" class="form-control shadow-none" required maxlength="4" placeholder="Enter 4-digit postal code">
              <div id="zipcodeError" class="error-feedback text-danger mt-1" style="display: none; font-size: 0.875rem;"></div>
              </div>
              <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Date of Birth</label>
              <input name="dob" type="date" class="form-control shadow-none" required max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>">
              <div id="dobError" class="error-feedback text-danger mt-1" style="display: none; font-size: 0.875rem;"></div>
              </div>
              <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Password</label>
              <input name="password" type="password" class="form-control shadow-none" required>
              <div class="password-validation mt-2">
                <div class="requirement">
                    <i class="bi bi-x-circle"></i> At least 8 characters
                </div>
                <div class="requirement">
                    <i class="bi bi-x-circle"></i> One uppercase letter
                </div>
                <div class="requirement">
                    <i class="bi bi-x-circle"></i> One special character
                </div>
              </div>
              </div>
              <div class="col-md-6 ps-0 mb-3">
              <label class="form-label">Confirm Password</label>
              <input name="cpass" type="password" class="form-control shadow-none" required>
              <div id="cpassError" class="error-feedback mt-2" style="display: none;"></div>
              </div>
              <div class="text-center">
               <label style="text-align: center;">
                <input type="checkbox" class="mb-3" required>
                I verify that all the information stated above is true to the best of my knowledge.
               </label>
              </div>
          </div>
      </div>
      <div class="text-center my-l">
          <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
      </div>
      <p class="mt-2" style="text-align: center;">By signing up, I agree to Bookid's <a href="terms.php">Terms and Conditions</a> and <a href="privacy_policy.php">Privacy Policy</a>.</p>
        </div>
     </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".capitalize").forEach(function(input) {
      input.addEventListener("input", function() {
        let value = this.value;
        this.value = value.charAt(0).toUpperCase() + value.slice(1);
      });
    });

    // Add name validation
    const nameInput = document.querySelector('input[name="name"]');
    const nameError = document.getElementById('nameError');

    nameInput.addEventListener('input', function() {
        const name = this.value.trim();
        const nameRegex = /^[A-Za-z\s]{2,50}$/;
        
        if (name.length < 2) {
            nameError.textContent = 'Name must be at least 2 characters long';
            nameError.style.display = 'block';
            this.setCustomValidity('Name must be at least 2 characters long');
        } else if (name.length > 50) {
            nameError.textContent = 'Name must not exceed 50 characters';
            nameError.style.display = 'block';
            this.setCustomValidity('Name must not exceed 50 characters');
        } else if (!nameRegex.test(name)) {
            nameError.textContent = 'Name can only contain letters and spaces';
            nameError.style.display = 'block';
            this.setCustomValidity('Name can only contain letters and spaces');
        } else {
            nameError.style.display = 'none';
            this.setCustomValidity('');
        }
    });

    // Add email validation
    const emailInput = document.querySelector('input[name="email"]');
    const emailError = document.getElementById('emailError');
    const commonDomains = [
        'gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com', 
        'aol.com', 'icloud.com', 'protonmail.com', 'mail.com'
    ];
    const disposableDomains = [
        'tempmail.com', 'temp-mail.org', 'guerrillamail.com', 
        'throwawaymail.com', 'mailinator.com', '10minutemail.com'
    ];

    emailInput.addEventListener('input', function() {
        const email = this.value.trim().toLowerCase();
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        
        // Basic format validation
        if (!emailRegex.test(email)) {
            emailError.textContent = 'Please enter a valid email address';
            emailError.style.display = 'block';
            this.setCustomValidity('Invalid email format');
            return;
        }

        // Check email length
        if (email.length > 254) {
            emailError.textContent = 'Email address is too long';
            emailError.style.display = 'block';
            this.setCustomValidity('Email too long');
            return;
        }

        // Extract domain
        const domain = email.split('@')[1];

        // Check for disposable email domains
        if (disposableDomains.includes(domain)) {
            emailError.textContent = 'Disposable email addresses are not allowed';
            emailError.style.display = 'block';
            this.setCustomValidity('Disposable email not allowed');
            return;
        }

        // Suggest common domains if mistyped
        const similarDomain = commonDomains.find(d => 
            domain !== d && 
            (d.length === domain.length) && 
            (d.split('').filter((char, i) => char !== domain[i]).length <= 2)
        );

        if (similarDomain) {
            emailError.textContent = `Did you mean ${email.split('@')[0]}@${similarDomain}?`;
            emailError.style.display = 'block';
            this.setCustomValidity('');
        } else {
            emailError.style.display = 'none';
            this.setCustomValidity('');
        }
    });

    // Add phone number validation
    const phoneInput = document.querySelector('input[name="phonenum"]');
    const phoneError = document.getElementById('phoneError');

    phoneInput.addEventListener('input', function(e) {
        // Remove any non-digit characters
        let input = this.value.replace(/[^\d]/g, '');
        
        // Validation
        if (input.length === 0) {
            phoneError.textContent = 'Phone number is required';
            phoneError.style.display = 'block';
            this.setCustomValidity('Phone number is required');
        } else if (!input.startsWith('9')) {
            phoneError.textContent = 'Phone number must start with 9';
            phoneError.style.display = 'block';
            this.setCustomValidity('Phone number must start with 9');
        } else if (input.length < 10) {
            phoneError.textContent = 'Phone number must be 10 digits';
            phoneError.style.display = 'block';
            this.setCustomValidity('Incomplete phone number');
        } else if (input.length > 10) {
            phoneError.textContent = 'Phone number must be exactly 10 digits';
            phoneError.style.display = 'block';
            this.setCustomValidity('Phone number too long');
            // Trim to 10 digits if longer
            this.value = input.slice(0, 10);
        } else {
            phoneError.style.display = 'none';
            this.setCustomValidity('');
        }
    });

    // Prevent form submission if phone number is invalid
    const form = document.getElementById('register-form');
    form.addEventListener('submit', function(e) {
        const phoneNumber = phoneInput.value;
        if (phoneNumber.length !== 10 || !phoneNumber.startsWith('9')) {
            e.preventDefault();
            phoneError.textContent = 'Please enter a valid Philippine mobile number';
            phoneError.style.display = 'block';
        }
    });

    // Philippine Address Handling
    const regionSelect = document.getElementById('region');
    const provinceSelect = document.getElementById('province');
    const citySelect = document.getElementById('city');
    const barangaySelect = document.getElementById('barangay');
    const addressTextarea = document.querySelector('textarea[name="address"]');
    const addressError = document.getElementById('addressError');

    // Function to fetch regions
    async function fetchRegions() {
        try {
            const response = await fetch('https://psgc.gitlab.io/api/regions/');
            const regions = await response.json();
            regions.sort((a, b) => a.name.localeCompare(b.name));
            
            regions.forEach(region => {
                const option = document.createElement('option');
                option.value = region.code;
                option.textContent = region.name;
                regionSelect.appendChild(option);
            });
        } catch (error) {
            console.error('Error fetching regions:', error);
        }
    }

    // Function to fetch provinces
    async function fetchProvinces(regionCode) {
        try {
            provinceSelect.innerHTML = '<option value="" selected disabled>Select Province</option>';
            citySelect.innerHTML = '<option value="" selected disabled>Select City/Municipality</option>';
            barangaySelect.innerHTML = '<option value="" selected disabled>Select Barangay</option>';
            
            const response = await fetch(`https://psgc.gitlab.io/api/regions/${regionCode}/provinces/`);
            const provinces = await response.json();
            provinces.sort((a, b) => a.name.localeCompare(b.name));
            
            provinces.forEach(province => {
                const option = document.createElement('option');
                option.value = province.code;
                option.textContent = province.name;
                provinceSelect.appendChild(option);
            });
            
            provinceSelect.disabled = false;
            citySelect.disabled = true;
            barangaySelect.disabled = true;
        } catch (error) {
            console.error('Error fetching provinces:', error);
        }
    }

    // Function to fetch cities
    async function fetchCities(provinceCode) {
        try {
            citySelect.innerHTML = '<option value="" selected disabled>Select City/Municipality</option>';
            barangaySelect.innerHTML = '<option value="" selected disabled>Select Barangay</option>';
            
            const response = await fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities/`);
            const cities = await response.json();
            cities.sort((a, b) => a.name.localeCompare(b.name));
            
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city.code;
                option.textContent = city.name;
                citySelect.appendChild(option);
            });
            
            citySelect.disabled = false;
            barangaySelect.disabled = true;
        } catch (error) {
            console.error('Error fetching cities:', error);
        }
    }

    // Function to fetch barangays
    async function fetchBarangays(cityCode) {
        try {
            barangaySelect.innerHTML = '<option value="" selected disabled>Select Barangay</option>';
            
            const response = await fetch(`https://psgc.gitlab.io/api/cities-municipalities/${cityCode}/barangays/`);
            const barangays = await response.json();
            barangays.sort((a, b) => a.name.localeCompare(b.name));
            
            barangays.forEach(barangay => {
                const option = document.createElement('option');
                option.value = barangay.code;
                option.textContent = barangay.name;
                barangaySelect.appendChild(option);
            });
            
            barangaySelect.disabled = false;
        } catch (error) {
            console.error('Error fetching barangays:', error);
        }
    }

    // Event Listeners
    regionSelect.addEventListener('change', function() {
        if (this.value) {
            fetchProvinces(this.value);
        }
    });

    provinceSelect.addEventListener('change', function() {
        if (this.value) {
            fetchCities(this.value);
        }
    });

    citySelect.addEventListener('change', function() {
        if (this.value) {
            fetchBarangays(this.value);
        }
    });

    // Address validation
    addressTextarea.addEventListener('input', function() {
        const address = this.value.trim();
        if (address.length < 5) {
            addressError.textContent = 'Please enter a detailed street address';
            addressError.style.display = 'block';
            this.setCustomValidity('Address too short');
        } else if (address.length > 200) {
            addressError.textContent = 'Address is too long';
            addressError.style.display = 'block';
            this.setCustomValidity('Address too long');
        } else {
            addressError.style.display = 'none';
            this.setCustomValidity('');
        }
    });

    // Add zipcode validation
    const zipcodeInput = document.querySelector('input[name="zipcode"]');
    const zipcodeError = document.getElementById('zipcodeError');

    zipcodeInput.addEventListener('input', function() {
        // Remove any non-digit characters
        let input = this.value.replace(/[^\d]/g, '');
        
        // Ensure exactly 4 digits
        if (input.length > 4) {
            input = input.slice(0, 4);
        }
        this.value = input;
        
        // Validation
        if (input.length === 0) {
            zipcodeError.textContent = 'Postal code is required';
            zipcodeError.style.display = 'block';
            this.setCustomValidity('Postal code is required');
        } else if (input.length < 4) {
            zipcodeError.textContent = 'Postal code must be 4 digits';
            zipcodeError.style.display = 'block';
            this.setCustomValidity('Incomplete postal code');
        } else if (!/^[0-9]{4}$/.test(input)) {
            zipcodeError.textContent = 'Invalid postal code format';
            zipcodeError.style.display = 'block';
            this.setCustomValidity('Invalid postal code format');
        } else {
            zipcodeError.style.display = 'none';
            this.setCustomValidity('');
        }
    });

    // Add to form submission validation
    form.addEventListener('submit', function(e) {
        const zipcode = zipcodeInput.value;
        if (zipcode.length !== 4 || !/^[0-9]{4}$/.test(zipcode)) {
            e.preventDefault();
            zipcodeError.textContent = 'Please enter a valid 4-digit Philippine postal code';
            zipcodeError.style.display = 'block';
        }
    });

    // Add date of birth validation
    const dobInput = document.querySelector('input[name="dob"]');
    const dobError = document.getElementById('dobError');

    // Function to calculate age
    function calculateAge(birthDate) {
        const today = new Date();
        const birth = new Date(birthDate);
        let age = today.getFullYear() - birth.getFullYear();
        const monthDiff = today.getMonth() - birth.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
            age--;
        }
        return age;
    }

    // Set max date to 18 years ago
    const maxDate = new Date();
    maxDate.setFullYear(maxDate.getFullYear() - 18);
    dobInput.max = maxDate.toISOString().split('T')[0];

    // Set min date to 100 years ago (reasonable maximum age)
    const minDate = new Date();
    minDate.setFullYear(minDate.getFullYear() - 100);
    dobInput.min = minDate.toISOString().split('T')[0];

    dobInput.addEventListener('input', function() {
        const selectedDate = new Date(this.value);
        const age = calculateAge(selectedDate);
        
        dobError.style.display = 'block';
        dobError.classList.remove('success', 'error');
        
        if (!this.value) {
            dobError.textContent = 'Date of birth is required';
            dobError.classList.add('error');
            this.setCustomValidity('Date of birth is required');
        } else if (selectedDate > maxDate) {
            dobError.textContent = 'You must be at least 18 years old to register';
            dobError.classList.add('error');
            this.setCustomValidity('Must be 18 or older');
        } else if (selectedDate < minDate) {
            dobError.textContent = 'Please enter a valid date of birth';
            dobError.classList.add('error');
            this.setCustomValidity('Invalid date');
        } else {
            dobError.textContent = `✓ Age verified: ${age} years old`;
            dobError.classList.add('success');
            this.setCustomValidity('');
        }
    });

    // Add to form submission validation
    form.addEventListener('submit', function(e) {
        if (dobInput.value) {
            const age = calculateAge(new Date(dobInput.value));
            if (age < 18) {
                e.preventDefault();
                dobError.textContent = 'You must be at least 18 years old to register';
                dobError.style.display = 'block';
                dobError.style.color = '#dc3545';
            }
        }
    });

    // Password validation with real-time feedback
    const passwordInput = document.querySelector('#RegisterModal input[name="password"]');
    const requirements = document.querySelectorAll('#RegisterModal .requirement');
    
    function updatePasswordRequirements() {
        const password = passwordInput.value;
        
        // Check each requirement
        const checks = [
            password.length >= 8,                    // At least 8 characters
            /[A-Z]/.test(password),                 // Uppercase
            /[!@#$%^&*(),.?":{}|<>]/.test(password) // Special character
        ];
        
        // Update requirements in real-time
        requirements.forEach((req, index) => {
            const icon = req.querySelector('i');
            if (checks[index]) {
                req.style.color = '#198754'; // Bootstrap success color
                icon.classList.remove('bi-x-circle');
                icon.classList.add('bi-check-circle');
            } else {
                req.style.color = '#dc3545'; // Bootstrap danger color
                icon.classList.remove('bi-check-circle');
                icon.classList.add('bi-x-circle');
            }
        });

        // Set form validation
        if (checks.every(check => check)) {
            passwordInput.setCustomValidity('');
        } else {
            passwordInput.setCustomValidity('Please meet all password requirements');
        }
    }

    // Add event listeners for real-time validation
    if (passwordInput) {
        ['input', 'keyup', 'paste'].forEach(event => {
            passwordInput.addEventListener(event, updatePasswordRequirements);
        });
    }

    // Enhanced confirm password check with visual feedback
    const confirmInput = document.querySelector('#RegisterModal input[name="cpass"]');
    const cpassError = document.getElementById('cpassError');
    
    function validateConfirmPassword() {
        cpassError.style.display = 'block';
        cpassError.classList.remove('success', 'error');
        
        if (!confirmInput.value) {
            cpassError.textContent = 'Please confirm your password';
            cpassError.classList.add('error');
            confirmInput.setCustomValidity('Password confirmation required');
        } else if (confirmInput.value !== passwordInput.value) {
            cpassError.textContent = 'Passwords do not match';
            cpassError.classList.add('error');
            confirmInput.setCustomValidity("Passwords don't match");
        } else {
            cpassError.textContent = '✓ Passwords match';
            cpassError.classList.add('success');
            confirmInput.setCustomValidity('');
        }
    }

    if (confirmInput) {
        ['input', 'keyup', 'paste'].forEach(event => {
            confirmInput.addEventListener(event, validateConfirmPassword);
            passwordInput.addEventListener(event, validateConfirmPassword);
        });
    }

    // Form submission check
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            updatePasswordRequirements(); // Check password requirements
            validateConfirmPassword(); // Check password match

            if (!passwordInput.checkValidity() || !confirmInput.checkValidity()) {
                e.preventDefault();
                if (!passwordInput.checkValidity()) {
                    alert('Please meet all password requirements!');
                } else {
                    alert("Passwords don't match!");
                }
            }
        });
    }

    // Initialize regions on page load
    fetchRegions();
  });
</script>

<div class="modal fade" id="ForgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form id="forgot-form">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
         <i class="bi bi-person-circle fs-3 me-2"></i> Forgot Password
        </h5>
      </div>
      <div class="modal-body">
        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
            Note: A link will be sent to your email to reset your password!
        </span>
        <div class="mb-4">
          <label class="form-label">Email</label>
          <input type="email" name="email" required class="form-control shadow-none">
        </div>
        <div class="mb-2 text-end">
          <button type="button" class="btn shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#LoginModal" data-bs-dismiss="modal">
              CANCEL
          </button>
          <button type="submit" class="btn btn-dark  shadow-none">SEND LINK</button>
        </div>
      </div>
     </form>
    </div>
  </div>
</div> 

<style>
:root {
  --premium-dark: #0f172a;
  --premium-gold: #b8860b;
  --premium-gold-hover: #daa520;
  --premium-bg: #ffffff;
  --premium-hover: rgba(184, 134, 11, 0.05);
  --premium-shadow: 0 8px 32px rgba(15, 23, 42, 0.1);
  --premium-border: rgba(15, 23, 42, 0.08);
}

.navbar {
  background: rgba(255, 255, 255, 0.95) !important;
  backdrop-filter: blur(20px) saturate(180%);
  -webkit-backdrop-filter: blur(20px) saturate(180%);
  border-bottom: 1px solid var(--premium-border);
  padding: 1rem 0;
  box-shadow: var(--premium-shadow);
}

.navbar-brand {
  color: var(--premium-dark) !important;
  letter-spacing: 1px;
  font-size: 1.8rem !important;
  position: relative;
  padding: 0.5rem 0;
}

.navbar-brand::after {
  content: '';
  position: absolute;
  width: 35%;
  height: 2px;
  bottom: 0;
  left: 0;
  background: linear-gradient(90deg, var(--premium-gold), transparent);
}

.nav-link {
  color: var(--premium-dark) !important;
  font-weight: 500 !important;
  position: relative;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  padding: 0.7rem 1.2rem !important;
  margin: 0 0.3rem;
  border-radius: 6px;
  letter-spacing: 0.3px;
}

.nav-link:after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  background: linear-gradient(90deg, transparent, var(--premium-gold), transparent);
  transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.nav-link:hover {
  color: var(--premium-gold) !important;
  background: var(--premium-hover);
  transform: translateY(-1px);
}

.nav-link:hover:after {
  width: 80%;
}

.btn-outline-dark {
  border: 2px solid var(--premium-dark);
  color: var(--premium-dark);
  font-weight: 600;
  padding: 0.7rem 1.8rem;
  border-radius: 8px;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  letter-spacing: 0.5px;
  position: relative;
  overflow: hidden;
  z-index: 1;
}

.btn-outline-dark::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(184, 134, 11, 0.2), transparent);
  transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  z-index: -1;
}

.btn-outline-dark:hover {
  border-color: var(--premium-gold);
  color: var(--premium-gold);
  transform: translateY(-2px);
  box-shadow: 0 4px 20px rgba(184, 134, 11, 0.15);
}

.btn-outline-dark:hover::before {
  left: 100%;
}

.dropdown-menu {
  border: none;
  border-radius: 12px;
  box-shadow: var(--premium-shadow);
  padding: 0.8rem 0;
  margin-top: 1rem;
  background: rgba(255, 255, 255, 0.98);
  backdrop-filter: blur(10px);
  border: 1px solid var(--premium-border);
  min-width: 200px;
}

.dropdown-item {
  padding: 0.8rem 1.5rem;
  font-weight: 500;
  letter-spacing: 0.3px;
  color: var(--premium-dark);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
}

.dropdown-item::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 0;
  background: var(--premium-hover);
  transition: width 0.3s ease;
}

.dropdown-item:hover {
  color: var(--premium-gold);
  padding-left: 2.2rem;
  background: transparent;
}

.dropdown-item:hover::before {
  width: 100%;
}

.modal-content {
  border: none;
  border-radius: 16px;
  box-shadow: var(--premium-shadow);
  background: rgba(255, 255, 255, 0.98);
  backdrop-filter: blur(20px);
  border: 1px solid var(--premium-border);
}

.modal-header {
  border-bottom: 1px solid var(--premium-border);
  padding: 1.8rem;
}

.modal-body {
  padding: 1.8rem;
}

.modal-title {
  font-weight: 600;
  letter-spacing: 0.5px;
  color: var(--premium-dark);
}

.form-label {
  font-weight: 500;
  color: var(--premium-dark);
  margin-bottom: 0.5rem;
  letter-spacing: 0.3px;
}

.form-control {
  border: 2px solid var(--premium-border);
  padding: 0.8rem 1.2rem;
  border-radius: 8px;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  background: rgba(255, 255, 255, 0.9);
}

.form-control:focus {
  border-color: var(--premium-gold);
  box-shadow: 0 0 0 4px rgba(184, 134, 11, 0.1);
  background: #ffffff;
}

.badge {
  font-weight: 500;
  padding: 1rem 1.5rem;
  border-radius: 12px;
  letter-spacing: 0.3px;
  background: var(--premium-hover) !important;
  color: var(--premium-gold) !important;
  border: 1px solid rgba(184, 134, 11, 0.2);
}

.btn-dark {
  background: linear-gradient(135deg, var(--premium-dark), #1a365d);
  border: none;
  padding: 0.8rem 2.5rem;
  border-radius: 8px;
  font-weight: 600;
  letter-spacing: 0.5px;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn-dark:hover {
  background: linear-gradient(135deg, var(--premium-gold), var(--premium-gold-hover));
  transform: translateY(-2px);
  box-shadow: 0 4px 20px rgba(184, 134, 11, 0.2);
}

.navbar-toggler {
  border: 2px solid var(--premium-border);
  padding: 0.6rem;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.navbar-toggler:hover {
  border-color: var(--premium-gold);
}

.navbar-toggler:focus {
  box-shadow: 0 0 0 4px rgba(184, 134, 11, 0.1);
}

/* Profile Image Enhancement */
.btn-group .btn img {
  border: 2px solid var(--premium-gold);
  padding: 2px;
  transition: all 0.3s ease;
}

.btn-group .btn:hover img {
  transform: scale(1.1);
}

/* Checkbox styling */
input[type="checkbox"] {
  width: 18px;
  height: 18px;
  margin-right: 8px;
  border: 2px solid var(--premium-border);
  border-radius: 4px;
  transition: all 0.3s ease;
}

input[type="checkbox"]:checked {
  background-color: var(--premium-gold);
  border-color: var(--premium-gold);
}

/* Links in forms */
.modal-body a {
  color: var(--premium-gold);
  text-decoration: none;
  transition: all 0.3s ease;
}

.modal-body a:hover {
  color: var(--premium-gold-hover);
  text-decoration: underline;
}

/* Close button */
.btn-close {
  opacity: 0.7;
  transition: all 0.3s ease;
}

.btn-close:hover {
  opacity: 1;
  transform: rotate(90deg);
}

/* File input */
input[type="file"] {
  border: 2px dashed var(--premium-border);
  background: var(--premium-hover);
  transition: all 0.3s ease;
}

input[type="file"]:hover {
  border-color: var(--premium-gold);
}

/* Textarea */
textarea.form-control {
  resize: none;
  overflow-y: hidden;
  min-height: 38px;
  height: 38px;
}

/* Date input */
input[type="date"] {
  cursor: pointer;
}

/* Number input */
input[type="number"] {
  -moz-appearance: textfield;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.error-feedback {
    font-style: italic;
    transition: all 0.3s ease;
}

.error-feedback.success {
    color: #198754 !important;
}

.error-feedback.error {
    color: #dc3545 !important;
}

input:invalid {
    border-color: #dc3545;
}

input:valid {
    border-color: #198754;
}

.input-group-text {
    background-color: #f8f9fa;
    border: 2px solid var(--premium-border);
    border-right: none;
    color: var(--premium-dark);
    font-weight: 500;
}

.input-group .form-control {
    border-left: none;
}

.input-group .form-control:focus + .input-group-text {
    border-color: var(--premium-gold);
}

.form-select {
    border: 2px solid var(--premium-border);
    padding: 0.8rem 1.2rem;
    border-radius: 8px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: rgba(255, 255, 255, 0.9);
    cursor: pointer;
}

.form-select:focus {
    border-color: var(--premium-gold);
    box-shadow: 0 0 0 4px rgba(184, 134, 11, 0.1);
    background: #ffffff;
}

.form-select:disabled {
    background-color: #e9ecef;
    cursor: not-allowed;
}

.requirement {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.25rem;
    color: var(--premium-dark);
}

.password-toggle {
    border-color: var(--premium-border);
}

.password-toggle:hover {
    border-color: var(--premium-gold);
    color: var(--premium-gold);
}

.password-toggle:focus {
    box-shadow: none;
}

/* Password Requirements Styling */
.password-requirements {
    font-size: 0.875rem;
}

.password-requirements .requirement {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: color 0.3s ease;
}

.password-requirements .requirement i {
    transition: all 0.3s ease;
}

.text-danger {
    color: #dc3545;
}

.text-success {
    color: #198754;
}

.bi-x-circle, .bi-check-circle {
    font-size: 1rem;
}

/* Notification Styles */
.notification {
  position: fixed;
  top: 20px;
  right: 20px;
  padding: 15px 25px;
  background-color: #28a745;
  color: white;
  border-radius: 5px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  z-index: 9999;
  opacity: 0;
  transform: translateY(-20px);
  transition: all 0.3s ease-in-out;
}

.notification.show {
  opacity: 1;
  transform: translateY(0);
}

.notification.error {
  background-color: #dc3545;
}

.notification.success {
  background-color: #28a745;
}

/* Override the default invalid styling and set gold borders */
input, select, textarea, .form-control, .form-select {
  border-color: var(--premium-gold) !important;
  box-shadow: none !important;
}

/* Maintain gold border on focus */
input:focus, select:focus, textarea:focus,
.form-control:focus, .form-select:focus {
  border-color: var(--premium-gold) !important;
  box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.25) !important;
}

/* Remove the red borders on invalid fields */
input:invalid, select:invalid, textarea:invalid {
  border-color: var(--premium-gold) !important;
}
</style> 