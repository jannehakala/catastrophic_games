<!DOCTYPE html>

<?php
session_start();
include ("BL.php");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

    <title>Scarabeus</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .jumbotron {
            font-size: large;
        }
    </style>
  </head>
  <body>

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
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
                        
                        <script>
                            // Valitaan ensimmäinen vaihtoehto oletuksena.
                            $(":radio").first().attr('checked', true);
                            // Tarkistusnappia painetaan...
                            $("button[name=check]").click(function(event) {
                                event.preventDefault();
                                // Haetaan vastaus ajaxilla checkanswer.php tiedostosta.
                                $.ajax({
                                    type: 'POST',
                                    url: 'checkanswer.php',
                                    data: $("#quizform").serialize(),
                                    // Response tulee JSON-muodossa.
                                    success: function(response) {
                                        // Poistetaan radiobuttonit käytöstä ja enabloidaan seuraava-nappi.
                                        $('form input:radio').attr('disabled', true);
                                        $('button[name=check]').attr('disabled', true);
                                        $('input[name=next]').attr('disabled', false);
                                        // iconeilla osoitetaan oikea/väärä vastaus.
                                        if (response['value'] == true) {
                                            $("label[for='"+response['answer']+"']").after("<i class='fa fa-check'></i>");
                                        } else {
                                            $("label[for='"+response['answer']+"']").after("<i class='fa fa-times'></i>");
                                            $("label[for='"+response['correct']+"']").after("<i class='fa fa-check'></i>");
                                        }
                                    }
                                });
                            });
                        </script>
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