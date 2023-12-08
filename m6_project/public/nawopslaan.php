<?php
echo '<pre>';
var_dump( $_POST);
var_dump( $_POST);
echo '</pre>';

echo '<h1>HELLO: ' . $_POST['email'] . '</h1>';
$naam = '';


$naam = '';
echo '<b>naam: </b>';
if (empty($_POST['naam'])) {
    echo '<b style="color:#f00;">Je moet wel je naam invullen</b>';
} else {
    $naam = $_POST['naam'];
}
echo $naam;
echo '<br>';

// Repeat the validation and display for other fields
$straatnaam = '';
echo '<b>Straatnaam: </b>';
if (empty($_POST['straatnaam'])) {
    echo '<b style="color:#f00;">Je moet wel je straatnaam invullen</b>';
} else {
    $straatnaam = $_POST['straatnaam'];
}
echo $straatnaam;
echo '<br>';

$huisnummer = '';
echo '<b>Huisnummer: </b>';
if (empty($_POST['huisnummer'])) {
    echo '<b style="color:#f00;">Je moet wel je huisnummer invullen</b>';
} else {
    $huisnummer = $_POST['huisnummer'];
}
echo $huisnummer;
echo '<br>';

$postcode = '';
echo '<b>Postcode: </b>';
if (empty($_POST['postcode'])) {
    echo '<b style="color:#f00;">Je moet wel je postcode invullen</b>';
} else {
    $postcode = $_POST['postcode'];
}
echo $postcode;
echo '<br>';

$email = '';
echo '<b>Email: </b>';
if (empty($_POST['email'])) {
    echo '<b style="color:#f00;">Je moet wel je email invullen</b>';
} else {
    $email = $_POST['email'];
}
echo $email;
echo '<br>';
?>