<!-- PHP ZONE! Don't touch it -->
<?php

session_start();//creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie
require 'connect.inc.php'; //pt a se conecta

if (!isset($_SESSION['username'])) //în caz eroare
{
	header("Location: index.php");
	exit();
}

//Luăm info user pentru salut personalizat
$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$username'";
$rez = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rez);

?>



<!-- HTML ZONE -->
<!DOCTYPE html>


<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/Css/dashboard.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
#searchButton{
	position: absolute;
	top: 30vw;
	left: 47vw;
}
#searchButton2{
	position: absolute;
	top: 32vw;
	width: 20px;
	left: 50vw;
	
	
}
.button {

	width: 15vw;
	height: 15vw;
	border-radius: 50%;
	font-size: 2vw;
	color: black;
	text-align: center;
	background: #fff;
}
.btn1{
	position: absolute;
	left: 15vw;
	top: 5vw;
	transition: 500ms;
}

.btn2{
	position: absolute;
	top: 30vw;
	left: 15vw;
	transition: 500ms;
}
.btn3{
	position: absolute;
	top: 30vw;
	left: 75vw;
	transition: 500ms;
}
.btn4{
	position: absolute;
	top: 5vw;
	left: 75vw;
	transition: 500ms;}
#welcome{
	top:15vw;
	width:45vw;
	left:30vw;
	position:absolute;
	font-size: 5vw;
	text-align: center;
	
	/*text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;*/
}
.center{
	position:absolute;
	left:45vw;
}
.center2{
	position:absolute;
	left:37vw;
}
.centerforsmalltext1{
	position:absolute;
	top:58vw;
	left:43vw;
}
.centerforsmalltext2{
	position:absolute;
	top:64vw;
	left:44vw;
}
.centerforsmalltext3{
	position:absolute;
	top:69vw;
	left:37vw;
}
#logout{
	position:absolute;
	top:40vw;
	left:50vw;
}
#cont{
	right: 100vw;
}
.team{
	position:absolute;
	top:60vw;
	text-align:center;
	width:100%;
	background:#DADADA;
}
.w3-content{

	top:45vw;
	text-align:center;
	width:100%;
	background:white;
}
.w3-container{

	text-align:center;
}

#btn {
  background: #222;
  height: 50px;
  min-width: 85px;
  border: none;
  border-radius: 10px;
  color: #eee;
  font-size: 40px;
  font-family: 'Cookie', cursive;
  position: absolute;
  transition: 1s;
  -webkit-tap-highlight-color: transparent;
  
width:3px;
  left: -1vw;
  cursor: pointer;
  padding-top: 5px;
}

#btn #circle {
  width: 3px;
  height: 5px;
  background: transparent;
  border-radius: 50%;
  position: absolute;
  top: 0;
  left: 50%;
  overflow: hidden;
  transition: 500ms;
}

.noselect {
  -webkit-touch-callout: none;
    -webkit-user-select: none;
     -khtml-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
}

#btn:hover {
  background: transparent;
  
}
.btn1:hover {
  background: transparent;
  color:white;
}
.btn2:hover {
  background: transparent;
  color:white;
}
.btn3:hover {
  background: transparent;
  color:white;
}
.btn4:hover {
  background: transparent;
  color:white;
}

#btn:hover #circle {
  height: 50px;
  width: 150px;
  left: 0;
  border-radius: 0;
  border-bottom: 2px solid #eee;
}
}
</style>
<html>
<head>
	<title>Dashboard</title>
	<style type="text/css">
		

	</style>
</head>

<body>
<header>
<?php include 'menu.php';?>
</header>


<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:0px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="/Images/W1.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Muzica</h3>
       
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="/Images/W5.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Sunet</h3>
         
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="/Images/W3.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Vibratie</h3>
        
    </div>
  </div>
 </div> 
<div id="cont">
	
	
	<!-- PHP ZONE! Don't touch it -->
	<div id="hello">
	<?php
		echo '<div id="welcome">
				Hello, '. $row['uname'].'!<br>
			  </div>';
	?>
    </div>
	
    <form action="search.php" method = "post">
	<div id="searchButton">
		<input name="keywords" type="text" placeholder="">
	</div>
	<div id="searchButton2">
		<div id="circle"><input type="submit" name = "search_button" value = "Cauta" class="noselect" id="btn"></div>
	</div>
    </form>  
	
	<br>
	
	<form action="Browser/searchByLatest.php" method="post">
		<button class="button btn1" name="subject" type="submit" value="search">Cele mai Noi Hit-uri</button>
	</form>
	<br>
	
	<form action="Browser/searchByMostSearched.php" method="post">
		<button class="button btn2" name="subject" type="submit" value="search">Cele mai Populare Hit-uri</button>
	</form>
	<br>
		
	<form action="PageOf/myPlaylist.php" method="post">
		<button class="button btn3" name="subject" type="submit" value="search">Playlist-urile Mele</button>
	</form>
	<br>
	
	<form action="myFriends.php" method="post">
		<button class="button btn4" name="subject" type="submit" value="search">Prietenii Mei</button>
	</form>
	<br>
	<div id = "logout">
	<a href="logout.php">Logout</a>
	  </div>
</div>
  <!-- The Band Section -->
  <div class="team">
   <h2 class="w3-wide">THE TEAM</h2>
    <p class="w3-opacity"><i>Iubim muzica</i></p>
    <p class="w3-justify"></p>
	 <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <div class="w3-container w3-center w3-padding-64" style="max-width:800px" id="band">
   
     

 </div>
 </div>
</body>




<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">

</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 10000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>

</html>
