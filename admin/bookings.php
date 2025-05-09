<?php
require('inc/db_config.php');
require('inc/essentials.php');
require("../mail_config.php");
adminLogin();

function send_status_email($to_email, $status) {
    // Get guest name and payment info from the POST data
    $guest_name = isset($_POST['guest_name']) ? $_POST['guest_name'] : 'Valued Guest';
    
    // Initialize default values
    $payment_amount = 0;
    $room_type = "N/A";
    $check_in = "N/A";
    $check_out = "N/A";
    $days = 0;

    // Get payment information from the database only if booking_id is set
    if (isset($_POST['booking_id'])) {
        global $con;
        $booking_id = $_POST['booking_id'];
        $query = "SELECT * FROM payment_confirmations WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('i', $booking_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result && $booking = $result->fetch_assoc()) {
            $payment_amount = $booking['payment'];
            $remarks_lines = explode("\n", $booking['remarks']);
            
            foreach($remarks_lines as $line) {
                if(strpos($line, 'Room Type:') !== false) {
                    $room_type = trim(str_replace('Room Type:', '', $line));
                } elseif(strpos($line, 'Check-in:') !== false) {
                    $check_in = trim(str_replace('Check-in:', '', $line));
                } elseif(strpos($line, 'Check-out:') !== false) {
                    $check_out = trim(str_replace('Check-out:', '', $line));
                }
            }
            
            // Calculate number of days only if we have valid dates
            if ($check_in !== "N/A" && $check_out !== "N/A") {
                try {
                    $check_in_date = new DateTime($check_in);
                    $check_out_date = new DateTime($check_out);
                    $interval = $check_in_date->diff($check_out_date);
                    $days = $interval->days;
                } catch (Exception $e) {
                    error_log("Date calculation error: " . $e->getMessage());
                    $days = 0;
                }
            }
        }
    }
    
    $subject = ($status == 'Paid') ? "Payment Confirmed" : "Payment Rejected";
    $message = ($status == 'Paid') 
        ? "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e1e1e1; border-radius: 10px;'>
            <div style='text-align: center; margin-bottom: 20px;'>
                <h2 style='color: #0f172a; margin-bottom: 5px;'>Dear ".$guest_name.",</h2>
                <h3 style='color: #0f172a; margin-bottom: 5px;'>Booking Confirmed!</h3>
                <p style='color: #555; margin-bottom: 20px;'>Your payment has been successfully verified</p>
            </div>
            
            <div style='background-color: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 20px;'>
                <p style='color: #333; line-height: 1.5;'>Thank you for choosing Bookid for your upcoming stay. We are delighted to confirm that your booking has been secured.</p>
                
                <div style='margin-top: 20px;'>
                    <h3 style='color: #0f172a; font-size: 16px;'>Booking Details:</h3>
                    <ul style='color: #333; line-height: 1.8;'>
                        <li>Experience Type: ".$room_type."</li>
                        <li>Check-in: ".$check_in."</li>
                        <li>Check-out: ".$check_out."</li>
                        <li>Duration: ".$days." night(s)</li>
                    </ul>
                </div>

                <div style='margin-top: 20px; padding: 15px; background-color: #fff; border-radius: 8px; border: 1px solid #e1e1e1;'>
                    <h3 style='color: #0f172a; font-size: 16px; margin-bottom: 10px;'>Payment Summary:</h3>
                    <table style='width: 100%; color: #333;'>
                        <tr>
                            <td style='padding: 8px 0;'>Total Amount:</td>
                            <td style='text-align: right; font-weight: bold;'>₱".number_format($payment_amount * 2, 2)."</td>
                        </tr>
                        <tr>
                            <td style='padding: 8px 0;'>Down Payment (50%):</td>
                            <td style='text-align: right; font-weight: bold;'>₱".number_format($payment_amount, 2)."</td>
                        </tr>
                        <tr style='border-top: 1px solid #e1e1e1;'>
                            <td style='padding: 8px 0;'>Remaining Balance:</td>
                            <td style='text-align: right; font-weight: bold;'>₱".number_format($payment_amount, 2)."</td>
                        </tr>
                    </table>
                </div>
                
                <div style='margin-top: 20px;'>
                    <h3 style='color: #0f172a; font-size: 16px;'>Important Reminders:</h3>
                    <ul style='color: #333; line-height: 1.8;'>
                        <li>Please bring a valid ID during check-in</li>
                        <li>Standard check-in time: 2:00 PM</li>
                        <li>Standard check-out time: 12:00 PM</li>
                    </ul>
                </div>
            </div>
            
            <div style='margin-top: 30px; font-size: 14px; color: #777; line-height: 1.5;'>
                <p>If you have any questions or special requests, please don't hesitate to contact our support team.</p>
            </div>
            
            <div style='margin-top: 30px; padding-top: 20px; border-top: 1px solid #e1e1e1; text-align: center; font-size: 14px; color: #777;'>
                <p>&copy; ".date('Y')." Bookid. All rights reserved.</p>
                <p>Thank you for choosing us!</p>
            </div>
        </div>"
        : "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e1e1e1; border-radius: 10px;'>
            <div style='text-align: center; margin-bottom: 20px;'>
                <h2 style='color: #0f172a; margin-bottom: 5px;'>Dear ".$guest_name.",</h2>
                <h3 style='color: #0f172a; margin-bottom: 5px;'>Important Notice Regarding Your Booking</h3>
            </div>
            
            <div style='background-color: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 20px;'>
                <p style='color: #333; line-height: 1.5;'>We hope this message finds you well. After careful review of your booking submission, we regret to inform you that we are unable to proceed with your reservation at this time.</p>
                
                <div style='margin-top: 20px;'>
                    <p style='color: #333; line-height: 1.5;'>This decision may be due to one or more of the following reasons:</p>
                    <ul style='color: #333; line-height: 1.8;'>
                        <li>Incomplete or unclear payment information</li>
                        <li>Payment verification issues</li>
                        <li>Booking date conflicts or availability issues</li>
                    </ul>
                </div>

                <p style='color: #333; line-height: 1.5; margin-top: 20px;'>We value your interest in choosing Bookid and encourage you to submit a new booking request. Our team is ready to assist you in ensuring a smooth booking process.</p>
            </div>
            
            <div style='margin-top: 30px; font-size: 14px; color: #777; line-height: 1.5;'>
                <p>Should you have any questions or need clarification, please don't hesitate to reach out to our support team. We're here to help!</p>
            </div>
            
            <div style='margin-top: 30px; padding-top: 20px; border-top: 1px solid #e1e1e1; text-align: center; font-size: 14px; color: #777;'>
                <p>&copy; ".date('Y')." Bookid. All rights reserved.</p>
            </div>
        </div>";

    // Use the sendMail function from mail_config.php
    $result = sendMail($to_email, $subject, $message);
    
    if ($result !== true) {
        error_log("Email Error: " . $result);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['mark_paid'])) {
        $id = $_POST['booking_id'];
        $email = $_POST['email'];
        $check_in = $_POST['check_in'];
        $check_out = date('Y-m-d', strtotime($_POST['check_out'] . ' +1 day')); // Add one day to check-out
        $guest_name = $_POST['guest_name'];

        // Update payment status
        $stmt = $con->prepare("UPDATE payment_confirmations SET status='Paid' WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        // Add event to calendar
        $event_title = "Booked";
        $stmt = $con->prepare("INSERT INTO events (title, start, end, color) VALUES (?, ?, ?, '#FF6B6B')");
        $stmt->bind_param('sss', $event_title, $check_in, $check_out);
        $stmt->execute();

        send_status_email($email, 'Paid');
    }

    if (isset($_POST['reject_booking'])) {
        $id = $_POST['booking_id'];
        $email = $_POST['email'];
        
        // For dates with "Paid" status that need to be deleted from the calendar
        // First, check if there are check-in and check-out dates
        if(isset($_POST['check_in']) && isset($_POST['check_out'])) {
            $check_in = $_POST['check_in'];
            $check_out = date('Y-m-d', strtotime($_POST['check_out'] . ' +1 day')); // Add one day to check-out
            
            // More thorough way to delete events - use both title and date range
            $event_title = "Booked"; // Same title as when approving
            $stmt = $con->prepare("DELETE FROM events WHERE title=? AND start=? AND end=?");
            $stmt->bind_param('sss', $event_title, $check_in, $check_out);
            $stmt->execute();
            
            // Also try with just the date range as a fallback
            $stmt = $con->prepare("DELETE FROM events WHERE start=? AND end=?");
            $stmt->bind_param('ss', $check_in, $check_out);
            $stmt->execute();
        }
        
        // Delete the payment confirmation record
        $stmt = $con->prepare("DELETE FROM payment_confirmations WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        send_status_email($email, 'Rejected');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookings</title>
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

        body.bg-light {
            background: #f8f9fa !important;
        }

        #main-content {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            margin: 20px;
            padding: 25px;
        }

        .table {
            border: none;
            margin-top: 20px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }

        .table thead {
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

        .table tbody tr:hover {
            background-color: rgba(244, 164, 96, 0.05);
        }

        .btn-view {
            background-color: var(--resort-light);
            color: var(--resort-primary);
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            border: 1px solid var(--resort-accent);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }
        
        .btn-view:hover {
            background-color: var(--resort-accent);
            color: white;
            box-shadow: 0 4px 12px rgba(244, 164, 96, 0.2);
            transform: translateY(-1px);
        }

        .status-paid {
            color: #2ecc71;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(46, 204, 113, 0.1);
            padding: 6px 12px;
            border-radius: 20px;
        }

        .status-pending {
            color: #f1c40f;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(241, 196, 15, 0.1);
            padding: 6px 12px;
            border-radius: 20px;
        }

        .status-icon {
            font-size: 14px;
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

        #searchInput {
            border: 2px solid #e1e1e1;
            border-radius: 12px;
            padding: 12px 20px;
            font-size: 14px;
            transition: all 0.3s;
            width: 300px !important;
            background: white url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23aaa"><path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>') no-repeat;
            background-position: calc(100% - 15px) center;
            background-size: 20px;
            padding-right: 45px;
        }

        #searchInput:focus {
            border-color: var(--resort-accent);
            box-shadow: 0 0 15px rgba(244, 164, 96, 0.1);
            outline: none;
        }

        .btn-success {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
            margin-right: 8px;
        }

        .btn-danger {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-success:hover, .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
            max-height: 70vh;
            position: relative;
        }

        .table-wrapper {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .table thead th {
            position: sticky;
            top: 0;
            z-index: 10;
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
        }

        .pagination-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .pagination-info {
            color: var(--resort-dark);
            font-size: 14px;
            font-weight: 500;
        }

        .pagination-controls {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .page-btn {
            padding: 8px 15px;
            border: 2px solid var(--resort-accent);
            background: white;
            color: var(--resort-primary);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }

        .page-btn:hover:not(:disabled) {
            background: var(--resort-accent);
            color: white;
            transform: translateY(-1px);
        }

        .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            border-color: #ccc;
        }

        .records-per-page {
            padding: 8px;
            border: 2px solid var(--resort-accent);
            border-radius: 8px;
            margin-left: 10px;
            color: var(--resort-primary);
            outline: none;
        }

        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid var(--resort-light);
            border-top-color: var(--resort-accent);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--resort-dark);
        }

        .empty-state i {
            font-size: 48px;
            color: var(--resort-accent);
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            #searchInput {
                width: 100% !important;
                margin-bottom: 20px;
            }
            
            .table td, .table th {
                padding: 10px !important;
            }

            .table-responsive {
                max-height: 60vh;
            }

            .pagination-container {
                flex-direction: column;
                gap: 15px;
            }

            .pagination-controls {
                width: 100%;
                justify-content: center;
            }
        }

        .room-type {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            font-size: 14px;
        }
        .room-type-daytour {
            background: rgba(0, 123, 255, 0.1);
            color: #007bff;
        }
        .room-type-overnight {
            background: rgba(255, 105, 180, 0.1);
            color: #ff69b4;
        }
    </style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Payment Confirmations</h3>
                <div class="search-container">
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search bookings..." class="form-control">
                </div>
            </div>

            <div class="table-wrapper">
                <div class="table-responsive">
                    <div class="loading-overlay">
                        <div class="loading-spinner"></div>
                    </div>
                    <table class="table table-hover border">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Experience Type</th>
                                <th>Book Dates</th>
                                <th>Payment Amount</th>
                                <th>Payment Proof</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="bookingsTable">

                        <?php
                            $res = select("SELECT * FROM payment_confirmations ORDER BY submitted_at DESC");
                            $i = 1;

                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    // Extract room type and dates from remarks
                                    $remarks_lines = explode("\n", $row['remarks']);
                                    $room_type = "N/A";
                                    $dates = [];
                                    
                                    foreach($remarks_lines as $line) {
                                        if(strpos($line, 'Room Type:') !== false) {
                                            $room_type = trim(str_replace('Room Type:', '', $line));
                                        } elseif(strpos($line, 'Check-in:') !== false || strpos($line, 'Check-out:') !== false) {
                                            $dates[] = $line;
                                        }
                                    }
                                    
                                    $booking_dates = implode("<br>", $dates);
                                    
                                    $type_class = strtolower($room_type) == 'daytour' ? 'room-type-daytour' : 'room-type-overnight';
                                    echo '<tr>';
                                    echo '<td>' . $i++ . '</td>';
                                    echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                    echo '<td><span class="room-type ' . $type_class . '">' . htmlspecialchars($room_type) . '</span></td>';
                                    echo '<td class="booking-dates">' . $booking_dates . '</td>';
                                    echo '<td>₱' . number_format($row['payment'], 2) . '</td>';
                                    echo '<td><a href="/Bookid/' . $row['payment_proof'] . '" target="_blank" class="btn-view"><i class="fas fa-image"></i> View</a></td>';
                                    echo '<td>' . ($row['status'] == 'Paid' ? 
                                        '<span class="status-paid"><i class="fas fa-check status-icon"></i>Paid</span>' : 
                                        '<span class="status-pending"><i class="fas fa-clock status-icon"></i>Pending</span>') . '</td>';
                                    echo '<td>';
                                    if($row['status'] != 'Paid') {
                                        // Extract dates from remarks
                                        $remarks_lines = explode("\n", $row['remarks']);
                                        foreach($remarks_lines as $line) {
                                            if(strpos($line, 'Check-in:') !== false) {
                                                $check_in = date('Y-m-d', strtotime(trim(str_replace('Check-in:', '', $line))));
                                            }
                                            if(strpos($line, 'Check-out:') !== false) {
                                                $check_out = date('Y-m-d', strtotime(trim(str_replace('Check-out:', '', $line))));
                                            }
                                        }
                                        
                                        echo '<form method="POST" style="display:inline;">
                                                <input type="hidden" name="booking_id" value="' . $row['id'] . '">
                                                <input type="hidden" name="email" value="' . $row['email'] . '">
                                                <input type="hidden" name="check_in" value="' . $check_in . '">
                                                <input type="hidden" name="check_out" value="' . $check_out . '">
                                                <input type="hidden" name="guest_name" value="' . htmlspecialchars($row['name']) . '">
                                                <button type="submit" name="mark_paid" class="btn btn-success btn-sm">Approve</button>
                                                <button type="submit" name="reject_booking" class="btn btn-danger btn-sm">Reject</button>
                                            </form>';
                                    } else {
                                        // For paid bookings, extract dates the same way
                                        $remarks_lines = explode("\n", $row['remarks']);
                                        $paid_check_in = '';
                                        $paid_check_out = '';
                                        foreach($remarks_lines as $line) {
                                            if(strpos($line, 'Check-in:') !== false) {
                                                $paid_check_in = date('Y-m-d', strtotime(trim(str_replace('Check-in:', '', $line))));
                                            }
                                            if(strpos($line, 'Check-out:') !== false) {
                                                $paid_check_out = date('Y-m-d', strtotime(trim(str_replace('Check-out:', '', $line))));
                                            }
                                        }
                                        echo '<form method="POST" style="display:inline;">
                                                <input type="hidden" name="booking_id" value="' . $row['id'] . '">
                                                <input type="hidden" name="email" value="' . $row['email'] . '">
                                                <input type="hidden" name="check_in" value="' . $paid_check_in . '">
                                                <input type="hidden" name="check_out" value="' . $paid_check_out . '">
                                                <button type="submit" name="reject_booking" class="btn btn-danger btn-sm">Reject</button>
                                            </form>';
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No payment confirmations found</td></tr>";
                            }
                        ?>

                        </tbody>
                    </table>
                </div>
                <div class="pagination-container">
                    <div class="pagination-info">
                        Showing <span id="showing-start">1</span> to <span id="showing-end">10</span> of <span id="total-entries">0</span> entries
                    </div>
                    <div class="pagination-controls">
                        <button id="prev-page" class="page-btn" disabled>Previous</button>
                        <button id="next-page" class="page-btn">Next</button>
                        <select class="records-per-page" id="records-per-page">
                            <option value="10">10 per page</option>
                            <option value="25">25 per page</option>
                            <option value="50">50 per page</option>
                            <option value="100">100 per page</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Premium Confirmation Modal -->
