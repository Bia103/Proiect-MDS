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
<html lang="ro">
<head>
<title> Music Hall of Fame </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="search">
<link rel="stylesheet" type="text/css" href="../Css/search_user_result.css">
</head>

<body>
<div class="container">
<div class="item">
	
<button class="button1">Users:</button>
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
    <button type = "submit"  name="user_select_button_2" class="button2">Selectează</button>
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
