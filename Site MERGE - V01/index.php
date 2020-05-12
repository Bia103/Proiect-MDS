<!-- PHP ZONE! Don't touch it -->
<?php
session_start(); //creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie
require 'connect.inc.php'; //pt a se conecta
ob_start();

//$_POST = super global variable for user parameters sent by a form using the POST method.  isset($_POST['Submit']) return true only if 'Submit' is an existing parameter, i.e. if the user has sent such a value using an HTML form
if (isset($_POST['uname']) and isset($_POST['pass']) and !empty($_POST['uname']) and !empty($_POST['pass'])) 
{

	$uname = mysqli_real_escape_string($conn, $_POST['uname']); //crează un string care poate fi folosit de SQL (șterge delimiters and such)
	$pass = $_POST['pass'];

	$sql = "SELECT * FROM user WHERE username= '$uname'";
	$rez = mysqli_query($conn, $sql);
    
	if (mysqli_num_rows($rez) < 1) 
	{
		echo 'Username-ul nu există. Încearcă din nou.';
	} 
	else 
	{
		$row = mysqli_fetch_assoc($rez); //fetches a result row as an associative array --> ca după aceea să pot să sparg
		//echo $row['password']
		$dbuser = $row['username'];
		$dbpass = $row['password'];
        
        
		if ($pass == $dbpass and $uname == $dbuser) 
		{
			$_SESSION['username'] = $uname;
			header("Location: dashboard.php"); //salut unic pt fiecare -> redirecționare
			exit();
		} 
		else 
		{
			echo 'Parolă sau Utilizator Invalid';
		}
	}

}

?>



<!-- HTML ZONE -->
<!DOCTYPE HTML>
<html>

<head>
	<title>Login</title>
	<style type="text/css">
		#login{
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
		A {
			text-decoration: none;
			color: Black;
		}
	</style>
</head>

<body>
	<div id="container">
	<div id="login">
		<h2>Login</h2>
		<form action="index.php" method="POST"> 
		<!-- POST: Sends the form-data as an HTTP post transaction. Trimite către index.php -->
			<input type="text" name="uname" placeholder="Username"><br>
			<input type="password" name="pass" placeholder="Password"><br><br>
			<a href="register.php">Register</a><br><br>
			<input type="submit" class="button" value="Login">
		</form>
	</div>

</body>

<footer>
</footer>

</html>