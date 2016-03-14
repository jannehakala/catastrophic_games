<?php

session_start();
require_once("Question.class.php");

if (!isset($_SESSION['spent'])) {
    $_SESSION['spent'] = array();
}
if (isset($_POST['next'])) {
    $_SESSION['question'] += 1;
    if ($_POST['ans'] == $_SESSION['correct_answer']) {
        $_SESSION['score'] += 1;
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
if ($_SESSION['question'] == 5) {
    $_SESSION['question'] = 0;
    unset($_SESSION['spent']);
    header("Location: resultview.php");
    exit();
}

echo "<h1>Question " . ($_SESSION['question']+1) ." / 5</h1><br>";
$question = new Question();
$question->printQuestion();

?>