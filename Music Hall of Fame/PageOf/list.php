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



<!-- HTML ZONE -->
<!DOCTYPE html>
<html>

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

<h2> <?php echo "Melodiile din acest Playlist:"; ?></h2>
<form action="song.php" method = "POST">

<table>
	<tr>
		<th></th>
		<th>Titlu Melodie</th>
		<th>Artist</th>
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
    <input type = "submit"  name="song_select_button_2" value = "Selectează">
    <br></br>
    <a href="../Browser/search.php" >Înapoi la Pagina cu Rezultate</a>
	
</form>
</body>

</html>



<!-- PHP ZONE! Don't touch it -->
<?php

//Închidere Conexiune
mysqli_close($link);

?>