<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
include("header.php");
include("drugdbinit.php");
include("BL.php");

?>
		<div id="main">
			<div id="left">
				<div id="left-1">
					<h2>Exercises</h2>
					<ul>
						<li><a href="llquiz.php">Vaikuttavat aineet</a></li>
						<li><a href="laskuquiz.php">Lääkelaskut</a></li>
						<li>Exercise 3</li>
					</ul>
				</div>
				<div id="left-2">
					<h2>Statistics</h2>
				<?php	get_stats($_SESSION['login_user']) ?>
				</div>
			</div>
			
			<div id="right">
				<div id="content">
					<h2>Quiz</h2>
					<p>
						Tervetuloa käyttämään scarabeusta!
					</p>
				</div>
			</div>

		</div>
	</div>
</body>
</html>