<div class="modal fade" id="confirmRejectModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Confirm Rejection</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="fas fa-exclamation-triangle text-warning mb-3" style="font-size: 3rem;"></i>
                <h5 class="mb-3">Are you sure?</h5>
                <p class="text-muted mb-0">This booking is already approved. Rejecting it will:</p>
                <ul class="text-muted text-left mt-2 mb-0" style="list-style: none;">
                    <li><i class="fas fa-times-circle text-danger mr-2"></i> Remove the booking from calendar</li>
                    <li><i class="fas fa-times-circle text-danger mr-2"></i> Delete payment confirmation</li>
                    <li><i class="fas fa-times-circle text-danger mr-2"></i> Send rejection email to guest</li>
                </ul>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger px-4" id="confirmReject">Reject Booking</button>
            </div>
        </div>
    </div>
</div>

<script>
function searchTable() {
    let input = document.getElementById("searchInput").value.toUpperCase();
    let rows = document.getElementById("bookingsTable").getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        let cells = rows[i].getElementsByTagName("td");
        let match = false;

        for (let j = 0; j < cells.length; j++) {
            let txtValue = cells[j].textContent || cells[j].innerText;
            if (txtValue.toUpperCase().indexOf(input) > -1) {
                match = true;
                break;
            }
        }

        rows[i].style.display = match ? "" : "none";
    }
}

