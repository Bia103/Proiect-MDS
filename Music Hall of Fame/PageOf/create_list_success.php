<!-- PHP ZONE! Don't touch it -->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Css/createListSuccess.css">
    </head>
    <body>
        <div id = "continut">
            <!-- PHP ZONE! Don't touch it -->
            <?php

            $con = @mysqli_connect('localhost', 'root','root','proiectmds')
                or die('Nu s-a putut efectua conectarea la baza de date. Eroare: ' . mysql_error());
            session_start();

            $username = $_SESSION['username'];
            if(isset($_POST['confirm_create']) and !empty($_POST['list_title']))
            {
                $list_title = $_POST['list_title'];
                $yes = $_POST['yes'];
                echo "Playlist creat cu Succes! Caută din nou melodia și pune-o în noul tău playlist. :)";
                $result = mysqli_query($con, "INSERT INTO `list` (username, ltitle, lissuedate, ispublic) VALUES ('$username','$list_title', CURDATE(), $yes);");
            }
            else
            {
                echo "Introdu Titlul Playlist-ului, te rog!";
            }

            ?>


            <div id = "linkuri">
                <!-- <br></br> -->
                <a href="../Browser/search.php" >Pagina cu Rezultate</a>
                <!-- <br><br> -->
                <a href="../dashboard.php" >Pagina Principală</a>
                <!-- <br><br> -->
                <a href="create_new_list.php" >Pagina de Creare Playlist</a>
            </div>
        </div>
    </body>
</html>
