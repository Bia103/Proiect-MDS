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



<br></br>
Nume Playlist:
<form action="create_list_success.php" method = "POST">
        <input type="text" name="list_title" placeholder="Nume Playlist"><br>
    Vrei ca acest Playlist să fie public?<br>
        <input type = 'radio' name = 'yes' value = 1>Da<br>
        <input type = 'radio' name = 'yes' value = 0>Nu<br>
        <input type="submit" name="confirm_create" value = "Crează"><br>
</form>