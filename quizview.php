<?php
session_start();
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
            <h1>Welcome, <?php echo $_SESSION['login_user'] ?>!</h1>
            <div class="dropdown">
            <button class="dropbtn"><?php echo $_SESSION['login_user'] ?></button>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>

        <div id="main">
            <div id="content">
                <?php
                    if (isset($_POST['quiztype'])) {
                        $_SESSION['quiztype'] = $_POST['quiztype'];
                    }
                    if (!isset($_SESSION['quiztype'])) $_SESSION['quiztype'] = 'drugidentificationquiz';
                    include ("quiz.php");
                ?>
                <form action="/" style="margin-top:200px;">
                    <input type="submit" onclick="return confirm('Are you sure you want to quit?')" value="Quit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>