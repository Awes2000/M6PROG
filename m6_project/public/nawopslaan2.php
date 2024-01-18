<?php
header('Content-Type: application/json');

$inputJSON = file_get_contents('php://input');
$_POST = json_decode($inputJSON, true);

$naam = $_POST['naam'];
$straatnaam = $_POST['straatnaam'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];

// Voeg hier je validatie en andere logica toe

require_once '../source/config.php';
include_once("../source/database.php");

$conn = database_connect();

$stmt = $conn->prepare("INSERT INTO naw (naam, straat, huisnummer, postcode, email) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssis", $naam, $straatnaam, $huisnummer, $postcode, $email);
$result = $stmt->execute();

if ($result) {
    $response = ['status' => 'success', 'message' => 'Gegevens succesvol opgeslagen!'];
} else {
    $response = ['status' => 'error', 'message' => 'Fout bij het opslaan van gegevens.'];
}

echo json_encode($response);
