<!-- PHP ZONE! Don't touch it -->
<?php

$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$keywords = $_SESSION['keywords'];
$sql = "SELECT * FROM user WHERE username LIKE '%$keywords%'";
$result = mysqli_query($link, $sql) or die('User Query Failed: ' . mysql_error());

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

<h2>Users:</h2>
<form action="../PageOf/user.php" method = "POST">

<table>
    <tr>
		<th>  </th>
		<th>Nume User</th>
    </tr>
	
<?php
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
?>

     	<tr>
			<th><input type = 'radio' name = 'user_name2' value = "<?php echo $row["username"]?>"></th>
          	<input  name="user_name" type="hidden" value = "<?php echo $username?>">
            <th><?php echo $row["username"]?></th>
        </tr>
		
    <?php
        $i++;
    }?>
	</table>
    
    <br></br>
    <input type = "submit"  name="user_select_button_2" value = "Selectează">
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