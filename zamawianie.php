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
    <title>Zamawianie</title>
    <link rel="stylesheet" href="css/zamawianie.css">
</head>
<body>
    <div class="all">
        <form method="post">
            <h1>Zamów pizze</h1>
            <div class="txt_field">
                <div class="dropdown">
                    <label>Wybierz pizze: </label>
                    <select name="Category">
                        <option>123</option>
                        <option>1412412</option>
                        <option>1421423</option>
                        <option>321</option>
                    </select>
                </div>
                <input type="password" name="password" placeholder="Hasło"><br><br>
            </div>
                <input type="submit" name="submit" value="Zamów" class="submit"><br><br><br>   
        </form>
    </div>      
</body>
</html>