<?php
include '../database.php';


$userEmail = isset($_POST['email']) ? $_POST['email'] : '';
$userName = isset($_POST['name']) ? $_POST['name'] : '';
$tableId = isset($_POST['table_id']) ? intval($_POST['table_id']) : 0;
$resDate = isset($_POST['res_date']) ? $_POST['res_date'] : '';
$guests = isset($_POST['numSeats']) ? intval($_POST['numSeats']) : 0;


// Basic input validation
if (empty($userEmail) || empty($userName) || $tableId <= 0 || empty($resDate) || $guests <= 0) {
    echo json_encode(['error' => 'Invalid input parameters']);
error_log("email: $userEmail");
error_log("name: $userName");
error_log("tableId: $tableId");
error_log("resDate: $resDate");
error_log("guests: $guests");
    exit;
}
error_log("email: $userEmail");
error_log("name: $userName");
error_log("tableId: $tableId");
error_log("resDate: $resDate");
error_log("guests: $guests");

$sql = "SELECT user_id FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(['error' => 'Error preparing the SQL statement for user check']);
    exit;
}

$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo json_encode(['error' => 'User not found']);
    exit;
}


$userRow = $result->fetch_assoc();
$userId = $userRow['user_id'];


$sql = "SELECT status FROM table_availability WHERE table_id = ? AND available_date = ? AND status = 'Available'";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(['error' => 'Error preparing the SQL statement for table availability check']);
    exit;
}

$stmt->bind_param("is", $tableId, $resDate);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo json_encode(['error' => 'Table not available on this date']);
    exit;
}


$sql = "INSERT INTO reservations (user_id, table_id, reservation_date, status, number_of_guests) 
        VALUES (?, ?, ?, 'Pending', ?)";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(['error' => 'Error preparing the SQL statement for reservation insert']);
    exit;
}

$stmt->bind_param("iisi", $userId, $tableId, $resDate, $guests);
if (!$stmt->execute()) {
    echo json_encode(['error' => 'Error executing the reservation insert']);
    exit;
}

echo json_encode(['success' => 'Reservation request submitted, awaiting admin approval.']);


$conn->close();
?>