<!-- PHP ZONE! Don't touch it -->
<?php
$con = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$song_title = "";
$song_artist = "";
if(isset($_POST['list_button']))
{
    $song_id = $_POST['song_id'];
    $song_title = $_POST['song_title'];
}

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
<br></br>



<!-- PHP ZONE! Don't touch it -->
<?php
$result = mysqli_query($con, "SELECT * FROM list WHERE username = '$username'");
?>



<h2>Playlist-urile Mele:</h2>
<!-- Adăugare la Playlist Existent -->
<form action="add_list_success.php" method = "POST">


<?php
if(mysqli_num_rows($result) > 0)
{
?>
    <table>
    <tr>
    <th>  </th>
    <th>Nume Playlist</th>
    <th>Dată Creare</th>
    </tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
?>
     	<tr>
        <th><input type = 'radio' name = 'list_id' value = "<?php echo $row["lid"]?>"></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <input  name="song_id" type="hidden" value = "<?php echo $song_id?>">
            <input  name="song_title" type="hidden" value = "<?php echo $song_title?>">
            <th><?php echo $row["ltitle"]?></th>
            <th><?php echo $row["lissuedate"]?></th>
        </tr>
        <?php
    }?>
	</table>

    <br></br>
    <input type = "submit"  name="add_to_list_button" value = "select">

<?php
} 
else 
{
    echo "Încă nu ai creat niciun Playlist! :)";
?></table>
<?php
}?>


    <br></br>
    <a href="../Browser/search_songs_result.php" >Înapoi la Pagina Melodiilor...</a>   
    <a href="create_new_list.php" style="float: right;">Creare un Nou Playlist...</a>
</form>



<?php

//Eliberare Rezultat
mysqli_free_result($result);
//Închidere Conexiune
mysqli_close($con);

?>

</body>
</html>