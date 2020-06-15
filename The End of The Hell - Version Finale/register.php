<!-- PHP ZONE! Don't touch it -->
<div id = "dateGresite">
<?php

require 'connect.inc.php'; //pt a se conecta

if (isset($_POST['uname']) and isset($_POST['username']) and isset($_POST['pass1']) and isset($_POST['pass2']) and !empty($_POST['uname']) and !empty($_POST['username']) and !empty($_POST['pass1']) and !empty($_POST['pass2'])) 
{

	$uname = mysqli_real_escape_string($conn, $_POST['uname']); //nume real
	$username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $city = mysqli_real_escape_string($conn, $_POST['city']);
	$pass1 = $_POST['pass1']; //parola1
	$pass2 = $_POST['pass2']; //parola2 (tb să fie identice)

	//Pas 1: Verificăm să nu mai existe un username identic
	$sql = "SELECT username FROM user WHERE username='$username'";
	$rez = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($rez);

	if (mysqli_num_rows($rez)>0) 
	{
		echo 'Acest username este deja folosit de altcineva. Încearcă din nou!';
	} 
	else 
	{
		//Pas 2: Verificăm ca cele 2 pass să fie identice
		if ($pass1 == $pass2) 
		{
			$sql = "INSERT INTO user (uname, username, password, umail) VALUES ('$uname', '$username', '$pass1', '$email')";
			$rez = mysqli_query($conn, $sql);
			header("Location: index.php");
			exit();
		} 
		else 
		{
			echo 'Parolele introduse nu coincid. Încearcă din nou!';
		}
	}
}

?>
</div>

<!-- HTML ZONE -->
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="Css/register.css">
</head>

<body>
	<div id="container">
		<div id="register">
		<img id = "registerImage" src="Images/registerImage.jpg" alt="register image">
		<h2>Sign In</h2>
			<form action="register.php" method="POST" id = "formular">
				<input type="text" name="uname" placeholder="Name"><br>
				<input type="text" name="username" placeholder="Username"><br>
				<input type="text" name="email" placeholder="Email"><br>
				<input type="password" name="pass1" placeholder="Password"><br>
				<input type="password" name="pass2" placeholder="Confirm password"><br><br>
				<input type="submit" value="SUBMIT" class="button">
			</form>
		</div>
	</div>
</body>

<footer>
</footer>

</html>