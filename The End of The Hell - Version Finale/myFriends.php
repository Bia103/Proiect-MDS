<!-- PHP ZONE! Don't touch it -->
<?php

$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$result = mysqli_query($link, "SELECT * FROM follow WHERE username1 = '$username'");
$result1 = mysqli_query($link, "SELECT * FROM list WHERE username IN (SELECT username2 FROM follow WHERE username1 = '$username') AND ispublic = 1");

?>



<!-- HTML ZONE -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Css/myFriends.css">
</head>


<header>
<?php include 'menu.php';?>
</header>

<body>
<div id = "continut">
    <h2> <?php echo "Prietenii Mei"; ?></h2>

    <div id = "prieteni">
	
<form action="PageOf/show_playlist.php" method = "POST">
    <?php
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "Nume Prieten: " . $row["username2"]. "<br>";
            echo "Data: " . $row["followtime"].  "<br>"; 
            echo "----------------------------------------"."<br>";
        }
    } 
    else 
    {
        echo "Niciun Prieten Adăugat :(";
    }
	
	if(mysqli_num_rows($result1) > 0)
			{
				echo "Playlist-urile Publice ale Prietenilor tai:  <br>";
				while($row1 = mysqli_fetch_assoc($result1))
				echo "" . $row1["ltitle"].  "<br>";
			} 
	?>
    </div>
    
        
        </br>
        <a href="dashboard.php">Înapoi la Pagina Principala</a><br>
		<input type = "submit"  name="list_select_button_2" value = "Selectează">
</div>
</form>
</body>

</html>



<!-- PHP ZONE! Don't touch it -->
<?php

//Închidere Conexiune
mysqli_close($link);

?>