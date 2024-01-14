<?php
echo '<pre>';
var_dump($_POST);
echo '</pre>';

$naam = '';
$straatnaam = '';
$huisnummer = '';
$postcode = '';
$email = '';

// Validatie voor naam
echo '<b>Naam: </b>';
if (empty($_POST['naam'])) {
    echo '<b style="color:#f00;">Je moet wel je naam invullen</b><br>';
    $valid = false;
} else {
    $naam = $_POST['naam'];
    echo $naam . '<br>';
    $valid = true;
}

// Validatie voor straatnaam
echo '<b>Straatnaam: </b>';
if (empty($_POST['straatnaam'])) {
    echo '<b style="color:#f00;">Je moet wel je straatnaam invullen</b><br>';
    $valid = false;
} else {
    $straatnaam = $_POST['straatnaam'];
    echo $straatnaam . '<br>';
}

// Validatie voor huisnummer
echo '<b>Huisnummer: </b>';
if (empty($_POST['huisnummer'])) {
    echo '<b style="color:#f00;">Je moet wel je huisnummer invullen</b><br>';
    $valid = false;
} else {
    $huisnummer = $_POST['huisnummer'];
    echo $huisnummer . '<br>';
}

// Validatie voor postcode
echo '<b>Postcode: </b>';
if (empty($_POST['postcode'])) {
    echo '<b style="color:#f00;">Je moet wel je postcode invullen</b><br>';
    $valid = false;
} else {
    $postcode = $_POST['postcode'];
    echo $postcode . '<br>';
}

// Validatie voor email
echo '<b>Email: </b>';
if (empty($_POST['email'])) {
    echo '<b style="color:#f00;">Je moet wel je email invullen</b><br>';
    $valid = false;
} else {
    $email = $_POST['email'];
    echo $email . '<br>';
}

if ($valid) {
    require_once '../source/config.php';
    include_once("../source/database.php");

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);

    // Controleer of het e-mailadres al in de database voorkomt
    $query = "SELECT email FROM naw WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
    echo '<p style="color: red;">DIT EMAIL ADRES KOMT AL VOOR IN DE DATABASE</p>';
    $stmt->close(); // Sluit het eerste statement
} else {
    // INSERT query om de nieuwe gebruiker toe te voegen
    $insertQuery = "INSERT INTO naw (naam, straatnaam, huisnummer, postcode, email) VALUES (?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param("sssss", $naam, $straatnaam, $huisnummer, $postcode, $email);
    
    if ($insertStmt->execute()) {
        echo '<p>Gegevens succesvol opgeslagen!</p>';
        $insertStmt->close(); // Sluit het INSERT statement
    } else {
        echo '<p>Error bij opslaan gegevens: ' . $conn->error . '</p>';
        $insertStmt->close(); // Zorg ervoor dat je het statement sluit, zelfs als er een fout optreedt
    }
}

    // Sluit de databaseverbinding
    $conn->close();
}
?>
