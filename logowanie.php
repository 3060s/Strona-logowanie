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
    <title>Logowanie</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="all">
        <form method="post">
            <h1>Zaloguj się</h1>
            <div class="txt_field">
                <input type="text" name="username" placeholder="Nazwa użytkownika"><br>
                <input type="password" name="password" placeholder="Hasło"><br><br>
            </div>
                <input type="submit" name="submit" value="Zaloguj" class="submit"><br><br><br>
            <div class="rejestracja">    
                <p>Nie posiadasz konta? <a href="rejestracja.php">Rejestracja</a></p>
            </div>    
        </form>
    </div>      
</body>
</html>

<?php

    

    if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $errflag = false;

        if(empty($username) || empty($password)) {
            echo 'Niepoprawne dane logowania';
            $errflag=true;
        }

        if($errflag == false) {


            $result = mysqli_query($conn, "select haslo from user where user = '$username'")
                        or die("Nie udało się połączyć z bazą danych");

                        if (mysqli_num_rows($result) > 0) {

                            if($row = mysqli_fetch_assoc($result)) {

                                if(password_verify($password, $row["haslo"])) {
                                    $_SESSION["Logged"] = true;
                                    header("Location: index.php");
                                }
                            } 
                            
                        }    
        }
            }

    mysqli_close($conn);

?>