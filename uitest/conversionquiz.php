<?php
include ("header.php");
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
                            <input type="hidden" name="quiztype" value="laskuquiz">
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
					<table class="table">
						<thead>
							<tr>
								<th>Exercise</th>
								<th>Points</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Unit conversions</td>
								<td>7</td>
								<td>2000-01-30 01:01:01</td>
								</tr>
							<tr>
								<td>Agents</td>
								<td>4</td>
								<td>2000-01-30 01:01:01</td>
							</tr>
							<tr>
								<td>Drugcalculations</td>
								<td>2</td>
								<td>2000-01-30 01:01:01</td>
							</tr>
							<tr>
								<td>Drugcalculations</td>
								<td>7</td>
								<td>2000-01-30 01:01:01</td>
							</tr>
							<tr>
								<td>Drugcalculations</td>
								<td>5</td>
								<td>2000-01-30 01:01:01</td>
							</tr>
						</tbody>
					</table>
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