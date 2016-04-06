<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: /");
    exit();
}

$content = <<<CONTENT
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Scarabeus</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <p>
                    <a href="/"><i class="fa fa-home"></i></a> Hello, {$_SESSION['login_user']}!
                </p>
                <li class="dropdown pull-right">
                     <a href="#" data-toggle="dropdown" class="dropdown-toggle">{$_SESSION['login_user']}<strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-cog"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
CONTENT;
echo $content;
?>