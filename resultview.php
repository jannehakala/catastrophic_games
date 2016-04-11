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
                        <?php
                            include 'result.php';
                        ?>
                        <form action="index.php">
                            <input type="submit" value="back to home" class="btn btn-primary">
                        </form>
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