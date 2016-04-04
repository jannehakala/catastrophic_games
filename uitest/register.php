<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<?php
/*
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require_once("dbinit.php");
require_once("User.class.php");
$user = new User($db);
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
	}

	if (empty($nameErr) && empty($emailErr) && empty($passErr)) {
		if ($user->register($username, $password)) {
			echo "Käyttäjätunnus luotu onnistuneesti";
			header("Location: /");
			exit();
		} else {
			echo "Käyttäjätunnuksen luonti epäonnistui!";
		}

		pg_close();
	}
}
*/
?>

<body>
	<div id="main">
		<h1>Scarabeus</h1>
		<div id="register">
			<h2>Register</h2>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				Username<span> *</span><br>
				<input type="text" name="username">
				<span class="error">Username must be minimum 4 characters and contain only letters, numbers and spaces</span><br>
				Password<span> *<br></span>
				<input type="password" name="password">
				<span class="error">Password must be minimum 8 character and contain only letters and numbers</span><br>
				Email<span> *</span><br>
				<input type="text" name="email">
				<span class="error">Invalid email format</span><br>
				<input type="submit" name="register" content="Register" value="Register">
				<br><span></span>
			</form>
		</div>
	</div>
</body>
</html>