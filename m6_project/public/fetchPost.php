<?php

$data = file_get_contents('php://input');
//echo $data;
$json = json_decode($data);
echo $json->maxPrice;

echo "<article>";
echo "Dit is de inhoud van mijn artikel.";
echo "</article>";