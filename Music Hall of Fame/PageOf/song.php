<!-- PHP ZONE! Don't touch it -->
<?php

    $con = @mysqli_connect('localhost', 'root','','proiectmds')
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
<head>
	<title>Song</title>
    <link rel="stylesheet" type="text/css" href="../Css/song.css">
</head>
<body>
    <div id = "continut">
        <h1>Titlu melodie<?php echo $song_title?></h1>
        <p style="font-size:20px"><?php echo "$song_artist   "?></p>
        
        <?php
            echo "<audio controls='controls'>";
        echo "<source src='$song_link'  />";
        echo "</audio>";
        
        ?>
        
        <iframe src="https://giphy.com/embed/xT0GqFbzOCXeXoqc24" width="240" height="240" allowFullScreen id = "gif"></iframe>
        <div id = "linkuri">    
            <form action="mylist.php" method = "POST">
                <input  name="song_id" type="hidden" value = "<?php echo $song_id?>">
                <input  name="song_title" type="hidden" value = "<?php echo $song_title?>">
                <input type = "submit"  name="list_button" value = "Adăugare la Playlist" id = "button">
            </form>
            <a href="search.php" >Pagina cu Rezultate</a>
            <a href="dashboard.php" >Pagina Principală</a>
        </div>
    </div>
</body>


<!-- PHP ZONE! Don't touch it -->
<?php

    //Închidere Conexiune
    mysqli_close($con);

?>
