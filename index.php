<?php
    session_start();
    if (!isset($_SESSION["Logged"])) {
        header("Location: logowanie.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="post">
        <input type="submit" name="wylogowanie" value="wylogowanie">
    </form>
</body>
</html>
<?php
    if(isset($_POST["wylogowanie"])) {
        session_unset();
        session_destroy();
        header("Location: logowanie.php");
    }
?>