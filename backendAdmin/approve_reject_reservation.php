<?php
include '../database.php';


$reservationId = isset($_POST['reservation_id']) ? intval($_POST['reservation_id']) : 0;
$action = isset($_POST['action']) ? $_POST['action'] : '';


if ($reservationId <= 0 || empty($action)) {
    echo json_encode(['error' => 'Invalid input parameters']);
    exit;
}

$sql = "SELECT * FROM reservations WHERE reservation_id = ? AND status = 'Pending'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $reservationId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo json_encode(['error' => 'Reservation not found or not awaiting approval']);
    exit;
}

$reservation = $result->fetch_assoc();
$tableId = $reservation['table_id'];
$resDate = $reservation['reservation_date'];


if ($action === 'Confirmed') {
  
    $sql = "UPDATE reservations SET status = 'Confirmed' WHERE reservation_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reservationId);
    $stmt->execute();

   
    $sql = "UPDATE table_availability SET status = 'Reserved' WHERE table_id = ? AND available_date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $tableId, $resDate);
    $stmt->execute();

    echo json_encode(['success' => 'Reservation confirmed and table reserved']);
} elseif ($action === 'Cancelled') {
  
    $sql = "UPDATE reservations SET status = 'Cancelled' WHERE reservation_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reservationId);
    $stmt->execute();

    echo json_encode(['success' => 'Reservation rejected']);
} else {
    echo json_encode(['error' => 'Invalid action']);
}



$conn->close();
?>
