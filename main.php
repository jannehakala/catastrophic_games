<!DOCTYPE html>
<?php
include ("header.php");
include ("BL.php");
?>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="jumbotron">
                        <h2>Scarabeus</h2>
                        <h3>Welcome to Scarabeus learning environment!</h3>
                        <p>Start now your own learning progress by selecting exercises you want to practice! You can find the exercises in the left panel called "Exercises".  There is three types of exercises: "Drug identification", "Drug calculations" and "Unit conversions". If you want to test your knowledge you can select Exam.  In exam there is questions from all of these three exercise categories mixed up.</p>
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
                    <h2><a href="statistics.php">Statistics</a></h2>
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