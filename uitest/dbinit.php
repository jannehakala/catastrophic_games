<?php

$host = getenv('HOST_KEY');
$dbname = getenv('DB_KEY');
$user = getenv('USER_KEY');
$password = getenv('PASSWORD_KEY');

$db = pg_connect("host=$host dbname=$dbname user=$user password=$password")
    or die('Could not connect: ' . pg_last_error());

?>