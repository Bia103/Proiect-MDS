<!-- PHP ZONE! Don't touch it -->
<?php

$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$keywords = $_SESSION['keywords'];
$sql = "SELECT * FROM list NATURAL JOIN user WHERE ltitle LIKE '%$keywords%' AND ispublic = 1";
$result = mysqli_query($link, $sql) or die('Playlist Query failed: ' . mysql_error());

?> 



<!-- HTML ZONE -->
<!DOCTYPE html>
<html>
<head>
<title> Music Hall of Fame </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="search">
<link rel="stylesheet" type="text/css" href="../Css/search_artist_result.css">
</head>

<header style="text-align: center; margin: 2rem auto;">
<?php include '../menu.php';?>
</header>
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
  width: 200px;
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

<h2 class="button1"> Playlists:</h2>
<form action="../PageOf/list.php" method = "POST">

	<table>
		<tr>
			<th>  </th>
			<th>Nume Playlist</th>
			<th>Nume User</th>
			<th>Dată Creare</th>
		</tr>

<?php
if(mysqli_num_rows($result) > 0)
{
   while($row = mysqli_fetch_assoc($result))
    {
?>

     	<tr>
			<th><input type = 'radio' name = 'list_id' value = "<?php echo $row["lid"]?>"></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <th><?php echo $row["ltitle"]?></th>
            <th><?php echo $row["username"]?></th>
            <th><?php echo $row["lissuedate"]?></th>
        </tr>
		
<?php
    }
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
}?></table>
    
    <br></br>
    <input type = "submit"  name="list_select_button_2" value = "Selectează">
    <br></br>
    <a href="search.php" >Înapoi la Pagina cu Rezultate</a>
	
</form>
</body>

</html>



<!-- PHP ZONE! Don't touch it -->
<?php

//Eliberare Rezultate
mysqli_free_result($result);
//Închidere Conexiune
mysqli_close($link);

?> 