
<?php

session_start();

echo "<h1>Your score: " . $_SESSION['score'] . "</h1><br>";
$_SESSION['score'] = 0;

?>
