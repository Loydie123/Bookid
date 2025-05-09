<?php 
    require('inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Wallpaper</title>
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

        #carousel-data img {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        #carousel-data img:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
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

        .custom-alert {
            position: fixed;
            top: 80px;
            right: 25px;
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
            <h3>Wallpaper</h3>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title">Images</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                          <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>
                    
                    <div class="row" id="carousel-data">
                    </div>

                </div>
            </div>  
        </div>
    </div>
</div>

<!-- Carousel modal -->
<div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="carousel_s_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Image</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Picture</label>
                        <input type="file" name="carousel_picture" id="carousel_picture_inp" accept="[.jpg, .png, .webp, .jpeg]" class="form-control shadow-none" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="carousel_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('inc/scripts.php'); ?>
<script src="scripts/carousel.js"></script>
</body>
</html>