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
    <title>Admin Panel - Rooms</title>
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
        }

        .card-body {
            padding: 25px;
        }

        h3, .modal-title {
            color: var(--resort-dark);
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        h3::after, .modal-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--resort-accent);
            border-radius: 2px;
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
            color: white !important;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .modal-title::after {
            display: none;
        }

        .modal-body {
            padding: 25px;
        }

        .form-label {
            color: var(--resort-dark);
            font-weight: 600 !important;
            margin-bottom: 8px;
        }

        .form-control, .form-check-input {
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--resort-accent);
            box-shadow: 0 0 15px rgba(244, 164, 96, 0.1);
        }

        .form-check-input:checked {
            background-color: var(--resort-accent);
            border-color: var(--resort-accent);
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
        }

        /* Room Images Modal */
        .image-upload-section {
            background: rgba(244, 164, 96, 0.05);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .btn-upload {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 500;
            border: none;
            transition: all 0.3s;
        }

        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        /* Status Badge */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-badge.active {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
        }

        .status-badge.inactive {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }

        @media (max-width: 768px) {
            .modal-dialog {
                margin: 10px;
            }

            .table-container {
                height: 400px;
            }

            .btn-action {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body class="bg-light">
    
<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Rooms</h3>
                <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#add-room">
                    <i class="fas fa-plus"></i> Add Room
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Guests</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="room-data">               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>

<!-- Add room modal -->
<div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form id="add_room_form" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Area</label>
                            <input type="number" min="1" name="area" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" min="1" name="price" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" min="1" name="quantity" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Adult (Max.)</label>
                            <input type="number" min="1" name="adult" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Children (Max.)</label>
                            <input type="number" min="1" name="children" class="form-control" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Features</label>
                            <div class="row">
                                <?php 
                                    $res = selectAll('features');
                                    while($opt = mysqli_fetch_assoc($res)){
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='features' value='$opt[id]' class='form-check-input'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Facilities</label>
                            <div class="row">
                                <?php 
                                    $res = selectAll('facilities');
                                    while($opt = mysqli_fetch_assoc($res)){
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="desc" rows="4" class="form-control" required></textarea>                           
                        </div>
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

<!-- Edit room modal -->
<div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form id="edit_room_form" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Area</label>
                            <input type="number" min="1" name="area" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" min="1" name="price" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" min="1" name="quantity" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Adult (Max.)</label>
                            <input type="number" min="1" name="adult" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Children (Max.)</label>
                            <input type="number" min="1" name="children" class="form-control" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Features</label>
                            <div class="row">
                                <?php 
                                    $res = selectAll('features');
                                    while($opt = mysqli_fetch_assoc($res)){
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='features' value='$opt[id]' class='form-check-input'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Facilities</label>
                            <div class="row">
                                <?php 
                                    $res = selectAll('facilities');
                                    while($opt = mysqli_fetch_assoc($res)){
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="desc" rows="4" class="form-control" required></textarea>                           
                        </div>
                        <input type="hidden" name="room_id">
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

<!-- Manage room images modal -->
<div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Room Images</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
            </div>
            <div class="modal-body">
                <div id="image-alert"></div>
                <div class="image-upload-section">
                    <form id="add_image_form">
                        <label class="form-label">Add Image</label>
                        <input type="file" name="image" accept="[.jpg, .png, .webp, .jpeg]" class="form-control mb-3" required>
                        <button class="btn btn-upload">Upload Image</button>
                        <input type="hidden" name="room_id">
                    </form>
                </div>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="60%">Image</th>
                                <th scope="col">Thumb</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="room-image-data">               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('inc/scripts.php'); ?>
<script src="scripts/rooms.js"></script>

</body>
</html> 