// Format the dates to remove "Check-in:" and "Check-out:" labels
document.addEventListener('DOMContentLoaded', function() {
    const dateFields = document.querySelectorAll('.booking-dates');
    dateFields.forEach(field => {
        const text = field.textContent;
        const lines = text.split('\n');
        let dates = [];
        
        // Extract only the dates, removing all labels
        lines.forEach(line => {
            if(line.includes('Check-in:') || line.includes('Check-out:')) {
                let date = line.replace('Check-in:', '')
                             .replace('Check-out:', '')
                             .trim();
                dates.push(date);
            }
        });
        
        // Show only the dates with a line break
        field.innerHTML = dates.join('<br>');
    });

    // Pagination Variables
    let currentPage = 1;
    let recordsPerPage = 10;
    let rows = document.querySelectorAll('#bookingsTable tr');
    let totalPages = Math.ceil(rows.length / recordsPerPage);

    function updatePagination() {
        const start = (currentPage - 1) * recordsPerPage + 1;
        const end = Math.min(start + recordsPerPage - 1, rows.length);
        
        document.getElementById('showing-start').textContent = start;
        document.getElementById('showing-end').textContent = end;
        document.getElementById('total-entries').textContent = rows.length;
        
        document.getElementById('prev-page').disabled = currentPage === 1;
        document.getElementById('next-page').disabled = currentPage === totalPages;

        // Show/hide rows based on current page
        rows.forEach((row, index) => {
            if (index >= start - 1 && index < end) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Initialize pagination
    updatePagination();

    // Event Listeners
    document.getElementById('prev-page').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            updatePagination();
        }
    });

    document.getElementById('next-page').addEventListener('click', () => {
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
        }
    });

    document.getElementById('records-per-page').addEventListener('change', (e) => {
        recordsPerPage = parseInt(e.target.value);
        currentPage = 1;
        totalPages = Math.ceil(rows.length / recordsPerPage);
        updatePagination();
    });

    // Enhanced search function
    const originalSearchTable = window.searchTable;
    window.searchTable = function() {
        const loadingOverlay = document.querySelector('.loading-overlay');
        loadingOverlay.style.display = 'flex';

        setTimeout(() => {
            originalSearchTable();
            // Update rows after search
            rows = document.querySelectorAll('#bookingsTable tr:not([style*="display: none"])');
            totalPages = Math.ceil(rows.length / recordsPerPage);
            currentPage = 1;
            updatePagination();
            loadingOverlay.style.display = 'none';
        }, 300); // Small delay to show loading state
    }
});

// Store the form that needs to be submitted
let formToSubmit = null;

// Add confirmation for reject buttons on paid bookings
document.addEventListener('DOMContentLoaded', function() {
    const paidRows = document.querySelectorAll('.status-paid');
    paidRows.forEach(row => {
        const rejectForm = row.closest('tr').querySelector('form[name="reject_booking"]');
        if (rejectForm) {
            rejectForm.addEventListener('submit', function(e) {
                e.preventDefault();
                formToSubmit = this;
                $('#confirmRejectModal').modal('show');
            });
        }
    });

    // Handle confirmation
    document.getElementById('confirmReject').addEventListener('click', function() {
        if (formToSubmit) {
            formToSubmit.submit();
        }
        $('#confirmRejectModal').modal('hide');
    });
});
</script>

</body>
</html>
