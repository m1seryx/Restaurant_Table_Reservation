<?php
include '../database.php';


$sql = "SELECT r.reservation_id, u.username AS user_name, t.table_number, r.reservation_date, r.status, r.number_of_guests
        FROM reservations r
        JOIN user u ON r.user_id = u.user_id
        JOIN tables t ON r.table_id = t.table_id
        WHERE r.status = 'Pending'";

$result = $conn->query($sql);


$reservations = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }
}


header('Content-Type: application/json');
echo json_encode($reservations);

$conn->close();
?>
