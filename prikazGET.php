<html>
<body>
    <!-- uzima ono sto je u inputu koji nosi prosledjeni name u uglastim zagradama $_GET -->
    <!-- ako je get vide se podaci u url i moze da se bookmarkuje, ali se lakse preuzimaju podaci, ako je post nisu vidljivi i ne moze da se 
    bookmarkuje, get se koristi za javne ne toliko osetljive podatke kao npr ime i prezime, a post za poverljive, osetljive podatke -->
    <p>DOBRODOSLI <?php echo $_GET["ime"]; ?></p>
    <p>Vasa e-mail adresa je: <?php echo $_GET["email"]; ?></p>    
    <p>Rezultat je: 
    <?php
    //moze i preko if elseif else uslovi sa ili i ostalo standardno
        $a=$_GET["broj1"];
        $b=$_GET["broj2"];
        $c=$_GET["operacija"];
        switch($c){
            case "+":
            case "plus":
            case "sabiranje":
            case "saberi":
                $rez=$a+$b;
                break;
            case "-":
            case "minus":
            case "oduzimanje":
            case "oduzmi":
                $rez=$a-$b;
                break;
            case "*":
            case "puta":
            case "mnozenje":
            case "mnozi":
                $rez=$a*$b;
                break;
            case "/":
            case "podeljeno":
            case "deljenje":
            case "podeli":
                $rez=$a/$b;
                break;
            default:
                echo "Pogresan unos";
            
        }
        //ili echo na kraju ili posle svakog case ne mora da se uvodi rez promenljiva kada je echo ispod case
        echo $rez;

    ?>
    </p>
</body>

</html>