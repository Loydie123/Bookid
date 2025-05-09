<?php
require_once('database_connection.php'); // Ensure this file exists

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the connection exists
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// Validate inputs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['event_name']) || !isset($_POST['event_start_date']) || !isset($_POST['event_end_date'])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit;
    }

    $event_name = $conn->real_escape_string($_POST['event_name']);
    $event_start_date = $conn->real_escape_string($_POST['event_start_date']);
    $event_end_date = $conn->real_escape_string($_POST['event_end_date']);

    // SQL Query to insert the event
    $query = "INSERT INTO events (title, start, end, color) VALUES (?, ?, ?, '#3788d8')";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(["status" => "error", "message" => "Failed to prepare query: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("sss", $event_name, $event_start_date, $event_end_date);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Event saved successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save event: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
