<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();

    if(isset($_GET['del'])) {
        $frm_data = filteration($_GET);

        if($frm_data['del']=='all'){
            $q = "DELETE FROM `user_queries`";
            if(mysqli_query($con,$q)){
                logAuditTrail($_SESSION['admin_name'], 'DELETE', 'Deleted all user queries');
                alert('success','All Data deleted!');
            }
            else{
                alert('error','Operation failed.');
            }
        }
        else{
            $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
            $values = [$frm_data['del']];
            if(delete($q,$values,'i')){
                logAuditTrail($_SESSION['admin_name'], 'DELETE', 'Deleted user query #'.$frm_data['del']);
                alert('success','Data deleted!');
            }
            else{
                alert('error','Operation failed!'); 
            }
        }   
    }

    // Add CSV Export functionality
    if(isset($_POST['export_csv'])) {
        $selected_user = isset($_POST['selected_user']) ? $_POST['selected_user'] : 'all';
        $selected_action = isset($_POST['selected_action']) ? $_POST['selected_action'] : 'all';
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] . ' 00:00:00' : '';
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] . ' 23:59:59' : '';
        
        // Set headers for CSV download
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="audit_logs_'.date('Y-m-d').'.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');
        
        // Create output stream
        $output = fopen('php://output', 'w');
        
        // Add UTF-8 BOM for Excel
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Add CSV headers
        $headers = array(
            'ID',
            'Username',
            'Action',
            'Description',
            'Date and Time',
            'Day'
        );
        fputcsv($output, $headers, ',');
        
        // Build the query
        $conditions = array();
        $query = "SELECT at.*, u.name as user_name 
                 FROM `audit_trail` at 
                 LEFT JOIN `user_cred` u ON at.admin_name = u.email
                 LEFT JOIN admin_cred ac ON at.admin_name = ac.admin_name 
                 WHERE ac.admin_name IS NULL";
        
        if($selected_user != 'all') {
            $conditions[] = "at.admin_name = '$selected_user'";
        }
        
        if($selected_action != 'all') {
            $conditions[] = "at.action = '$selected_action'";
        }
        
        if(!empty($start_date) && !empty($end_date)) {
            $conditions[] = "at.timestamp BETWEEN '$start_date' AND '$end_date'";
        }
        
        if(!empty($conditions)) {
            $query .= " AND " . implode(" AND ", $conditions);
        }
        
        $query .= " ORDER BY at.id DESC";
        
        $result = mysqli_query($con, $query);
        
        // Check if there's data
        if(mysqli_num_rows($result) > 0) {
            // Write data to CSV
            while($row = mysqli_fetch_assoc($result)) {
                $timestamp = strtotime($row['timestamp']);
                $formatted_date = date('M d, Y h:i:s A', $timestamp);
                
                // Clean up the description by removing the username part
                $description = $row['description'];
                if(strpos($description, 'User ') === 0) {
                    $description = substr($description, 5); // Remove "User " prefix
                }
                
                $data = array(
                    $row['id'],
                    $row['user_name'] ?? $row['admin_name'], // Use name if available, fallback to email
                    $row['action'],
                    $description,
                    $formatted_date,
                    date('l', $timestamp)
                );
                fputcsv($output, $data, ',');
            }
        }
        
        fclose($output);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - User Activity Logs</title>
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

        .table-responsive-md {
            border-radius: 12px;
            background: white;
        }

        .table-responsive-md::-webkit-scrollbar {
            width: 8px;
        }

        .table-responsive-md::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.05);
        }

        .table-responsive-md::-webkit-scrollbar-thumb {
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
            color: var(--resort-dark);
        }

        .table tbody tr {
            transition: all 0.3s;
        }

        .table tbody tr:hover {
            background-color: rgba(244, 164, 96, 0.05);
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 15px;
            }
            
            .table th, .table td {
                padding: 12px !important;
            }
        }
    </style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3>User Activity Logs</h3>

            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" class="row g-3" id="exportForm">
                        <div class="col-md-3">
                            <label class="form-label fw-bold" style="color: var(--resort-dark);">
                                <i class="bi bi-person-fill"></i> Select User
                            </label>
                            <select name="selected_user" class="form-select border-0 shadow-sm">
                                <option value="all">All Users</option>
                                <?php
                                    $user_query = "SELECT DISTINCT at.admin_name 
                                                 FROM audit_trail at 
                                                 LEFT JOIN admin_cred ac ON at.admin_name = ac.admin_name 
                                                 WHERE ac.admin_name IS NULL 
                                                 ORDER BY at.admin_name";
                                    $user_result = mysqli_query($con, $user_query);
                                    while($user = mysqli_fetch_assoc($user_result)) {
                                        echo "<option value='".$user['admin_name']."'>".$user['admin_name']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold" style="color: var(--resort-dark);">
                                <i class="bi bi-activity"></i> Select Action
                            </label>
                            <select name="selected_action" class="form-select border-0 shadow-sm">
                                <option value="all">All Actions</option>
                                <option value="SIGN UP">Sign Up</option>
                                <option value="LOGIN">Login</option>
                                <option value="LOGOUT">Logout</option>
                                <option value="UPDATE PROFILE">Update Profile</option>
                                <option value="BOOKING">Booking</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold" style="color: var(--resort-dark);">
                                <i class="bi bi-calendar-event"></i> Start Date
                            </label>
                            <input type="date" name="start_date" class="form-control border-0 shadow-sm">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-bold" style="color: var(--resort-dark);">
                                <i class="bi bi-calendar-event"></i> End Date
                            </label>
                            <input type="date" name="end_date" class="form-control border-0 shadow-sm">
                        </div>
                        <div class="col-md-3 d-flex align-items-end gap-2">
                            <button type="button" class="btn btn-secondary shadow-sm" onclick="clearForm()">
                                <i class="bi bi-x-circle"></i> Clear
                            </button>
                            <button type="submit" name="export_csv" class="btn shadow-sm flex-grow-1" style="background-color: var(--resort-primary); color: white;">
                                <i class="bi bi-download me-2"></i> Export to CSV
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                   <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                   <th scope="col">#</th>
                                   <th scope="col">Username</th>
                                   <th scope="col">Action</th>
                                   <th scope="col">Description</th>
                                   <th scope="col">Timestamp</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php 
                                   // Get the list of admin usernames from admin_cred table
                                   $admin_query = "SELECT admin_name FROM admin_cred";
                                   $admin_result = mysqli_query($con, $admin_query);
                                   $admin_names = [];
                                   
                                   while($admin_row = mysqli_fetch_assoc($admin_result)) {
                                       $admin_names[] = $admin_row['admin_name'];
                                   }
                                   
                                   // Build a query that excludes admin users
                                   $placeholders = str_repeat("?,", count($admin_names) - 1) . "?";
                                   
                                   $q = "SELECT * FROM `audit_trail` 
                                         WHERE admin_name NOT IN ($placeholders)
                                         ORDER BY `id` DESC";
                                         
                                   $stmt = mysqli_prepare($con, $q);
                                   
                                   // Bind admin names as parameters
                                   $types = str_repeat("s", count($admin_names));
                                   mysqli_stmt_bind_param($stmt, $types, ...$admin_names);
                                   
                                   mysqli_stmt_execute($stmt);
                                   $data = mysqli_stmt_get_result($stmt);
                                   
                                   $i = 1;

                                   while ($row = mysqli_fetch_assoc($data)) {
                                       echo <<<log_entry
                                       <tr>
                                           <td>{$i}</td>
                                           <td>{$row['admin_name']}</td>
                                           <td>{$row['action']}</td>
                                           <td>{$row['description']}</td>
                                           <td>{$row['timestamp']}</td>
                                       </tr>
                                       log_entry;
                                       $i++;
                                   }
                               ?>                
                           </tbody>
                       </table>
                   </div>
                </div>
            </div>  
        </div>
    </div>
</div>

<?php require('inc/scripts.php'); ?>
<script>
    function clearForm() {
        document.querySelector('select[name="selected_user"]').value = 'all';
        document.querySelector('select[name="selected_action"]').value = 'all';
        document.querySelector('input[name="start_date"]').value = '';
        document.querySelector('input[name="end_date"]').value = '';
    }
</script>
</body>
</html>