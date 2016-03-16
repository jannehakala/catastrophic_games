<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

session_start();
$error=''; 
require_once("dbinit.php");
require_once("User.class.php");
$user = new User($db);

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        if ($user->login($username, $password)) {
            header("Location: /main.php");
        }
        else {
            $error = "Wrong username of password";
            header("Location: /");
        }
    }
}

?>