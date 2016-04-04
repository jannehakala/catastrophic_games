<?php
include ("header.php");
include ("BL.php");
?>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-9">
					<div class="jumbotron">
						<h2>Unit conversions</h2>
						<p>Unit conversions</p>
						
						<p>
                        <form method="POST" action="quizview.php">
                            <input type="submit" value="Start exercise">
                            <input type="hidden" name="quiztype" value="unitconversionquiz">
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