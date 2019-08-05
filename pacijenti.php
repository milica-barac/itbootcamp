<html>
    <head>
        <link rel="stylesheet" type="text/css" href="sredjivanjePhpSqlListeTabele.css">
    </head>
<body>
<?php
    $servername="localhost";
    $username = "admin";
    $password = "admin123";
    //pazi koju bazu pises
    $database = "ambulanta";

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // ako je neuspela konekcija neka umre :D
    if(!$conn){
        die("Neuspela konekcija. Razlog: " . mysqli_connect_error());
    }

    mysqli_set_charset($conn, "utf8");

    // jedna komanda pa nije neophodna jos jedna tacka zarez
    $sql = "SELECT ime, prezime, visina, tezina, god_rodjenja FROM pacijenti";

    $result = mysqli_query($conn, $sql);
    // vraca niz, i to kao asocijativni, ako stavimo select * sve kolone su kljucevi
    
    // prvo mora da se proveri da li je upit uspesno izvrsen, da li trazimo u pravoj bazi, ako trazimo da nam ispise iz tabele pacijenti, a gore smo selektovali bazu videoteka onda odlazi na else granu i vraca echo upit nije uspesno izvrsen
    if($result !=false){

    // Prvo mora da se proveri DA LI POSTOJE REDOVI U TABELI, jer ne moze da ispise ako je tabela prazna, prosledjuje se rezultat da bi se proverilo - mysqli_num_rows vraca broj redova koji zadovoljavaju uslov
    if(mysqli_num_rows($result)==0){
        echo "Pacijenti ne postoje u bazi";
    }else{
        // upisujemo i prikazujemo kroz listu
        
        echo "<table border=1>";
        // echo "<ul>";
        
        // funkcija koja se zove kao da sama ima iterator koji sama povecava, pri svakom izvrsenju, odnosno pozivu, ne moramo mi da ga povecavamo kroz petlju
        $red=mysqli_fetch_assoc($result);
        // ne moze klasicno da se pristupa kao sa obicnim nizovima, nego preko funkcije mysqli_fetch_assoc koja sama povecava iterator
        echo "<tr><th>Ime</th><th>Prezime</th><th>Visna</th><th>Tezina</th><th>Godiste</th></tr>";
        while($red!=false){
            // Red pisemo u listu

            // echo "<li>";
            echo "<tr>";

            echo "<td>" . $red["ime"] . "</td><td>" . $red["prezime"] . "</td>";
            echo "<td>" . $red["visina"] . "</td><td>" . $red["tezina"] . "</td><td>" . $red["god_rodjenja"] . "</td>";
            
            echo "</tr>";
            // echo "</li>";
            
            // pa dohvatimo novi red
            //pozivamo sve dok ima redova
            $red=mysqli_fetch_assoc($result);//fetch dohvatiti, assoc - kao asocijativni niz

            }
            
            echo "</table>";
            // echo "</ul>";

        }
            
    }else{
        echo "Upit nije uspesno izvrsen.";
    }
?>
</body>
</html>