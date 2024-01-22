<?php
require_once '../source/config.php';
include_once("../source/database.php");

$id = $_GET['fileid'] ?? '';
// Uncomment the line below for testing
// echo $id;

$conn = database_connect();
$searchResults = FindImage($conn, $id);
$conn->close();

if (sizeof($searchResults) == 1) {
    $filename = $searchResults[0]["file_path"];
    $filepointer = fopen($filename, 'rb');

    header("Content-Type: image/png"); // Adjust this based on the image type
    header("Content-Length: " . filesize($filename));

    fpassthru($filepointer);
    exit;
} else {
    die("Invalid file");
}

function FindImage($conn, $id) {
    $query = "SELECT file_path FROM imagetable WHERE file_path like ?";
    $stmt = $conn->prepare($query);
    $id = "%$id%";
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

