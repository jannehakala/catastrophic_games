<?php
include ("header.php");
include ("BL.php");

if (!isset($_SESSION['question'])) $_SESSION['question'] = 0;
else $_SESSION['question'] = 0;
if (!isset($_SESSION['score'])) $_SESSION['score'] = 0;
else $_SESSION['score'] = 0;
?>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="jumbotron">
                        <h2>Drug identifications</h2>
                        <p>
                            This exercise helps you to learn the most common drugs and their agents. The quiz contains 10 questions.
                        </p>
                        <form method="POST" action="quizview.php">
                            <input type="submit" value="Start exercise!" class="btn btn-primary">
                            <input type="hidden" name="quiztype" value="drugidentificationquiz">
                        </form>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="exercises">
                        <h2>Exercises</h2>
                        <ul>
                            <li><a href="llquiz.php">Drug identification</a></li>
                            <li><a href="laskuquiz.php">Drug calculations</a></li>
                            <li><a href="conversionquiz.php">Unit conversions</a></li>
                            <li><a href="examquiz.php">Exam</a></li>
                        </ul>
                    </div>
                    <h2>Statistics</h2>
                    <?php printstatistics($_SESSION['login_user']); ?>
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