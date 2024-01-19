<?php

function handleFile($file) {
    $response = ["succeeded" => false, "message" => ""];
    
    // Genereer een unieke bestandsnaam en stel het pad in
    $link = uniqid();
    $location = $file["tmp_name"];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = "../uploads/" . $link . "." . $ext;

    // Verplaats de afbeelding naar de 'uploads'-map
    if (move_uploaded_file($location, $filename)) {
        $response["succeeded"] = true;
        $response["message"] = "Upload successful";
    } else {
        $response["message"] = "Error during upload";
    }

    return $response;
}

// Controleer of er een bestand is geüpload
if ($_FILES && $_FILES["image"]["error"] === 0) {
    $response = handleFile($_FILES["image"]);
} else {
    $response = ["succeeded" => false, "message" => "No file uploaded or error during upload"];
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);

