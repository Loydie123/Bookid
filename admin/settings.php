<?php 
    require('inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <link rel="icon" href="../images/about/title.png" type="image/x-icon" />
    <?php require('inc/links.php'); ?>
    <style>
        :root {
            --resort-primary: #8B4513;
            --resort-secondary: #DEB887;
            --resort-accent: #F4A460;
            --resort-light: #FFEFD5;
            --resort-dark: #5C2E0B;
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

        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 15px;
        }
        
        .card-body {
            padding: 25px;
        }

        .card-title {
            color: var(--resort-dark);
            font-weight: 700;
            font-size: 1.2rem;
            margin: 0;
        }

        .btn-dark {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            border: none;
            padding: 8px 20px;
            font-size: 14px;
        }

        .btn-dark:hover {
            background: linear-gradient(135deg, var(--resort-dark), var(--resort-primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 0 30px rgba(0,0,0,0.1);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            color: white;
            padding: 20px 25px;
            border: none;
        }

        .modal-title {
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .form-label {
            color: var(--resort-dark);
            font-weight: 600 !important;
            margin-bottom: 8px;
        }

        .custom-bg {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark)) !important;
        }

        .card-subtitle {
            color: var(--resort-dark);
            margin-top: 15px;
        }

        .form-check-input:checked {
            background-color: var(--resort-accent);
            border-color: var(--resort-accent);
        }

        .input-group-text {
            background: var(--resort-light);
            color: var(--resort-dark);
            border: 1px solid #ddd;
        }

        iframe {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 15px;
            }
        }
    </style>
</head>
<body class="bg-light">
    
<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3>Settings</h3>

            <!-- General settings section -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="card-title">General Settings</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                    <h6 class="card-subtitle">Site Title</h6>
                    <p class="card-text" id="site_title"></p>
                    <h6 class="card-subtitle">About Us</h6>
                    <p class="card-text" id="site_about"></p>
                </div>
            </div>  
            <br>
            <!-- General settings modal -->
            <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
                <div class="modal-dialog">
                    <form id="general_s_form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">General Settings</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Site Title</label>
                                    <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">About Us</label>
                                    <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Shutdown Section -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="card-title">Shutdown Website</h5>
                        <div class="form-check form-switch">
                            <form>
                                <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                            </form>
                        </div>
                    </div>
                    <p class="card-text">No customers will be allowed to book, when shutdown mode is turned on.</p>
                </div>
            </div>  

            <br>
            <!-- Contact details section -->
              
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="card-title">Contacts Settings</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                             <h6 class="card-subtitle">Address</h6>
                             <p class="card-text" id="address"></p>
                         </div>
                         <div class="mb-4">
                             <h6 class="card-subtitle">Google Map</h6>
                             <p class="card-text" id="gmap"></p>
                         </div>
                         <div class="mb-4">
                             <h6 class="card-subtitle">Phone Numbers</h6>
                             <p class="card-text mb-1">
                                <i class="bi bi-telephone-fill"></i>
                                <span id="pn1"></span>
                            </p>
                            <p class="card-text">
                                <i class="bi bi-telephone-fill"></i>
                                <span id="pn2"></span>
                            </p>
                         </div>
                         <div class="mb-4">
                             <h6 class="card-subtitle">Email</h6>
                             <p class="card-text" id="email"></p>
                         </div>                           
                      </div>
                      <div class="col-lg-6">
                      <div class="mb-4">
                             <h6 class="card-subtitle">Social Links</h6>
                             <p class="card-text mb-1">
                              <i class="bi bi-facebook me-1"></i>
                                <span id="fb"></span>
                            </p>
                            <p class="card-text mb-1">
                             <i class="bi bi-instagram me-1"></i>
                                <span id="insta"></span>
                            </p>
                         </div>
                      <div class="mb-4">
                            <h6 class="card-subtitle">iFrame</h6>
                             <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                      </div>  
                      </div>
                    </div>                  
               </div>
            </div>  
            <br>
             <!-- Contact details modal -->

             <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <form id="contacts_s_form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Contacts Settings</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid p-0">
                                  <div class="row">
                                  <div class="col-md-6">
                                      <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Google Map Link</label>
                                        <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone Numbers (with country code)</label>
                                          <div class="input-group mb-3">
                                             <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                             <input type="number" name="pn1" id="pn1_inp" class="form-control shadow-none" required>
                                            </div>
                                            <div class="input-group mb-3">
                                             <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                             <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-none">
                                            </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>
                                    </div>
                                  </div>
                                 <div class="col-md-6">
                                  <div class="mb-3">
                                    <label class="form-label">Social Links</label>
                                     <div class="input-group mb-3">
                                             <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                             <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                                      </div>
                                     <div class="input-group mb-3">
                                             <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                             <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" required>
                                      </div>
                                  </div>
                                  <div class="mb-3">
                                        <label class="form-label">iFrame Src</label>
                                        <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" required>
                                  </div>
                                  </div>
                                  </div>
                                </div>
                               </div>
                            <div class="modal-footer">
                                <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
              <!-- Management team section -->

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="card-title">Management Team</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
                          <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>
                    
                    <div class="row" id="team-data">
                    </div>

                </div>
            </div>  
             
             <!-- Management team modal -->

             <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
                <div class="modal-dialog">
                    <form id="team_s_form">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Team Member</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="member_name" id="member_name_inp" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Picture</label>
                                    <input type="file" name="member_picture" id="member_picture_inp" accept="[.jpg, .png, .webp, .jpeg]" class="form-control shadow-none" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="member_name.value='', member_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
 </div>


    <?php require('inc/scripts.php'); ?>
    <script src="scripts/settings.js"></script>
</body>
</html>