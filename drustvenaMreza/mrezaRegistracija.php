<?php
    // konekcija ka bazi
    //UKLJUCIVANJE FAJLA KONEKCIJE 
    require_once 'mrezaKonekcija.php';
    
    // uredjivanje da error pokazuje iznad unutar diva ZAVRSI!!!
    $error="";

    // provera da li se na stranicu doslo post metodom
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        // u zagradama pisemo name iz inputa, a real_escape priprema za sql upit
        $username = $conn->real_escape_string($_POST['username']);
        $pass = $conn->real_escape_string($_POST['pass']);
        $rePass = $conn->real_escape_string($_POST['rePass']);
        // kroz sledeci upit se proverava da li u bazi postoji username koji se zove kao prosledjeni od korisnika putem inputa, username je string, tako da '$user' mora da bude pod navodnicima
        
        if(empty($username)||empty($pass)||empty($rePass)){
            $error="Morate popuniti sva polja";
        }else{
            $sql= "SELECT username FROM korisnici WHERE username = '$username'";
            $result = $conn->query($sql);
            
            if($result->num_rows == 0){
                if($pass == $rePass){
                    $pass = md5($pass);
                    $sql= "INSERT INTO korisnici(username, pass) VALUES ('$username', '$pass')";
                    $result = $conn->query($sql);
                    header('Location: mrezaLogin.php');
                }else{
                    $error="Lose ponovljen password";
                }
            }else{
                $error="Username vec postoji u bazi";
            }
        }
    }   

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="sredjivanjePhpSqlListeTabele.css">
    </head>
    <body background="q.jpg">
        
        <div class="signup">
        <form action="mrezaRegistracija.php" method="POST">
            <span><?php echo $error?></span><br><br>
            <label for="username">Username: </label>
            <input type="text" name="username" value="">
            <br><br>

            <label for="pass">Password: </label>
            <input type="password" name="pass" value="">
            <br><br>

            <label for="rePass">Repeat Password: </label>
            <input type="password" name="rePass" value="">
            <br><br>

            <input type="submit" value="Register">
        </form>
        </div>
        
    </body>
</html>