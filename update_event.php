<?php
require('database_connection.php'); // Ensure correct database connection

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'] ?? '';
    $title = $_POST['event_title'] ?? '';
    $start_date = $_POST['event_start_date'] ?? '';
    $end_date = $_POST['event_end_date'] ?? '';

    // Debugging: Log received POST data
    error_log("Received Update Data - ID: $event_id, Title: $title, Start: $start_date, End: $end_date");

    if (!empty($event_id) && !empty($title) && !empty($start_date) && !empty($end_date)) {
        $sql = "UPDATE events SET title = ?, start = ?, end = ? WHERE event_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssi", $title, $start_date, $end_date, $event_id);
            if ($stmt->execute()) {
                echo json_encode(["status" => "success"]);
            } else {
                error_log("SQL Error: " . $stmt->error);
                echo json_encode(["status" => "error", "message" => "Database update failed"]);
            }
        } else {
            error_log("SQL Prepare Error: " . $conn->error);
            echo json_encode(["status" => "error", "message" => "Database error"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
?>
