<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Amenities & Facilities</title>
    <link rel="icon" href="../images/about/title.png" type="image/x-icon" />
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --resort-primary: #8B4513;
            --resort-secondary: #DEB887;
            --resort-accent: #F4A460;
            --resort-light: #FFEFD5;
            --resort-dark: #5C2E0B;
            --gold: #D4AF37;
            --light-gold: #F4E7BE;
        }

        #main-content {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            margin: 20px;
            padding: 25px;
        }

        .card {
            border-radius: 15px !important;
            overflow: hidden;
            border: none !important;
            box-shadow: 0 0 25px rgba(0,0,0,0.05) !important;
            margin-bottom: 25px;
            background: white;
        }

        .card-body {
            padding: 25px;
        }

        h3, .card-title {
            color: var(--resort-dark);
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }

        h3 {
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

        .card-title {
            font-size: 1.2rem;
            margin: 0;
        }

        .btn-add {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            color: white;
        }

        .table-container {
            height: 350px;
            overflow-y: auto;
            border-radius: 12px;
            background: white;
        }

        .table-container::-webkit-scrollbar {
            width: 8px;
        }

        .table-container::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.05);
        }

        .table-container::-webkit-scrollbar-thumb {
            background: var(--resort-accent);
            border-radius: 4px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .table thead tr {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark)) !important;
        }

        .table th {
            color: var(--resort-light) !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
            padding: 15px !important;
            border: none !important;
        }

        .table td {
            padding: 15px !important;
            vertical-align: middle;
            border-bottom: 1px solid rgba(0,0,0,0.05) !important;
            font-size: 14px;
        }

        .table tbody tr {
            transition: all 0.3s;
        }

        .table tbody tr:hover {
            background-color: rgba(244, 164, 96, 0.05);
        }

        /* Modal Styling */
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

        .modal-body {
            padding: 25px;
        }

        .form-label {
            color: var(--resort-dark);
            font-weight: 600 !important;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--resort-accent);
            box-shadow: 0 0 15px rgba(244, 164, 96, 0.1);
        }

        textarea.form-control {
            min-height: 100px;
        }

        .btn-action {
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            color: white;
            border: none;
        }

        .btn-cancel {
            color: var(--resort-dark);
            background: transparent;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            color: white;
        }

        .facility-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--resort-accent);
        }

        .btn-delete {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            transition: all 0.3s;
        }

        .btn-delete:hover {
            background: #e74c3c;
            color: white;
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 15px;
            }

            .table-container {
                height: 300px;
            }

            .facility-img {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>
<body class="bg-light">
    
<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3>Amenities & Facilities</h3>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="card-title">Amenities</h5>
                        <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#feature-s">
                            <i class="fas fa-plus"></i> Add Amenity
                        </button>
                    </div>

                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="features-data">               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="card-title">Facilities</h5>
                        <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#facility-s">
                            <i class="fas fa-plus"></i> Add Facility
                        </button>
                    </div>

                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" width="40%">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="facilities-data">               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

<!-- Feature modal -->
<div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
    <div class="modal-dialog">
        <form id="feature_s_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Amenity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="feature_name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Facility modal -->
<div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
    <div class="modal-dialog">
        <form id="facility_s_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Facility</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="facility_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Picture</label>
                        <input type="file" name="facility_pic" accept="[.jpg, .png, .webp, .jpeg]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="facility_desc" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('inc/scripts.php'); ?>
<script src="scripts/features_facilities.js"></script>

</body>
</html>