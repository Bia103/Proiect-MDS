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
<html>
<head>
	<title>Dashboard</title>
	<style type="text/css">
		BODY {
			margin: 0;
			padding: 0;
			background-color: lightgray;
		}

		#header {
			height: 30px;
			width: 100%;
			background-color: skyblue;
			text-align: center;
			top: 0;
			position: fixed;
		}

		#header H2{
			margin-top: -1px;
		}

		#welcome {
			margin-top: 30px;
		}
	</style>
</head>

<body>
	<div id="container">
	<div id="header"><h2>Welcome to Programmers Hell!</h2></div>
	
	
	<!-- PHP ZONE! Don't touch it -->
	<?php
		echo '<div id="welcome">
				<h3>Hello, '. $row['uname'].'!<br></h3>
			  </div>';
	?>
        
		
    <form action="search.php" method = "post">
		<input name="keywords" type="text" placeholder="Search Keywords">
		<input type="submit" name = "search_button" value = "Search">
    </form>  
	<br>
	
	<form action="searchByLatest.php" method="post">
		<button class="button" name="subject" type="submit" value="search">Cele mai Noi Hit-uri</button>
	</form>
	<br>
	
	<form action="searchByMostSearched.php" method="post">
		<button class="button" name="subject" type="submit" value="search">Cele mai Populare Hit-uri</button>
	</form>
	<br>
	
	<form action="myPlaylist.php" method="post">
		<button class="button" name="subject" type="submit" value="search">Playlist-urile Mele</button>
	</form>
	<br>
	
	<form action="myFriends.php" method="post">
		<button class="button" name="subject" type="submit" value="search">Prietenii Mei</button>
	</form>
	<br>
	
	<a href="logout.php">Logout</a>
	
</body>

<footer>
</footer>

</html>