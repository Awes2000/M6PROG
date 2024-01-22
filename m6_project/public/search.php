<?php
require_once '../source/config.php';
require_once SOURCE_ROOT . 'database.php';

$connection = database_connect();

$plaats = '';
if (isset($_GET["plaats"])) {
    $plaats = '%' . $connection->real_escape_string($_GET["plaats"]) . '%';
}

$sql = 'SELECT * FROM weeromstandigheden WHERE Plaats LIKE ? ORDER BY Datum'; 
$stmt = $connection->prepare($sql);
$stmt->bind_param('s', $plaats);
$stmt->execute();
$result = $stmt->get_result();

while ($weersomstandigheden = mysqli_fetch_assoc($result)) {
    var_dump($weersomstandigheden);
};

function FindImage($conn, $id) {
    $query = "SELECT file_path FROM imagetable WHERE file_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    $stmt->close();
    return $data;
}

