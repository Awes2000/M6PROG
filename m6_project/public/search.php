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
