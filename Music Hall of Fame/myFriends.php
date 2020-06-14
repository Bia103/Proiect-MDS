<!-- PHP ZONE! Don't touch it -->
<?php

$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$result = mysqli_query($link, "SELECT * FROM follow WHERE username1 = '$username'");

?>



<!-- HTML ZONE -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Css/myFriends.css">
</head>
<body>
<header>
<?php include 'menu.php';?>
</header>
<div id = "continut">
    <h2> <?php echo "Prietenii Mei"; ?></h2>

    <div id = "prieteni">
    <?php
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "Nume Prieten: " . $row["username2"]. "<br>";
            echo "Dată: " . $row["followtime"].  "<br>"; 
            echo "----------------------------------------"."<br>";
        }
    } 
    else 
    {
        echo "Niciun Prieten Adăugat :(";
    }?>
    </div>
    <!-- </table> -->
        
        </br>
        <a href="dashboard.php">Înapoi la Pagina Principală</a>
</div>
</body>

</html>



<!-- PHP ZONE! Don't touch it -->
<?php

//Închidere Conexiune
mysqli_close($link);

?>
