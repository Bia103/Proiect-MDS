<!-- PHP ZONE! Don't touch it -->
<?php

require 'connect.inc.php'; //pt a se conecta

if (isset($_POST['uname']) and isset($_POST['username']) and isset($_POST['pass1']) and isset($_POST['pass2']) and !empty($_POST['uname']) and !empty($_POST['username']) and !empty($_POST['pass1']) and !empty($_POST['pass2'])) 
{

	$uname = mysqli_real_escape_string($conn, $_POST['uname']); //nume real
	$username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
	$pass1 = $_POST['pass1']; //parola1
	$pass2 = $_POST['pass2']; //parola2 (tb să fie identice)

	//Pas 1: Verificăm să nu mai existe un username identic
	$sql = "SELECT username FROM user WHERE username='$username'";
	$rez = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($rez);

	if (mysqli_num_rows($rez)>0) 
	{
		echo 'Acest Username este deja folosit de altcineva. Încearcă din nou!';
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
			echo 'Parolele Introduse nu Coincid. Încearcă din nou!';
		}
	}
}

?>



<!-- HTML ZONE -->
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		#register{
			height: auto;
			width: 310px;
			margin: auto;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			margin: auto;
			font-family: Helvetica;
			text-align: center;
		}
		
		INPUT {
			height: 40px;
			width: 300px;
			margin-top: 5px;
			border-radius: 5px;
			border: 1px solid skyblue;
		}

		INPUT:HOVER {
			border: 1px solid blue;
		}

		.button {
			background-color: white;
			width: 150px;
		}
	</style>
</head>

<body>
	<div id="container">
		<div id="register">
			<h2>Register</h2>
			<form action="register.php" method="POST">
				<input type="text" name="uname" placeholder="Nume Real"><br>
				<input type="text" name="username" placeholder="Username"><br>
				<input type="text" name="email" placeholder="Email"><br>
				<input type="password" name="pass1" placeholder="Parolă"><br>
				<input type="password" name="pass2" placeholder="Reintrodu Parola"><br><br>
				<input type="submit" value="Register" class="button">
			</form>
		</div>
	</div>
</body>

<footer>
</footer>

</html>