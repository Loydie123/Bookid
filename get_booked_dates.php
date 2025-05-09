<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

header('Content-Type: application/json');

$q = "SELECT start, end FROM `events` WHERE title='Booked'";
$result = mysqli_query($con, $q);
$bookedDates = array();

while($row = mysqli_fetch_assoc($result)) {
    // Add start date
    $bookedDates[] = date('Y-m-d', strtotime($row['start']));
    // Subtract one day from end date to get actual check-out date
    $bookedDates[] = date('Y-m-d', strtotime($row['end'] . ' -1 day'));
}

echo json_encode(['booked_dates' => array_values(array_unique($bookedDates))]);
?> 