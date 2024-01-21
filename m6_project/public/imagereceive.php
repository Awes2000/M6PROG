<?php 
require_once '../source/config.php';
include_once("../source/database.php");

function insertImageInDb($conn, $filename, $size, $type, $link) {
    $query = "INSERT INTO imagetable (file_name, file_size, file_type, file_path) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    return $stmt->execute([$filename, $size, $type, $link]);
}

function handleFile($conn, $file) {
    $response = ["succeeded" => false, "message" => ""];
    
    // Genereer een unieke bestandsnaam en stel het pad in
    $link = uniqid();
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

// Maak de database verbinding
$conn = database_connect();

// Controleer of er een bestand is geüpload
if ($_FILES && $_FILES["image"]["error"] === 0) {
    $response = handleFile($conn, $_FILES["image"]);
} else {
    $response = ["succeeded" => false, "message" => "No file uploaded or error during upload"];
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);

// Sluit de database verbinding
$conn->close();
