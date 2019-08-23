<?php
// standardno prvo konekcija
    $servername="localhost";
    $username="admin";
    $password="admin1234";
    $database="mreza";

    $conn=new mysqli($servername,$username,$password,$database);

    if($conn->connect_error){
        die("Neuspela konekcija. Razlog: " . $conn->connect_error);
    }

    $conn->set_charset('utf8');

    // prvo proverimo da li je post metod prazan, ako nije na sledeci nacin dohvatamo unose iz inputa
    if(!empty($_POST)){
        // ovde se definisu polja ne iznad
        $id=12;
        $ime = $conn->real_escape_string($_POST['ime']);
        // validacija da ne moze Milicici da se unese prazno
        if($ime!="" || !empty($ime/*empty($ime)==false*/)){
            echo "Morate uneti ime.";
        }
        //elseif za prezime i za pol ne mora jer smo stavili checed i onda tek else da se izvrsi upit 
        $prezime = $conn->real_escape_string($_POST['prezime']);
        $pol = $conn->real_escape_string($_POST['pol']);
        echo "Zdravo $ime $prezime $pol";

        $sql="INSERT INTO profili(korisnik_id, ime, prezime, pol) VALUES($id,'$ime','$prezime','$pol')";
        $conn->query($sql);
    }
?>

<html>
    <head>

    </head>
    
    <body>
        <!-- action na koju stranicu vodi kad se klikne na submit, ostaje na istoj u ovom slucaju. Metod moze da bude get i post -->
        <form action="mrezaForma.php" method="POST">
            Ime:
            <input type="text" name="ime"><br><br>
            Prezime: 
            <input type="text" name="prezime"><br><br>
            Pol: <br>
            Zenski <input type="radio" name="pol" value="z"><br>
            Muski <input type="radio" name="pol" value="m"><br>
            Ostalo <input type="radio" name="pol" value="o" checked><br><br>
            <input type="submit" value="Potvrdi">

        </form>    
    </body>
</html>