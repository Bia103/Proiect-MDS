<!-- PHP ZONE! Don't touch it -->
<?php

$con = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$song_id = "";
$list_id = "";
$song_name = "";
if(isset($_POST['add_to_list_button']))
{
    $song_id = $_POST['song_id'];
    $list_id = $_POST['list_id'];
    $song_title = $_POST['song_title'];
}

echo "Adăugare '$song_title' la Playlist cu Succes! :)"

?>

<br></br>

<?php

$result = mysqli_query($con, "SELECT COUNT(*) FROM listcontains WHERE lid = $list_id");
mysqli_query($con, "INSERT INTO `listcontains` (lid, sid) VALUES ($list_id,'$song_id');");

?>


<br></br>
<a href="../Browser/search.php" >Înapoi la Pagina cu Rezultate...</a>
<br><br>
<a href="../dashboard.php" >Înapoi la Pagina Principală...</a>