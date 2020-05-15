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

<body>

<h2> <?php echo "Melodiile din acest Playlist:"; ?></h2>

<?php
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
		echo "Artist name: " . $row["aname"]. "<br>";
		echo " Track Name: " . $row["stitle"].  "<br>"; 
		echo "Year :" . $row["year"] . "<br>";
		echo "Count :" . $row["count"] ."<br>";
      
		$ho = $row["link"];
      
        echo "<audio controls='controls'>";
		echo "<source src='$ho'  />";
		echo "</audio>";
		echo "<br>";
		echo "----------------------------------------"."<br>";
    }
} 
else 
{
    echo "Niciun Rezultat Găsit :(";
}?>
</table>
    
    <br></br>
    <a href="../dashboard.php" >Înapoi la Pagina Principală</a>

</body>

</html>



<!-- PHP ZONE! Don't touch it -->
<?php

//Închidere Conexiune
mysqli_close($link);

?>