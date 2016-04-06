<!DOCTYPE html>

<html>
	<head>
	<meta charset="utf-8">
	<title>Scarabeus</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="mainstyles.css">
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<h1>Welcome</h1>
			<select>
				<option>Profile</option>
			</select>
		</div>

		<div id="main">
			<div id="content">
				<?php
				include 'result.php';
				?>
				<form action="index.php">
					<input type="submit" value="back to home">
				</form>
			</div>
		</div>
	</div>
</body>
</html>