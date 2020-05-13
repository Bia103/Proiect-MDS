<!-- PHP ZONE! Don't touch it -->
<?php

$con = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
	
$song_id = "";
$song_title = "";
$song_artist = "";

if(isset($_POST['song_select_button_1']))
{
    $song_id = $_POST['sid']; 
}

if(isset($_POST['song_select_button_2']))
{
    $song_id = $_POST['sid']; 
}

$result = mysqli_query($con, "SELECT * FROM song WHERE sid = '$song_id'");
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
        $song_title = $row['stitle'];
        $song_artist = $row['aname'];
		$song_link = $row["link"];
    }
}

// De fiecare dată când o melodie este accesată, îi creștem count-ul
$sql = "UPDATE song SET count=count+1 WHERE sid = '$song_id'; ";
$con->query($sql);
?>



<!-- HTML ZONE -->
<h1><?php echo $song_title?></h1>
<p style="font-size:20px"><?php echo "$song_artist   "?></p>
	
    <form action="mylist.php" method = "POST">
        <input  name="song_id" type="hidden" value = "<?php echo $song_id?>">
        <input  name="song_title" type="hidden" value = "<?php echo $song_title?>">
        <input type = "submit"  name="list_button" value = "Adăugare la Playlist">
    </form>
	
	<?php
          echo "<audio controls='controls'>";
	echo "<source src='$song_link'  />";
	echo "</audio>";
	
	?>
	
<br>	
<a href="../Browser/search.php" >Înapoi la Pagina cu Rezultate...</a>
<br><br>
<a href="../dashboard.php" >Înapoi la Pagina Principală...</a>



<!-- PHP ZONE! Don't touch it -->
<?php

//Închidere Conexiune
mysqli_close($con);

?>
