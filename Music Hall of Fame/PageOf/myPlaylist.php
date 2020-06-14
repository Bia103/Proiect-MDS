<!-- PHP ZONE! Don't touch it -->
<?php

$link = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];
$keywords = $_SESSION['keywords'];
$sql = "SELECT * FROM list NATURAL JOIN user WHERE username='$username'";
$result = mysqli_query($link, $sql) or die('Playlist Query failed: ' . mysql_error());

?> 



<!-- HTML ZONE -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Css/myPlaylist.css">
</head>

<body>
<header>
<?php include '../menu.php';?>
</header>
  <div id = "continut">
    <h2>Playlists:</h2>
    <form action="show_playlist.php" method = "POST">
      <div id = "tabelPlusButon">
      <table>
        <tr>
          <th>  </th>
          <th>Nume Playlist</th>
          <th>Nume User</th>
          <th>Dată Creare</th>
        </tr>

        <?php
          if(mysqli_num_rows($result) > 0)
          {
            while($row = mysqli_fetch_assoc($result))
              {
        ?>
        <tr>
          <th><input type = 'radio' name = 'list_id' value = "<?php echo $row["lid"]?>"></th>
          <input  name="user_name" type="hidden" value = "<?php echo $username?>">
          <th><?php echo $row["ltitle"]?></th>
          <th><?php echo $row["username"]?></th>
          <th><?php echo $row["lissuedate"]?></th>
        </tr>
            
        <?php
            }
        } 
        else 
        {
            echo "Niciun Rezultat Găsit :(";
        }?>
      </table>
          
      <div id = "linkuri">
        <input type = "submit"  name="list_select_button_2" value = "Selectează" class = "button">
        <a href="../Browser/search.php" >Înapoi la Pagina cu Rezultate</a>
      </div>
      </div>
    </form>
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
