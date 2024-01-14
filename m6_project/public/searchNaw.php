<?php 


error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json; charset=utf=8');

// Verkrijg de waarde vanuit het formulier (bijvoorbeeld via $_GET)
$searchInput = isset($_GET['searchPersoon']) ? $_GET['searchPersoon'] : '';

// Voer hier de rest van je PHP-code in
// ...



$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);

// Controleer de verbinding
if ($conn->connect_error) {
    echo json_encode(['error' => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Voer hier de rest van je code uit...


// Haal de zoekresultaten op met de FindPersoon-functie
$searchResults = FindPersoon($conn, $searchInput);
echo json_encode($searchResults);
$conn->close();





function GetQueryResultAssoc($result)
{
    $results = [];
    if($result)
    {
        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            array_push($results, $row);
        }
    }

    return $results;
}

function FindPersoon($conn, $name) {
    if($conn) {
        try {
            // SQL query om alles te selecteren uit 'naw' waar de kolom 'naam' gelijk is aan de parameter
            $q = "SELECT * FROM naw WHERE naam = ?;";
            $stmt = $conn->prepare($q);
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();

            // Hier wordt aangenomen dat GetQueryResultAssoc een functie is die de resultaten verwerkt.
            $searchResults = GetQueryResultAssoc($result);
            return $searchResults;
        } catch (Exception $ex) {
            // Het is beter om Exception te gebruiken in plaats van ex
            echo "error during query: " . $ex->getMessage();
        }
    }
    return [];
}
