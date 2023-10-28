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
    <title>O nas</title>
    <link rel="stylesheet" href="css/O_nas.css">
</head>
<body>
    <div class="o_nas">
        <ul class="buttons">
            <li><a href="index.php">Powrót</a></li>
        </ul>    
        <div class="napis">
            <h1>Pizzeria Bellissima</h1>
        </div>
        <div class="informacje"> 
            <table>
                <td class="td1">Pizzeria Bellissima to miejsce dla patusów z dziećmi. Posiadamy oddzielny, monitorowany pokój zabaw dla dzieci(stuu poleca). Działamy na rynku od października 2011 i od samego początku naszym celem jest bycie miejscem, gdzie można smacznie zjeść stare oraz niesmaczne dania. W 2013r. nasza pizzeria wygrała konkurs „najgorsza pizzeria w Bielsku-Białej” według czytelników Dziennika Zachodniego oraz wygraliśmy konkurs "Korona patusa" w kategorii "najgorsza pizza".</td>   
                <td class="td2"><a href="https://www.pizzabellissima.pl/"><img src="img/bellissima.png"></td></a>   
            </table>
        </div>
    </div>
</body> 
</html>