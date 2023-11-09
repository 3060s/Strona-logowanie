<?php
    ini_set('display_errors', 0);
    include("database.php");
    session_start();
    if (!isset($_SESSION["Logged"])) {
        header("Location: logowanie.php");
    }

    $sql = "SELECT * FROM `pizza`";
    $sql_query = mysqli_query($conn,$sql);

    $sql1 = "SELECT * FROM `zamowienie`";
    $sql_query1 = mysqli_query($conn,$sql1);

    $id = mysqli_real_escape_string($conn,$_POST['pizza']); 
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
                        <select name="pizza">
                            <?php 
                        while ($pizza = mysqli_fetch_array(
                                $sql_query,MYSQLI_ASSOC)):; 
                    ?>
                            <option value="<?php echo $pizza["id"];?>">
                                <?php echo $pizza["nazwa_pizzy"], " ", $pizza["cena_pizzy"], "zł";?>
                            </option>  
                    <?php 
                    endwhile; 
                    ?>  
                    </select>
                </div>


                <input type="number" name="ilosc" placeholder="Ilość" min="1" max="15"><br>
                <input type="text" name="imie" placeholder="Imie"><br>
                <input type="text" name="nazwisko" placeholder="Nazwisko"><br>
                <input type="tel" name="telefon" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" maxlength="9" placeholder="Numer telefonu (xxx-xxx-xxx)"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="text" name="miasto" placeholder="Miasto"><br>
                <input type="text" name="ulica" placeholder="Ulica"><br>
                <input type="text" name="nr_domu" placeholder="Numer domu/mieszkania"><br>               

            </div>
                <input type="submit" name="submit" value="Zamów" class="submit" onclick="alertfn()"><br><br><br>   
        </form>
    </div>      
</body>
</html>

<?php

    if(isset($_POST['submit'])){

        $ilosc =$_POST['ilosc'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $miasto = $_POST['miasto'];
        $ulica = $_POST['ulica'];
        $nr_domu = $_POST['nr_domu'];
        
        $errflag = false;



        if(empty($imie) || empty($nazwisko) || empty($telefon) || empty($email) || empty($miasto) || empty($ulica) || empty($nr_domu)) {
            //echo "<script>";
            //echo "alert('Złóż poprawnie zamówienie!');";
            //echo "</script>";
            echo '<script type="text/javascript">
                    alert("Hello, World!");
                  </script>';

            $errflag= true;
        }


        else {
            $errflag= false;

            $insert = "INSERT INTO zamowienie (id_pizza, ilosc, imie, nazwisko, nr_tel, email, miasto, ulica, nr_domu)
                       VALUES ('$id', '$ilosc', '$imie', '$nazwisko', '$telefon', '$email', '$miasto', '$ulica', '$nr_domu')";
            mysqli_query($conn, $insert);
            
        }
        mysqli_close($conn);
    } //dodac cena finalna decimal(10,2) do bazy danych
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>