<!-- PHP ZONE! Don't touch it -->
<?php

$con = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
if(isset($_POST['follow_button']))
{
    $user_name2 = $_POST['user_name2'];
}

?>

<?php

echo "Follow $user_name2 successfully! ";
mysqli_query($con, "INSERT INTO `follow` (username1, username2, followtime) VALUES ('$username','$user_name2',NOW());");

?>





<br></br>
<a href="../Browser/search.php">Înapoi la Pagina cu Rezultate</a>