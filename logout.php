<?php

session_start();
require_once("User.class.php");
$user = new User();
$user->logout();
header("Location: /");

?>