<!-- PHP ZONE! Don't touch it -->
<?php

$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$keywords = $_SESSION['keywords'];
$sql = "SELECT * FROM album WHERE albtitle LIKE '%$keywords%'";
$result = mysqli_query($link, $sql) or die('Album Query Failed: ' . mysql_error());

?> 



<!-- HTML ZONE -->
<!DOCTYPE html>
<html lang="ro">
<head>
<title> Music Hall of Fame </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="search">
<link rel="stylesheet" type="text/css" href="../Css/search_album_result.css">
</head>





<body>
<div class="container">
<div class="item">
	
<button class="button1">Albume:</button>
<form action="../PageOf/album.php" method = "POST">

	<table>
		<tr>
			<th>  </th>
			<th>Title</th>
		</tr>

<?php
if(mysqli_num_rows($result) > 0)
{
   while($row = mysqli_fetch_assoc($result))
    {
?>
     	<tr>
			<th><input type = 'radio' name = 'album_id' value = "<?php echo $row["albid"]?>"></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <th><?php echo $row["albtitle"]?></th>
        </tr>
		
<?php
    }
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
}?></table>
    
    <br></br>
    <button type = "submit"  name="album_select_button_2" class="button2">Selectează </button>
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
