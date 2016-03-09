<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=publishing user=www password=foo")
    or die('Could not connect: ' . pg_last_error());

?>