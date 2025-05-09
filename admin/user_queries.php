<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();

    if (isset($_GET['seen'])) {
        $frm_data = filteration($_GET);
    
        if ($frm_data['seen'] == 'all') {
            // Check if there are any unread messages
            $check_q = "SELECT COUNT(*) AS total FROM `user_queries` WHERE `seen`=0";
            $res = mysqli_fetch_assoc(mysqli_query($con, $check_q));
    
            if ($res['total'] == 0) {
                alert('info', 'All messages are already marked as read.');
            } else {
                $q = "UPDATE `user_queries` SET `seen`=?";
                $values = [1];
                if (update($q, $values, 'i')) {
                    logAuditTrail($_SESSION['admin_name'], 'UPDATE', 'Marked all user queries as read.');
                    alert('success', 'Marked all as read.');
                } else {
                    alert('error', 'Operation failed.');
                }
            }
        } else {
            $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=? AND `seen`=0";
            $values = [1, $frm_data['seen']];
            if (update($q, $values, 'ii')) {
                logAuditTrail($_SESSION['admin_name'], 'UPDATE', 'Marked user query ID ' . $frm_data['seen'] . ' as read.');
                alert('success', 'Marked as read.');
            } else {
                alert('info', 'This message is already marked as read.');
            }
        }
    }
    

    if(isset($_GET['del']))
    {
        $frm_data = filteration($_GET);

        if($frm_data['del']=='all'){
            $q = "DELETE FROM `user_queries`";
            if(delete($q,[])){
                logAuditTrail($_SESSION['admin_name'], 'DELETE', 'Deleted all user queries.');
                alert('success', 'All queries deleted.');
            }
            else{
                alert('error', 'Operation failed.');
            }
        }
        else{
            $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
            $values = [$frm_data['del']];
            if(delete($q,$values,'i')){
                logAuditTrail($_SESSION['admin_name'], 'DELETE', 'Deleted user query ID ' . $frm_data['del'] . '.');
                alert('success', 'Query deleted.');
            }
            else{
                alert('error', 'Operation failed.');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Guest Queries</title>
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

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-bottom: 25px;
        }

        .btn-action {
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

        .btn-action.read-all {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            color: white;
        }

        .btn-action.delete-all {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .table-container {
            height: 450px;
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

        .btn-query {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
            border: none;
        }

        .btn-query.mark-read {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
        }

        .btn-query.mark-read:hover {
            background: #2ecc71;
            color: white;
        }

        .btn-query.delete {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
            margin-top: 8px;
        }

        .btn-query.delete:hover {
            background: #e74c3c;
            color: white;
        }

        .message-cell {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .message-cell:hover {
            white-space: normal;
            overflow: visible;
            background: white;
            position: relative;
            z-index: 1;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }

            .table-container {
                height: 400px;
            }
        }
    </style>
</head>
<body class="bg-light">
    
<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">Guest Queries</h3>

            <div class="card">
                <div class="card-body">
                    <div class="action-buttons">
                        <a href="?seen=all" class="btn btn-action read-all">
                            <i class="fas fa-check-double"></i> Mark all read
                        </a>
                        <a href="?del=all" class="btn btn-action delete-all">
                            <i class="fas fa-trash-alt"></i> Delete all
                        </a>
                    </div>

                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" width="20%">Subject</th>
                                    <th scope="col" width="30%">Message</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $q = "SELECT * FROM `user_queries` ORDER BY `sr_no` DESC";
                                $data = mysqli_query($con, $q);
                                $i=1;

                                while($row = mysqli_fetch_assoc($data))
                                {
                                    $seen='';
                                    if($row['seen']!=1){
                                        $seen = "<a href='?seen=$row[sr_no]' class='btn btn-query mark-read'><i class='fas fa-check'></i> Mark as read</a><br>";
                                    }
                                    $seen.="<a href='?del=$row[sr_no]' class='btn btn-query delete'><i class='fas fa-trash-alt'></i> Delete</a>";
                                
                                    echo <<<query
                                        <tr>
                                            <td>$i</td>
                                            <td>$row[name]</td>
                                            <td>$row[email]</td>
                                            <td>$row[subject]</td>
                                            <td class="message-cell">$row[message]</td>
                                            <td>$row[date]</td>
                                            <td>$seen</td>
                                        </tr>
                                    query;
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

</body>
</html>