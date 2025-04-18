<?php
include '../database.php';


$numSeats = isset($_GET['numSeats']) ? intval($_GET['numSeats']) : 0;
$resDate = isset($_GET['resDate']) ? $_GET['resDate'] : '';

if ($numSeats <= 0 || empty($resDate)) {
    echo json_encode(['error' => 'Invalid input parameters']);
    exit;
}


$sql = "SELECT t.table_id, t.table_number, t.capacity 
        FROM tables t
        JOIN table_availability ta ON t.table_id = ta.table_id
        WHERE t.capacity >= ? AND ta.available_date = ? AND ta.status = 'Available'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $numSeats, $resDate);
$stmt->execute();
$result = $stmt->get_result();

$tables = [];
while ($row = $result->fetch_assoc()) {
    $tables[] = $row;
}

echo json_encode($tables);

$conn->close();
?>
