<!DOCTYPE html>

<?php
session_start();
include ("BL.php");
?>

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
                <!-- <p>Hello, {$_SESSION['login_user']}!</p> -->
                <li class="dropdown pull-right">
                     <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $_SESSION['login_user']; ?><strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php" onclick="return confirm('Are you sure you want to quit?')"><i class="fa fa-cog"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php" onclick="return confirm('Are you sure you want to quit?')"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="float:none;">
                    <div class="jumbotron">
                        <?php
                            if (isset($_POST['quiztype'])) {
                                $_SESSION['quiztype'] = $_POST['quiztype'];
                            }
                            if (!isset($_SESSION['quiztype'])) $_SESSION['quiztype'] = 'drugidentificationquiz';
                            include ("quiz.php");
                        ?>
                        <form action="/" style="margin-top:100px;">
                            <input type="submit" onclick="return confirm('Are you sure you want to quit?')" value="Quit" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>