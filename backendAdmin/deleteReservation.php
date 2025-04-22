<?php


include '../database.php';

if (!isset($_GET['reservation_id'])) {
    echo json_encode(['error' => 'Reservation ID is required']);
    exit;
}

$reservation_id = $_GET['reservation_id'];

// Prepare and execute the DELETE query
$stmt = $conn->prepare("DELETE FROM reservations WHERE reservation_id = ?");
$stmt->bind_param("i", $reservation_id);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Reservation deleted successfully']);
} else {
    echo json_encode(['error' => 'Failed to delete reservation']);
}

$stmt->close();
$conn->close();
?>
