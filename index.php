<?php
    session_start();
    if (!isset($_SESSION["Logged"])) {
        header("Location: logowanie.php");
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="css/indexstyle.css">
</head>
<body>
    <div class="all">
        <form action="index.php" method="post">
            <input type="submit" name="wylogowanie" value="Wylogowanie" class="submit">
        </form>

    <ul class="buttons">
        <li><a href="O_nas.php">O nas</a></li>
        <li><a target="_blank" href="https://www.youtube.com/watch?v=EB-wxKVu788">Menu</a></li>
        <li><a href="Kontakt.php">Kontakt</a></li>  
    </ul>
    </div>
</body>
</html>
<?php

if(isset($_POST["wylogowanie"])) {
    session_unset();
    session_destroy();
    header("Location: logowanie.php");
}

?>