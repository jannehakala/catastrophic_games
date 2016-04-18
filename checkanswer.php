<?php
session_start();

// Käyttäjän vastaus ja oikea vastaus.
$answer = $_POST['ans'];
$correct = $_SESSION['correct_answer'];

// Annetaan pisteitä jos annetaan.
if ($answer == $correct) {
    $value = true;
    $_SESSION['score'] += 1;
} else {
    $value = false;
}

// Palautetaan JSON jossa tulos true/false, käyttäjän vastaus sekä oikea vastaus. 
header('Content-Type: application/json');
echo json_encode(array('value' => $value, 'answer' => $answer, 'correct' => $correct));

?>
