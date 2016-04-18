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
                        <p style="font-size:100%;">Start now your own learning progress by selecting exercises you want to practice!
                         You can find the exercises in the left panel called "Exercises".
                           There is three types of exercises: "Drug identification", "Drug calculations" and "Unit conversions". 
                           If you want to test your knowledge you can select Exam.  
                           In exam there is questions from all of these three exercise categories mixed up.</p>
                        <p style="font-size:100%;">
                        You can also see your statistics from the left panel called "Statistics".
                         If you press that button it will take you to the statistics page where you can see all your stats.
                          In this "statistics" page there will be also generated different kind of diagrams which show you yours progresses.</p>
                          <b>Hints:</b>
                          <ul>
                          <li><p style="font-size:100%;">Blue house at the left corner will take you back to the main view.  </p></li>
                          <li><p style="font-size:100%;">In green dropdown button you will find selections: "profile" and "log out". 
                            Profile will take you to the profile page and log out will end your session. </p></li>
                        </ul>
                            <br>
                            Have fun!
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