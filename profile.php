<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: /");
    exit();
}
?>

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
            <h1>Welcome, <?php echo $_SESSION['login_user']; ?></h1>
            <div class="dropdown">
            <button class="dropbtn"><?php echo $_SESSION['login_user']; ?></button>
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
                        <li><a href="llquiz.html">Lääkeluokitukset</a></li>
                        <li>Exercise 1</li>
                        <li>Exercise 2</li>
                        <li>Exercise 3</li>
                    </ul>
                </div>
                <div id="left-2">
                    <h2>Statistics</h2>
                </div>
            </div>
            
            <div id="right">
                <div id="content">
                    <h2>Profile</h2>
                </div>
            </div>
        </div>      
    </div>
</body>
</html>