<?php
    session_start();

    // standardno prvo konekcija   
    require_once 'mrezaKonekcija.php';

    
    // prvo proverimo da li je post metod prazan, ako nije na sledeci nacin dohvatamo unose iz inputa
    if(!empty($_POST)){
        // ovde se definisu polja ne iznad
        $id=12;
        $ime = $conn->real_escape_string($_POST['ime']);
        // validacija da ne moze Milicici da se unese prazno
        if($ime!="" || !empty($ime/*empty($ime)==false*/)){
            echo "Morate uneti ime.";
        }
        //elseif za prezime i za pol ne mora jer smo stavili checked i onda tek else da se izvrsi upit 
        $prezime = $conn->real_escape_string($_POST['prezime']);
        $pol = $conn->real_escape_string($_POST['pol']);
        echo "Zdravo $ime $prezime $pol";

        $sql="INSERT INTO profili(korisnik_id, ime, prezime, pol) VALUES($id,'$ime','$prezime','$pol')";
        $conn->query($sql);
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="sredjivanjePhpSqlListeTabele.css">
    </head>
    
    <body>

        <ul class="navBar">
            <li><a href='index.php'>Home</a></li>
            <!-- <li><a href='mrezaPrijateljiLista.php'>Prijatelji</a></li> -->
            <li><a href='mrezaPrijateljiTabela.php'>Friends</a></li>
            <li><a href='mrezaForma.php'>Edit</a></li>
            <li><a href='mrezaLogout.php'>Logout</a></li>
        </ul>
        <br><br>

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