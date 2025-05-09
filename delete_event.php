<?php
require_once('database_connection.php'); // Ensure this file exists

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// Validate inputs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['event_id'])) {
        echo json_encode(["status" => "error", "message" => "Missing event_id"]);
        exit;
    }

    $event_id = intval($_POST['event_id']);

    // SQL Query to delete the event
    $query = "DELETE FROM events WHERE event_id = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(["status" => "error", "message" => "Failed to prepare query: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("i", $event_id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Event deleted"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to delete event: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
