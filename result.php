
<?php

require_once("BL.php");

echo "<h1>Your score: " . $_SESSION['score'] . "</h1><br>";

switch ($_SESSION['quiztype']) {
    case 'drugidentificationquiz':
        $exercisetype = "Drug identification";
        break;
    case 'drugcalculationquiz':
        $exercisetype = "Drug calculations";
        break;
    case 'unitconversionquiz':
        $exercisetype = "Unit conversions";
        break;
    case 'examquiz':
        $exercisetype = "Exam";
        break;
    default:
        $question = new DrugIdentification($db_mysql);
        break;
}

if ($_SESSION['question'] != 0) {
    set_stats($_SESSION['login_user'], $exercisetype, $_SESSION['score']);
    $_SESSION['question'] = 0;
}

?>
