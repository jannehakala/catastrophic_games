
<?php

session_start();
require_once("BL.php");
echo "<h1>Your score: " . $_SESSION['score'] . "</h1><br>";
set_stats(0, 0, 0);
$_SESSION['score'] = 0;

?>
