<?php
include ("header.php");
?>

		<div id="main">
			<div id="left">
				<div id="left-1">
					<h2>Exercises</h2>
					<ul>
						<li><a href="llquiz.php">Vaikuttavat aineet</a></li>
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
					<h2>Lääkeluokitukset</h2>
					<p style="margin-top: 20px;">
						Tunnista lääkevalmisteiden vaikuttavat aineet.
					</p>		
					<p style="margin-top: 20px;">
						<form method="GET" action="quizview.php">
					    	<input type="submit" value="startquiz">
						</form>
					</p>
				</div>
			</div>
		</div>		
	</div>
</body>
</html>