<?php


session_start();
$error='asd';
require_once("dbinit.php");
require_once("User.class.php");
$user = new User($db);

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else
    {
        $error = "Täällä";
        $username=$_POST['username'];
        $password=$_POST['password'];

        if ($user->login($username, $password)) {
            $error = "Toimii";
            header("Location: /main.php");
            exit();
        }
        else {
            $error = "Wrong username of password";
            header("Location: /");
            exit();
        }
    }
}

?>