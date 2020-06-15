<!-- PHP ZONE! Don't touch it -->
<?php

$con = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];	
$album_id = $_POST['album_id'];
$album_name = $_POST['album_name'];

if(isset($_POST['album_select_button_1']))
{
    $album_id = $_POST['album_id'];
    $album_name = $_POST['album_name'];
}

if(isset($_POST['album_select_button_2']))
{
    $album_id = $_POST['album_id'];
	$album_name = $_POST['album_name'];
}

$result = mysqli_query($con, "SELECT * FROM song WHERE albid = '$album_id'");

?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Css/album.css">
</head>


<header>
<?php include '../menu.php';?>
</header>


  <body>
  <h2> <?php echo "Melodiile Albumului: "; ?></h2>
  <form action="song.php" method = "POST">

  <table>
    <tr>
      <th></th>
      <th>Titlu Melodie</th>
      <th>Artist</th>
    </tr>

  <?php
  if(mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_assoc($result))
      {
  ?>
        <tr>
        <th><input type = 'radio' name = 'sid' value = "<?php echo $row["sid"]?>"></th>
              <input  name="user_name" type="hidden" value = "<?php echo $username?>">
              <th><?php echo $row["stitle"]?></th>
              <th><?php echo $row["aname"]?></th>
          </tr>
  <p>
  <?php
      }
  } 
  else 
  {
      echo "Niciun Rezultat Găsit :(";
  }?>
 </p> 
</table>
      
      <br></br>
      <input type = "submit"  name="song_select_button_2" value = "Selectează" id = "button">
      <br></br>
      <a href="../Browser/search.php" >Înapoi la Pagina cu Rezultate</a>
    
  </form>

  <div id = "preAnimatie"> </div>
  <div id = "animatie">
    <div class="noteMuzicale">
        <div class="nota-1">  &#9835; &#9833; </div>
        <div class="nota-2">  &#9833; </div>
        <div class="nota-3">  &#9839; &#9834; </div>
        <div class="nota-4">  &#9834;</div>
    </div>
  </div>
</body>

</html>
	


<!-- PHP ZONE! Don't touch it -->
<?php

//Închidere Conexiune
mysqli_close($con);

?>