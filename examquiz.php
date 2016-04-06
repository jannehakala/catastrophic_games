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
                        <h2>Exam</h2>
                        <p>
                            The exam contains questions from every category and is a great tool to test your knowledge! The exam contains 10 questions.
                        </p>
                        
                        <form method="POST" action="quizview.php">
                            <input type="submit" value="Start exam!" class="btn btn-primary">
                            <input type="hidden" name="quiztype" value="examquiz">
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
                    <?php get_stats($_SESSION['login_user'],0); ?>
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