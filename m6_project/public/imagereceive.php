<?php 
require_once '../source/config.php';
include_once("../source/database.php");

function insertImageInDb($conn, $filename, $size, $type, $link) {
    $query = "INSERT INTO imagetable (file_name, file_size, file_type, file_path) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    return $stmt->execute([$filename, $size, $type, $link]);
}

function handleFile($conn, $file, $link) {
    $response = ["succeeded" => false, "message" => "", "downloadlink" => null];
    
    $location = $file["tmp_name"];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = "../uploads/" . $link . "." . $ext;

    // Verplaats de afbeelding naar de 'uploads'-map
    if (move_uploaded_file($location, $filename)) {
        // Voeg bestandsgegevens toe aan de database
        $insertResult = insertImageInDb($conn, $file['name'], $file['size'], $file['type'], $filename);
        if ($insertResult) {
            $response["succeeded"] = true;
            $response["message"] = "Upload successful and data inserted into database";
        } else {
            $response["message"] = "Upload successful but failed to insert data into database";
        }
    } else {
        $response["message"] = "Error during upload";
    }

    return $response;
}

function createLink($fileid) {
    return $_SERVER['HTTP_HOST'] . "/imagedownload.php?fileid=" . $fileid;
}

// Maak de database verbinding
$conn = database_connect();

// Controleer of er een bestand is geüpload
if ($_FILES && $_FILES["image"]["error"] === 0) {
    $link = uniqid();
    $response = handleFile($conn, $_FILES["image"], $link);
    if ($response["succeeded"]) {
        $response["downloadlink"] = createLink($link);
    }
} else {
    $response = ["succeeded" => false, "message" => "No file uploaded or error during upload"];
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);

// Sluit de database verbinding
$conn->close();
