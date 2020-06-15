<!-- PHP ZONE! Don't touch it -->
<?php

//Conectare, Selectare DB
$link = @mysqli_connect('localhost', 'root', 'root', 'proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
if(isset($_POST['search_button']))
{
    $keywords = $_POST['keywords']; 
    $_SESSION['keywords'] = $keywords; 
}
$keywords = $_SESSION['keywords'];

// SQL QUERY
$song_query = "SELECT * FROM song WHERE stitle LIKE '%$keywords%'";
$song_result = mysqli_query($link, $song_query) or die('Song Query Failed: ' . mysql_error());

$artist_query = "SELECT * FROM artist WHERE aname LIKE '%$keywords%'";
$artist_result = mysqli_query($link, $artist_query) or die('Artist Query Failed: ' . mysql_error());

$album_query = "SELECT * FROM album WHERE albtitle LIKE '%$keywords%' or albgenre LIKE '%$keywords%'";
$album_result = mysqli_query($link, $album_query) or die('Album Query Failed: ' . mysql_error());

$user_query = "SELECT * FROM user WHERE username LIKE '%$keywords%' OR uname LIKE '%$keywords%'";
$user_result = mysqli_query($link, $user_query) or die('User Query Failed: ' . mysql_error());

$list_query = "SELECT * FROM list NATURAL JOIN user WHERE ltitle LIKE '%$keywords%' AND ispublic = 1";
$list_result = mysqli_query($link, $list_query) or die('List Query Failed: ' . mysql_error());

?> 



<!-- HTML ZONE -->
<!DOCTYPE html>
<html>
<head>
<title> Music Hall of Fame </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="search">
<link rel="stylesheet" type="text/css" href="../Css/search.css">
</head>

<style>
	form {
  /* Just to center the form on the page */
  margin: 0 auto;
  width: 800px;
  /* To see the outline of the form */
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;
}

form div + div {
  margin-top: 1em;
}

label {
  /* To make sure that all labels have the same size and are properly aligned */
  display: inline-block;
  width: 110px;
  text-align: right;
}

input, textarea {
  /* To make sure that all text fields have the same font settings
     By default, textareas have a monospace font */
  font: 1em sans-serif;

  /* To give the same size to all text fields */
  width: 150px;
  box-sizing: border-box;

  /* To harmonize the look & feel of text field border */
  border: 1px solid #999;
}

input:focus, textarea:focus {
  /* To give a little highlight on active elements */
  border-color: #000;
}

textarea {
  /* To properly align multiline text fields with their labels */
  vertical-align: top;

  /* To give enough room to type some text */
  height: 5em;
}

.button {
  /* To position the buttons to the same position of the text fields */
  padding-left: 90px; /* same size as the label elements */
}

button {
  /* This extra margin represent roughly the same space as the space
     between the labels and their text fields */
  margin-left: .5em;
}	
</style>
    

<body>

<!------------------------------------------------ MELODII ----------------------------------------------------->
<div class="button1"><h5>Melodii:</h5></div>

<!-- Chestia asta crează cutia aia senzuală, care înconjoară tabelul; dar și ca să rețină informațiile introduse (e formular) -->
<form name = "song_form" action="../PageOf/song.php" method = "POST">

<?php
if(mysqli_num_rows($song_result) > 0)
{
?>

    <table>
    <tr>
    <th></th>
    <th>Titlu Melodie</th>
    <th>Nume Artist</th>
	<th>An</th>
	<th>Număr Accesări</th>
    </tr>
	
<?php
    $i = 0;
    $_SESSION['song_result'] = $song_result;
    while($row = mysqli_fetch_assoc($song_result) and $i<10)
    {
?>


     	<tr>
        <th><?php echo $row["sid"]?></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <th><?php echo $row["stitle"]?></th>
            <th><?php echo $row["aname"]?></th>
			<th><?php echo $row["year"]?></th>
			<th><?php echo $row["count"]?></th>

        </tr>
		
		<?php
        $i++;
    }?>
	</table>
	
    <a href="search_songs_result.php" style="float: right;">Accesează Restul Melodiilor...</a>
    <br></br>
  
<?php
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
?>
</table>
<?php
}?>

    <br></br>
    <a href="../dashboard.php" >Înapoi la Pagina Principală...</a>
	
</form>


<?php

//Eliberare Rezultate
mysqli_free_result($song_result);

?>





<!---------------------------------------------ARTIȘTI ----------------------------------------------->
<div class="button1"><h5>Artiști:</h5></div>
<form name = "artist_form" action="../PageOf/artist.php" method = "POST">


<?php
if(mysqli_num_rows($artist_result) > 0)
{
?>


    <table>
    <tr>
    <th></th>
    <th>Nume</th>
    </tr>
	
	
<?php
    $i = 0;
    while($row = mysqli_fetch_assoc($artist_result) and $i < 10)
    {
?>
     	<tr>
			<th><?php echo $row["aid"]?></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <th><?php echo $row["aname"]?></th>
        </tr>
		
    <?php
        $i++;
    }?>
	</table>
	
    <a href="search_artist_result.php" style="float: right;">Accesează Restul Artiștilor...</a>

<?php
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
?></table>
<?php
}?>

    <br></br>
    <a href="../dashboard.php" >Înapoi la Pagina Principală...</a>
	
</form>


<?php

//Eliberare Rezultate
mysqli_free_result($artist_result);

?>





<!----------------------------------------------ALBUME result----------------------------------------------->
<div class="button1"><h5>Albume:</h5></div>
<form action="../PageOf/album.php" method = "POST">


<?php
if(mysqli_num_rows($album_result) > 0)
{
?>


    <table>
		<tr>
			<th>  </th>
			<th>Titlu</th>
			<th>An</th>
			<th>Gen Muzical</th>
		</tr>
	
<?php
    $i = 0;
    while($row = mysqli_fetch_assoc($album_result) and $i<10)
    {
?>

     	<tr>
			<th><?php echo $row["albid"]?></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <th><?php echo $row["albtitle"]?></th>
			<th><?php echo $row["albyear"]?></th>
			<th><?php echo $row["albgenre"]?></th>
        </tr>
		
    <?php
        $i++;
    }?></table>
	
    <a href="search_album_result.php" style="float: right;">Accesează Restul Albumelor...</a>

<?php
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
?></table>
<?php
}?>

    <br></br>
    <a href="../dashboard.php" >Înapoi la Pagina Principală...</a>
	
</form>


<?php

//Eliberare Rezultate
mysqli_free_result($album_result);

?>





<!--------------------------------------Playlist
----------------------------------------------->
<div class="button1"><h5>Playlists:</h5></div>
<form action="../PageOf/list.php" method = "POST">


<?php
if(mysqli_num_rows($list_result) > 0)
{
?>
    <table>
		<tr>
			<th>  </th>
			<th>Nume Playlist</th>
			<th>Nume User</th>
			<th>Dată Creare</th>
		</tr>
		
<?php
    $i = 0;
    while($row = mysqli_fetch_assoc($list_result) and $i<10)
    {
?>

     	<tr>
			<th><?php echo $row["lid"]?></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <th><?php echo $row["ltitle"]?></th>
            <th><?php echo $row["username"]?></th>
            <th><?php echo $row["lissuedate"]?></th>
        </tr>
		
    <?php
        $i++;
    }?>
	</table>
	
    <a href="search_list_result.php" style="float: right;">Accesează Restul Playlist-urilor...</a>
    <br></br>
    
<?php
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
?>
</table>
<?php
}?>

    <br></br>
    <a href="../dashboard.php" >Înapoi la Pagina Principală...</a>
	
</form>


<?php

//Eliberare Rezultate
mysqli_free_result($list_result);

?>





<!-----------------------------------------USERS
----------------------------------------------->
<div class="button1"><h5>Users:</h5></div>
<form action="../PageOf/user.php" method = "POST">

<?php
if(mysqli_num_rows($user_result) > 0)
{
?>

    <table>
		<tr>
			<th>Nume User</th>
		</tr>
	
<?php
    $i = 0;
    while($row = mysqli_fetch_assoc($user_result) and $i<10)
    {
?>

     	<tr>
            <th><?php echo $row["username"]?></th>
        </tr>
		
    <?php
        $i++;
    }?>
	</table>
	
    <a href="search_user_result.php" style="float: right;">Vezi toți Utilizatorii...</a>
    <br></br>
    
<?php
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
?>
</table>
<?php
}?>

    <br></br>
    <a href="../dashboard.php" >Înapoi la Pagina Principală...</a>
	
</form>



<?php

//Eliberare Rezultate
mysqli_free_result($list_result);

//Închidere conexiune
mysqli_close($link);
?>

</body>
</html>