
<?php

// session_start();

require_once("BL.php");
echo "<h1>Your score: " . $_SESSION['score'] . "</h1><br>";
set_stats($_SESSION['login_user'], 'drugcalculations', $_SESSION['score']);
$_SESSION['score'] = 0;

?>
