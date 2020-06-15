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



<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Css/index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
input{
	border-style: dotted;
	border-radius: 25px;
	left:100px;
	opacity: 0.5;
	width: 500px;
}
input .button{
	width:20px;
}
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}


.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("/Images/grey-guitar.jpg");
  min-height: 100%;
}

.fereastra-bar .fereastra-button {
  padding: 16px;
}
.or{
}
.fereastra-display-left{
	 animation: fadein 2s;
}
@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
#container{
	display:none;
}
.fereastra-button{
	border-radius: 25px;
}
input:hover {
  opacity:1;
}
#start{
	    text-shadow: 0 0 10px #93DEFF, 0 0 20px #93DEFF, 0 0 30px #93DEFF, 0 0 40px #93DEFF, 0 0 50px #93DEFF, 0 0 60px #93DEFF, 0 0 70px #93DEFF;
		text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}
</style>
<body>


<!-- Header with full-height image -->
<header class="bgimg-1 fereastra-display-container fereastra-grayscale-min" id="home">
  <div class="fereastra-display-left fereastra-text-white" style="padding:48px">
    <span class="fereastra-jumbo fereastra-hide-small" id = "start">Start your journey in the music's world</span><br>
    
    <span class="fereastra-large">Log in or make an account</span>
	<p><a href="#about" class="fereastra-button fereastra-white fereastra-padding-large fereastra-large fereastra-margin-top fereastra-opacity fereastra-hover-opacity-off" onclick="myFunction()" id = "Learn">Learn more and start today</a></p>
    <p><class="fereastra-button fereastra-white fereastra-padding-large fereastra-large fereastra-margin-top fereastra-opacity fereastra-hover-opacity-off">  
	<div id="login">
		<div id = "container">
			<h2>Login</h2>
				<form action="index.php" method="POST"> 
		<!-- POST: Sends the form-data as an HTTP post transaction. Trimite către index.php -->
				<input type="text" name="uname" placeholder="Username"><br>
				<input type="password" name="pass" placeholder="Password"><br><br>
				
				<input type="submit" class="button" value="Login">
				<h2 class = "or">OR</h2>
				<a href="register.php">Register</a><br><br>
		</div>
		</form>
	</div></p>
  </div> 
  <div class="fereastra-display-bottomleft fereastra-text-grey fereastra-large" style="padding:24px 48px">
    <i class="fa fa-facebook-official fereastra-hover-opacity"></i>
    <i class="fa fa-instagram fereastra-hover-opacity"></i>
    <i class="fa fa-snapchat fereastra-hover-opacity"></i>
    <i class="fa fa-pinterest-p fereastra-hover-opacity"></i>
    <i class="fa fa-twitter fereastra-hover-opacity"></i>
    <i class="fa fa-linkedin fereastra-hover-opacity"></i>
  </div>

</header>

<!-- About Section -->



<!-- Contact Section -->


<!-- Footer -->
<footer class="fereastra-black fereastra-padding-64">
  <a href="#home" class="fereastra-button fereastra-light-grey"><i class="fa fa-arrow-up fereastra-margin-right"></i>To the top</a>
  <div class="fereastra-xlarge fereastra-section">
    <i class="fa fa-facebook-official fereastra-hover-opacity"></i>
    <i class="fa fa-instagram fereastra-hover-opacity"></i>
    <i class="fa fa-snapchat fereastra-hover-opacity"></i>
    <i class="fa fa-pinterest-p fereastra-hover-opacity"></i>
    <i class="fa fa-twitter fereastra-hover-opacity"></i>
    <i class="fa fa-linkedin fereastra-hover-opacity"></i>
  </div>
  
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function fereastra_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function fereastra_close() {
    mySidebar.style.display = "none";
}
function myFunction() {
  document.getElementById("Learn").style.display = "none";
  document.getElementById("container").style.display = "block";
}
</script>

</body>
</html>
