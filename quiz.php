<?php

require_once("drugdbinit.php");
require_once("Question.class.php");

if (!isset($_SESSION['question'])) $_SESSION['question'] = 0;
if (!isset($_SESSION['score'])) $_SESSION['score'] = 0;

if (isset($_POST['next'])) {
    $_SESSION['question'] += 1;
    if ($_POST['ans'] == $_SESSION['correct_answer']) {
        $_SESSION['score'] += 1;
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
if ($_SESSION['question'] == 10) {
    $_SESSION['question'] = 0;
    header("Location: resultview.php");
    exit();
}

echo "<h1>Question " . ($_SESSION['question']+1) ." / 10</h1><br>";
switch ($_SESSION['quiztype']) {
    case 'ainequiz':
        $question = new VaikuttavaAine($db_mysql);
        break;
    case 'laskuquiz':
        $question = new Laakelasku();
        break;
    default:
        $question = new VaikuttavaAine($db_mysql);
        break;
}
$question->printQuestion();

?>