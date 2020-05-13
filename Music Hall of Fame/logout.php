<!-- PHP ZONE! Don't touch it -->
<?php

session_start();
session_destroy();
header("Location: index.php");
exit();

?>