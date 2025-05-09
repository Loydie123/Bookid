<?php
require_once('database_connection.php'); // Ensure this file exists

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($conn)) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

$query = "SELECT * FROM events";
$result = $conn->query($query);

if (!$result) {
    echo json_encode(["status" => "error", "message" => "Query failed: " . $conn->error]);
    exit;
}

$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        "event_id" => $row["event_id"],
        "title" => $row["title"],
        "start" => $row["start"],
        "end" => $row["end"],
        "color" => $row["color"]
    ];
}

echo json_encode(["status" => "success", "data" => $events]);

$conn->close();
?>
