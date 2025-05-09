<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $remarks = mysqli_real_escape_string($con, $_POST['remarks']);
    
    // Format check-in and check-out dates for remarks if provided
    if(isset($_POST['check_in']) && isset($_POST['check_out'])) {
        $check_in = new DateTime($_POST['check_in']);
        $check_out = new DateTime($_POST['check_out']);
        $room_type = isset($_POST['room_type']) ? $_POST['room_type'] : 'Standard Room';
        
        // Calculate number of days
        $interval = $check_in->diff($check_out);
        $days = $interval->days;
        
        // Get room price from session or POST
        $room_price = isset($_POST['room_price']) ? $_POST['room_price'] : 0;
        
        // Calculate 50% of total payment
        $total_price = $room_price * $days;
        $payment_amount = $total_price * 0.5;
        
        $remarks = "Room Type: " . $room_type . "\nCheck-in: " . $check_in->format('F j, Y') . "\nCheck-out: " . $check_out->format('F j, Y');
    }

    // Handle file upload
    if (isset($_FILES['payment_proof']) && $_FILES['payment_proof']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['payment_proof']['tmp_name'];
        $fileName = 'PAYMENT_'.random_int(11111,99999).'.jpg';
        $uploadDir = 'uploads/';
        $targetFilePath = $uploadDir . $fileName;
        $dbFilePath = 'uploads/' . $fileName; // Path to store in database

        // Create directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Check file type
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($_FILES['payment_proof']['type'], $allowed_types)) {
            echo "Invalid file type. Only JPG and PNG are allowed.";
            exit;
        }

        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
            // Insert into database with current timestamp, pending status, and payment amount
            $status = 'Pending';
            $sql = "INSERT INTO payment_confirmations (name, email, remarks, payment_proof, payment, status, submitted_at) 
                    VALUES (?, ?, ?, ?, ?, ?, NOW())";
            
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssds", $name, $email, $remarks, $dbFilePath, $payment_amount, $status);

            if (mysqli_stmt_execute($stmt)) {
                // Start session to access user info for the audit trail
                session_start();
                
                // Check if session exists and user is logged in
                if(isset($_SESSION['uName'])) {
                    // Create a detailed description for the audit trail with specific username
                    $booking_details = $_SESSION['uName'] . " booked {$room_type} from {$check_in->format('Y-m-d')} to {$check_out->format('Y-m-d')}";
                    
                    // Log the booking to audit trail
                    logAuditTrail($_SESSION['uName'], 'BOOKING', $booking_details);
                }
                
                echo "success";
            } else {
                echo "Error: " . mysqli_error($con);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }
} else {
    echo "Invalid request.";
}
