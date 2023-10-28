<?php
    include("database.php");
    session_start();
    if (isset($_SESSION["Logged"])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="all">
        <form method="post">
            <h1>Zarejestruj się</h1>
            <div class="txt_field">
                <input type="text" name="username" placeholder="Nazwa użytkownika"><br>
                <input type="password" name="password" placeholder="Hasło"><br><br>
            </div>
                <input type="submit" name="submit" value="Rejestracja" class="submit"><br><br><br>
            <div class="rejestracja">
                <p>Posiadasz konto? <a href="logowanie.php">Logowanie</a></p>
            </div>    
        </form>    
    </div>        
</body>
</html>
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username)){
            echo "Podaj nazwę użytkownika!";
        }

        elseif(empty($password)){
            echo "Podaj hasło!";
        }

        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (user, haslo)
                    VALUES ('$username', '$hash')";
            mysqli_query($conn, $sql);
            echo "Konto zostało utworzone";
            header("Location: logowanie.php");        
        }

    }
    
    mysqli_close($conn);

?>