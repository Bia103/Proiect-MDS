<!-- PHP ZONE! Don't touch it -->
<?php

//Conectare, Selectare DB
$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$keyword = $_SESSION['keywords'];
$query = "SELECT * FROM song WHERE stitle LIKE '%$keyword%' ORDER BY aname, stitle";
$result = mysqli_query($link, $query) or die('Query Failed: ' . mysql_error());

?> 



<!-- HTML ZONE -->
<!DOCTYPE html>
<html>
<html lang="ro">
<head>
<title> Music Hall of Fame </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="search">
<link rel="stylesheet" type="text/css" href="../Css/search_songs_result.css">
</head>


<body>
<div class="container">
<div class="item">
	
<button class="button1">Nume Melodii:</button>
<!-- Chestia asta crează cutia aia senzuală, care înconjoară tabelul -->
<form action="../PageOf/song.php" method = "POST">

<table>
<tr>
<th></th>
<th>Titlu Melodie</th>
<th>Artist</th>
<th>An</th>
<th>Număr Accesări</th>
</tr>

<?php
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>
     	<tr>
        <th><input type = 'radio' name = 'sid' value = "<?php echo $row["sid"]?>"></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <th><?php echo $row["stitle"]?></th>
            <th><?php echo $row["aname"]?></th>
            <th><?php echo $row["year"]?></th>
			<th><?php echo $row["count"]?></th>
        </tr>
<?php
    }
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
}?>
</table>
    
	
    <br></br>
    <button type = "submit"  name="song_select_button_2" class="button2"> Selectează</button>
    <br></br>
    <a href="search.php" >Înapoi la Pagina cu Rezultate</a>
	
</form>
</div>
</div>
</body>

</html>


<!-- PHP ZONE! Don't touch it -->
<?php

//Eliberare Rezultate
mysqli_free_result($result);
//Închidere Conexiune
mysqli_close($link);

?> 
