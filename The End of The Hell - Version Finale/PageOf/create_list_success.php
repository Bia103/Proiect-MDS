<!-- PHP ZONE! Don't touch it -->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Css/createListSuccess.css">
    </head>
    <body onload="redirect()">

<script>
		function redirect() 
		{
			setTimeout(function(){window.location.replace("../PageOf/create_new_list.php");}, 4000);	
		}
	
	</script>
	
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
                echo "Playlist creat cu Succes! Caută din nou Melodia și pune-o în noul tău playlist. :)";
                $result = mysqli_query($con, "INSERT INTO `list` (username, ltitle, lissuedate, ispublic) VALUES ('$username','$list_title', CURDATE(), $yes);");
            }
            else
            {
                echo "Introdu Titlul Playlist-ului, te rog!";
            }

            ?>

            </div>
        </div>
    </body>
</html>