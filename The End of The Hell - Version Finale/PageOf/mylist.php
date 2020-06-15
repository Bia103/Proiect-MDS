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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../Css/mylist.css">
<style>
	form {
  /* Just to center the form on the page */
  margin: 0 auto;
  width: 800px;
  /* To see the outline of the form */
  padding: 1em;
  border: 3px solid #CCC;
  border-radius: 1em;
  
}

form div + div {
  margin-top: 1em;
}

label {
  /* To make sure that all labels have the same size and are properly aligned */
  display: inline-block;


}

input, textarea {
  /* To make sure that all text fields have the same font settings
     By default, textareas have a monospace font */
  font: 1em sans-serif;

  /* To give the same size to all text fields */

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
#customers {
  
  border-collapse: collapse;
  margin: 0 auto;
	
}

#customers td, #customers th {
 
  padding: 8px;
}

#customers tr:nth-child(even){}

#customers tr:hover {}

#customers th {

 
  
  color: black;
}
.btn1{
	color = white;
}
#myform{
	position: relative;
}
#btn {
  background: rgb(218, 120, 29);
  height: 35px;
  min-width: 102px;
  border: none;
  border-radius: 10px;
  color: black;
  font-size: 30px;
  font-family: 'Cookie', cursive;
  position: absolute;
  transition: 1s;
  -webkit-tap-highlight-color: transparent;
  transform: translateY(-50%);
  left: 47%;
  position: absolute;
width:3px;
  
  cursor: pointer;
  padding-top: 5px;
}
#btn #circle {
  width: 3px;
  height: 5px;
  background: transparent;
  border-radius: 50%;
  position: absolute;
  top: 0;
  left: 50%;
  overflow: hidden;
  transition: 500ms;
}
#btn:hover {
  height: 50px;
  width: 150px;
  left:48%
  border-radius: 0;
  border-bottom: 2px solid #eee;
}
.noselect {
  -webkit-touch-callout: none;
    -webkit-user-select: none;
     -khtml-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
}
</style>
<html>  

<header>
<?php include '../menu.php';?>
</header>

 
<body>
<br></br>



<!-- PHP ZONE! Don't touch it -->
<?php
$result = mysqli_query($con, "SELECT * FROM list WHERE username = '$username'");
?>


<div id = "titlu">
	<h2>Playlist-urile Mele:</h2>
</div>
<!-- Adăugare la Playlist Existent -->
<div id ="myform">
<form action="add_list_success.php" method = "POST" class="myform">


<?php
if(mysqli_num_rows($result) > 0)
{
?>
    <table id="customers">
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
        <td>
		
		<input id="op_0" class="radio r8-radio-float" type = 'radio' name = 'list_id' value = "<?php echo $row["lid"]?>"></td>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>" >
            <input  name="song_id" type="hidden" value = "<?php echo $song_id?>">
            <input  name="song_title" type="hidden" value = "<?php echo $song_title?>">
            <td class="select" ><?php echo $row["ltitle"]?></td>
            <td><?php echo $row["lissuedate"]?></td>
        </tr>
        <?php
    }?>
	</table>
	
    <br></br>
	
	
	
	<div id="searchButton2">
    <div id="circle"><input  class ="noselect" type = "submit"  name="add_to_list_button" value = "Selecteaza" id="btn"></div>
	</div>
	
</a>
<?php
} 
else 
{
    echo "Încă nu ai creat niciun Playlist! :)";
?></table>
<?php
}?>


    <br></br>
    <a href="../Browser/search_songs_result.php" style="float: left;">Înapoi la Pagina Melodiilor...</a>   
    <a href="create_new_list.php" style="float: right;">Creare un Nou Playlist...</a>
</form>

</div>


<?php

//Eliberare Rezultat
mysqli_free_result($result);
//Închidere Conexiune
mysqli_close($con);

?>

</body>
</html>