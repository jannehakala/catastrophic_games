<!doctype html>
<html>
<head>
	<title>Register</title>
	<style>
		.error {color: #FF0000;}
	</style>
</head>

<?php
include "dbinit.php";

$nameErr = "";
$emailErr = "";
$passErr = "";
$message = "";

$email = "";
$username = "";
$password = "";

if (isset($_POST['register'])) {
	if (empty($_POST['email'])) {
		$emailErr = "Email is required";
		
	}
	else {
		$email = $_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}

	if (empty($_POST['username'])) {
		$nameErr = "Username is required";
	}
	else {
		$username = $_POST['username'];
		if (!preg_match('/^[a-öA-Ö0-9]{4,}$/', $username)) {
			$nameErr = "Username must be minimum 4 characters and contain only letters, numbers and spaces";
		}
	}

	if (empty($_POST['password'])) {
		$passErr = "Password is required";
	}
	else {
		$password = $_POST['password'];
		
		if (!preg_match('/^(?=.*\d)(?=.*[A-Öa-ö])[0-9A-Öa-ö!@#$%&\/\(\)=\[\]\{\}]{8,}$/', $password)) {
			$passErr = "Password must be minimum 8 character and contain letter, numbers, spaces and special letters";
		}
		/*
		if (!preg_match('/^[a-öA-Ö0-9]$/', $password)) {
			$passErr = "Password must contain letters and numbers";
		}
		
		if (!preg_match('/^[0-9]$/', $password)) {
			$passErr = "Password must contain numbers";
		}
		
		if (strlen($password) < 8) {
			$passErr = "Password must be minimum 8 characters";
		}
		*/

	}

	if (empty($nameErr) && empty($emailErr) && empty($passErr)) {
		//$message = "Great success";

		// TIETOKANTAYHTEYS JA TIEDON SYÖTTÖ KANTAAN
		$query = pg_query($db, "INSERT INTO User(name, password) VALUES($username, $password);");
		if ($query) {
			echo "Great success<br>";
			var_dump($result);
		}
		else {
			echo "Nope";
		}

		pg_close($db);
	}
}
?>

<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		Email:<br>
		<input type="text" name="email"><span class="error"> * <?php echo $emailErr; ?></span><br>
		Username:<br>
		<input type="text" name="username"><span class="error"> * <?php echo $nameErr; ?></span><br>
		Password:<br>
		<input type="password" name="password"><span class="error"> * <?php echo $passErr; ?></span><br>
		<input type="submit" name="register" content="Register">
		<br><span> <?php echo $message; ?></span>
	</form>
</body>
</html>