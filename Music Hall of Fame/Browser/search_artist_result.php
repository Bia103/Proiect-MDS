<!-- PHP ZONE! Don't touch it -->
<?php

//Conectare, Selectare DB
$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$keywords = $_SESSION['keywords'];
$sql = "SELECT * FROM artist WHERE aname like '%$keywords%'";
$result = mysqli_query($link, $sql) or die('Artist Query Failed: ' . mysql_error());

?> 



<!-- HTML ZONE -->
<!DOCTYPE html>
<html lang="ro">
<head>
<title> Music Hall of Fame </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="search">
<link rel="stylesheet" type="text/css" href="../Css/search_artist_result.css">
</head>

<body>
<div class="container">
<div class="item">
	
<button class="button1">Artiști:</button>
<form action="../PageOf/artist.php" method = "POST">


<table>

<tr>
	<th></th>
	<th>Nume</th>
</tr>

<?php
if(mysqli_num_rows($result) > 0)
{
   while($row = mysqli_fetch_assoc($result))
    {
?>

     	<tr>
			<th><input type = 'radio' name = 'artist_id' value = "<?php echo $row["aid"]?>"></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <th><?php echo $row["aname"]?></th>
        </tr>
        <?php
    }
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
}?></table>
    
    <br></br>
    <button type = "submit"  name="artist_select_button_2" class="button2"> Selectează </button>
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
