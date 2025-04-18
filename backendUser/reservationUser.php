<?php
session_start();
include '../database.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'You need to log in first.']);
    exit();
}


$user_id = $_SESSION['user_id'];

$sql = "SELECT r.reservation_id, t.table_number, r.number_of_guests, r.reservation_date , r.status, r.number_of_guests
        FROM reservations r
        JOIN tables t ON r.table_id = t.table_id
        WHERE r.user_id = '$user_id'
        
        ORDER BY r.reservation_date DESC
        ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $reservations = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $reservations[] = [
            'reservation_id' => $row['reservation_id'],
            'table_number' => $row['table_number'],
            'number_of_guests' => $row['number_of_guests'],
            'reservation_date' => $row['reservation_date'],
            'status' => $row['status'],
        ];
    }

    echo json_encode(['reservations' => $reservations]);
} else {
    echo json_encode(['error' => 'No reservations found.']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_reservation_id'])) {
    $reservation_id = $_POST['delete_reservation_id'];

    $sql = "DELETE FROM reservations WHERE reservation_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $reservation_id);
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => 'Reservation deleted successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to delete reservation.']);
    }
    exit();
}
?>
