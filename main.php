<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
include("header.php");
include("drugdbinit.php");

?>
		<div id="main">
			<div id="left">
				<div id="left-1">
					<h2>Exercises</h2>
					<ul>
						<li><a href="llquiz.html">Lääkeluokitukset</a></li>
						<li>Exercise 1</li>
						<li>Exercise 2</li>
						<li>Exercise 3</li>
					</ul>
				</div>
				<div id="left-2">
					<h2>Statistics</h2>
				</div>
			</div>
			
			<div id="right">
				<div id="content">
					<h2>Quiz</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempor a nisi sit amet aliquet. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque ullamcorper tellus turpis, non maximus orci hendrerit eu. Suspendisse eu erat a dui mattis euismod. Donec eleifend gravida dolor ut ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in venenatis ex. Pellentesque aliquet odio nec eros auctor facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; 
					</p>
					<p>
						<?php
						$stmt = $db_mysql->query("select ainenimi from laakeaine order by rand() limit 5;");
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							echo $row['ainenimi'] . "<br>";
						}
						?>
					</p>
				</div>
			</div>

		</div>
	</div>
</body>
</html>