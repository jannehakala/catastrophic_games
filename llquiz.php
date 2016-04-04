
<?php session_start() ?>

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
            <h1>Welcome,<?php echo $_SESSION['login_user'] ?>!</h1>
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
                    <h2>Drug identification</h2>
                    <p style="margin-top: 20px;">
                        Drug identification
                    </p>        
                    <p style="margin-top: 20px;">
                        <form method="POST" action="quizview.php">
                            <input type="submit" value="Start">
                            <input type="hidden" name="quiztype" value="drugidentificationquiz">
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>