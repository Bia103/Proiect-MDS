<!-- PHP ZONE! Don't touch it -->
<?php

$con = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
if(isset($_POST['follow_button']))
{
    $user_name2 = $_POST['user_name2'];
}

?>



<link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Inter:wght@200&family=Marck+Script&display=swap" rel="stylesheet">
<style>
body{
	background-image: url("/Images/11.jpg");
	color:white;
	font-size:2vw;
	text-align:center;
}
.text{
	font-family: 'Bad Script', cursive;
	position: absolute;
	top:15vw;
	left:35vw;
	font-size:5vw;
	text-shadow: 5px 5px 5px black, 5px 5px 5px black;
}
a{
	color:white;
	font-size:2vw;
	
}
</style>
<body onload="redirect()">

<script>
		function redirect() 
		{
			setTimeout(function(){window.location.replace("../Browser/search.php");}, 3000);	
		}
	
	</script>
<div class = "text">
<?php

echo "Follow $user_name2 successfully! ";
mysqli_query($con, "INSERT INTO `follow` (username1, username2, followtime) VALUES ('$username','$user_name2',NOW());");

?>
</body>

</div>