
<?php

$host = getenv('MYSQL_HOST_KEY');
$dbname = getenv('MYSQL_DB_NAME');
$user = getenv('MYSQL_USER');
$pw = getenv('MYSQL_PW');

$db_mysql = new PDO('mysql:host=$host;dbname=$dbname;charset=utf-8', $user, $pw);

$db_mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db_mysql->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>