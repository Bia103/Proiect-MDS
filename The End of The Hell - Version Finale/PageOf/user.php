<!-- PHP ZONE! Don't touch it -->
<?php

$con = @mysqli_connect('localhost', 'root','root','proiectmds')
    or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
session_start();

$username = $_SESSION['username'];

if(isset($_POST['user_select_button_2']))
{
    $user_name2 = $_POST['user_name2'];
}

$result = mysqli_query($con, "SELECT * FROM list WHERE username = '$user_name2' and ispublic = 1");

?>



<!-- HTML ZONE -->
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../Css/user.css">
</head>

<header>
<?php include '../menu.php';?>
</header>

<body>
  <div id = "continut">
  <h2> <?php echo "$user_name2"; ?></h2>
  <h3>Playlist-uri</h3>
  <form action="list.php" method = "POST">

  <?php
  if(mysqli_num_rows($result) > 0)
  {
  ?>

      <table>
      <tr>
        <th>  </th>
        <th>Nume Playlist</th>
        <th>Dată Creare</th>
      </tr>
      
  <?php
      $i = 0;
      while($row = mysqli_fetch_assoc($result))
      {
  ?>

        <tr>
        <th><input type = 'radio' name = 'list_id' value = "<?php echo $row["lid"]?>"></th>
              <input  name="user_name" type="hidden" value = "<?php echo $username?>">
              <th><?php echo $row["ltitle"]?></th>
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
      
      <br></br>
      <input type = "submit"  name="list_select_button_2" value = "Selectează" class = "button">
      <br></br>
      
  </form>



  <form action="follow_success.php" method = "POST">
      <input  name="user_name" type="hidden" value = "<?php echo $username?>">
      <input  name="user_name2" type="hidden" value = "<?php echo $user_name2?>">
      <input type = "submit"  name="follow_button" value = "Follow" class = "button">
  </form>
	<br>
  <a href="../Browser/search.php" >Înapoi la Pagina cu Rezultate</a>
  <div>
</body>

</html>



<!-- PHP ZONE! Don't touch it -->
<?php

//Închidere Conexiune
mysqli_close($link);

?>