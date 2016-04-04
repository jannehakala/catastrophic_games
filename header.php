<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: /");
    exit();
}

include ("BL.php");

$content = <<<CONTENT
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <title>Scarabeus</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="mainstyles.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Welcome, {$_SESSION['login_user']}!</h1>
            <div class="dropdown">
            <button class="dropbtn">{$_SESSION['login_user']}</button>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div id="main">
            <div id="left">
                <div id="left-1">
                    <h2>Exercises</h2>
                    <ul>
                        <li><a href="llquiz.php">Drug identification</a></li>
                        <li><a href="laskuquiz.php">Drug calculations</a></li>
                        <li><a href="conversionquiz.php">Unit conversions</a></li>
                    </ul>
                </div>
                <div id="left-2">
                    <h2><a href =statistics.php>Statistics</a></h2>
CONTENT;
echo $content;
get_stats($_SESSION['login_user']);
echo "</div></div>";
?>