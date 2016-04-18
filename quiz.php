<?php

require_once("drugdbinit.php");
require_once("Question.class.php");

if (!isset($_SESSION['question'])) $_SESSION['question'] = 0;
if (!isset($_SESSION['score'])) $_SESSION['score'] = 0;

if (isset($_POST['next'])) {
    $_SESSION['question'] += 1;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
if ($_SESSION['question'] == 10) {
    // $_SESSION['question'] = 0;
    header("Location: resultview.php");
    exit();
}

echo "<h2>Question " . ($_SESSION['question'] + 1) ." / 10</h2><br>";
switch ($_SESSION['quiztype']) {
    case 'drugidentificationquiz':
        $question = new DrugIdentification($db_mysql);
        break;
    case 'drugcalculationquiz':
        $question = new DrugCalculation();
        break;
    case 'unitconversionquiz':
        $question = new UnitConversion();
        break;
    case 'examquiz':
        $question = new ExamQuiz($db_mysql);
        break;
    default:
        $question = new DrugIdentification($db_mysql);
        break;
}

echo "<form method=POST id=quizform>";
$question->printQuestion();
echo '<button name=check class="btn btn-primary">Check</button>';
echo '<input type=submit name=next value=Next class="btn btn-primary" disabled=true style="display:block;margin-top:20px;">';
echo "</form>";
?>