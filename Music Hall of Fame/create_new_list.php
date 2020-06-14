<!-- PHP ZONE! Don't touch it -->
<?php

$con = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$song_id = "";
$song_title = "";
$song_artist = "";

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/Css/create_new_list.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Marck+Script&display=swap" rel="stylesheet">
<br></br>
<div class = "container">
<h2>Nume Playlist:</h2>
<form action="create_list_success.php" method = "POST">
        <input type="text" name="list_title" placeholder="Nume Playlist"><br>
    Vrei ca acest Playlist să fie public?<br>
        <input type = 'radio' name = 'yes' value = 1>Da<br>
        <input type = 'radio' name = 'yes' value = 0>Nu<br>
		<div id="searchButton2">
		<br></br>
    <div id="circle">
        <input type="submit" name="confirm_create" value = "Creaza" id="btn"><br></div></div>
</div>
</form>