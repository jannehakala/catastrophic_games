<?php
session_start();
include ("header.php");
?>

        <div id="main">
            <div id="content">
                <?php
                    if (isset($_POST['quiztype'])) {
                        $_SESSION['quiztype'] = $_POST['quiztype'];
                    }
                    if (!isset($_SESSION['quiztype'])) $_SESSION['quiztype'] = 'ainequiz';
                    include ("quiz.php");
                ?>
            </div>
        </div>
    </div>
</body>
</html>