<html>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "proiectmds";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM song WHERE count = (select max(count) from song);";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
for($i = 0; $i < $result->num_rows; $i++) 
	{
      $row = $result->fetch_assoc();
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
} else {
    echo "<h1>0 results</h1>";
}
$conn->close();
?>
<form action="dashboard.php" method="post">
<button name="subject" type="submit" value="search">Înapoi în Pagina Principală</button>
</form>
</body>
</html>
