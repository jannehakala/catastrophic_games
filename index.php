<?php
//session_start();
include('login.php');

if(isset($_SESSION['login_user'])){
    header("location: main.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <div id="main">
        <h1>Scarabeus</h1>
        <div id="login">
            <h2>Login</h2>
            <form action="" method="post">
                <label>Username</label>
                <input id="name" name="username" placeholder="username" type="text">
                <label>Password</label>
                <input id="password" name="password" placeholder="**********" type="password">
                <input name="submit" type="submit" value=" Login ">
                <span><?php echo $_SESSION['error']; ?></span>
            </form>
            <a href="register.php">Don't have an account? Register here!</a>
        </div>
    </div>
</body>
</html>