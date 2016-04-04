<?php
include ("header.php");
?>

        <div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-9">
					<div class="jumbotron">
						<?php
							if (isset($_POST['quiztype'])) {
								$_SESSION['quiztype'] = $_POST['quiztype'];
							}
							if (!isset($_SESSION['quiztype'])) $_SESSION['quiztype'] = 'ainequiz';
							include ("quiz.php");
						?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="exercises">
						<h2>Exercises</h2>
						<ul>
							<li><a href="llquiz.php">Drug identification</a></li>
							<li><a href="laskuquiz.php">Drug calculations</a></li>
							<li><a href="conversionquiz.php">Unit conversions</a></li>
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