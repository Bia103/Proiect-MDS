<!-- PHP ZONE! Don't touch it -->
<?php

$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];

if(isset($_POST['list_select_button_2']))
{
    $list_id = $_POST['list_id'];
}

$result = mysqli_query($link, "SELECT * FROM listcontains NATURAL JOIN song WHERE lid = '$list_id'");

?>

<link rel="stylesheet" href="/Css/show_playlist.css">

<!-- HTML ZONE -->
<!DOCTYPE html>
<html>

<body>


</table>

<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>The Playlist</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <style>
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(90%);
    filter: grayscale(90%); /* make all photos black and white */ 
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
      .square
    {
        float: left;
        margin:1pt;
        width:72pt;
        height:72pt;
    }
    .container2
    {
        text-align:center;
        width:450pt;
        height: 80pt;
    }
    .centerwrapper
    {
       margin: auto;
       width: 302pt;
    }
	.centerPseudo {
    display:inline-block;
    text-align:center;
}
.center{
	
}
body{
	text-align: center;
	background:#bdb9b6;
}
.imag{
	position:absolute;
	left:50%;
	top:25%;
	border: 2px solid white;
	padding: 10px;
	border-radius: 25px;
}
.container{
	background:black;
}
.bg-1{
	background:black;
}
.center{
	text-align: center;
	color: black;
}
a{
	color: black;
}
h2{
	font-family: 'Permanent Marker', cursive;
	font-size:45px;
}
.bg-1{
  min-height: 600px;
}
  </style>
  
</head>
<body>


<!-- Container (TOUR Section) -->
<div class="bg-1">
  <div class="container centerPseudo">
<h2> <?php echo "Melodiile din acest Playlist:"; ?></h2>

<?php
if(mysqli_num_rows($result) > 0)
{
	echo "<div class=' container2 row con2'>";
    while($row = mysqli_fetch_assoc($result))
    {
		
		echo "<div class='col-sm-4 centerwrapper' >";
        echo "<div class='thumbnail '>";

		echo "Artist name: " . $row["aname"]. "<br>";
		echo " Track Name: " . $row["stitle"].  "<br>"; 
		echo "Year :" . $row["year"] . "<br>";
		echo "Count :" . $row["count"] ."<br>";
      
		$ho = $row["link"];
      
        echo "<audio controls='controls'>";
		echo "<source src='$ho'  />";
		echo "</audio>";
		echo "<br>";
		echo "----------------------------------------"."<br>";
		echo  "</div>";
     echo  "</div>";
      
    
    }
	echo "</div>";
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
}?>
    
       
    <br></br>
    	<div class="imag">
	<img src="/Images/apple-music-note.jpg" alt="Music" width="400" height="300">
	</div>
  </div>
</div>

</body>
    <br></br>
	<div class = "center">
    <a href="dashboard.php" >Înapoi la Pagina Principală</a></div>

</html>



<!-- PHP ZONE! Don't touch it -->
<?php

//Închidere Conexiune
mysqli_close($link);

?><!-- PHP ZONE! Don't touch it -->
<?php

$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];

if(isset($_POST['list_select_button_2']))
{
    $list_id = $_POST['list_id'];
}

$result = mysqli_query($link, "SELECT * FROM listcontains NATURAL JOIN song WHERE lid = '$list_id'");

?>

<link rel="stylesheet" href="/Css/show_playlist.css">

<!-- HTML ZONE -->
<!DOCTYPE html>
<html>

<body>


</table>

<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>The Playlist</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <style>
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(90%);
    filter: grayscale(90%); /* make all photos black and white */ 
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
      .square
    {
        float: left;
        margin:1pt;
        width:72pt;
        height:72pt;
    }
    .container2
    {
        text-align:center;
        width:450pt;
        height: 80pt;
    }
    .centerwrapper
    {
       margin: auto;
       width: 302pt;
    }
	.centerPseudo {
    display:inline-block;
    text-align:center;
}
.center{
	
}
body{
	text-align: center;
	background:#bdb9b6;
}
.imag{
	position:absolute;
	left:50%;
	top:25%;
	border: 2px solid white;
	padding: 10px;
	border-radius: 25px;
}
.container{
	background:black;
}
.bg-1{
	background:black;
}
.center{
	text-align: center;
	color: black;
}
a{
	color: black;
}
h2{
	font-family: 'Permanent Marker', cursive;
	font-size:45px;
}
.bg-1{
  min-height: 600px;
}
  </style>
  
</head>
<body>


<!-- Container (TOUR Section) -->
<div class="bg-1">
  <div class="container centerPseudo">
<h2> <?php echo "Melodiile din acest Playlist:"; ?></h2>

<?php
if(mysqli_num_rows($result) > 0)
{
	echo "<div class=' container2 row con2'>";
    while($row = mysqli_fetch_assoc($result))
    {
		
		echo "<div class='col-sm-4 centerwrapper' >";
        echo "<div class='thumbnail '>";

		echo "Artist name: " . $row["aname"]. "<br>";
		echo " Track Name: " . $row["stitle"].  "<br>"; 
		echo "Year :" . $row["year"] . "<br>";
		echo "Count :" . $row["count"] ."<br>";
      
		$ho = $row["link"];
      
        echo "<audio controls='controls'>";
		echo "<source src='$ho'  />";
		echo "</audio>";
		echo "<br>";
		echo "----------------------------------------"."<br>";
		echo  "</div>";
     echo  "</div>";
      
    
    }
	echo "</div>";
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
}?>
    
       
    <br></br>
    	<div class="imag">
	<img src="/Images/apple-music-note.jpg" alt="Music" width="400" height="300">
	</div>
  </div>
</div>

</body>
    <br></br>
	<div class = "center">
    <a href="dashboard.php" >Înapoi la Pagina Principală</a></div>

</html>



<!-- PHP ZONE! Don't touch it -->
<?php

//Închidere Conexiune
mysqli_close($link);

?>
