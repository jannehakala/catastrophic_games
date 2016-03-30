<?php

session_start();
require_once("drugdbinit.php")
require_once("Question.class.php");

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
    header("Location: resultview.php");
    exit();
}

echo "<h1>Question " . ($_SESSION['question']+1) ." / 5</h1><br>";
$question = new VaikuttavaAine($db_mysql);
$question->printQuestion();

?>