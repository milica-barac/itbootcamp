<html>
    <head>
        <link rel="stylesheet" type="text/css" href="sredjivanjePhpSqlListeTabele.css">
    </head>
<body>
<?php
    $servername="localhost";
    // $username = "admin";
    $username = "root";
    // $password = "admin123";
    $password = "";
    //pazi koju bazu pises
    $database = "ambulanta";

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // ako je neuspela konekcija neka umre :D
    if(!$conn){
        // ova linija zaustavlja svako izvrsenje daljeg koda, ukoliko konekcija nije dobra, zato mora u tom slucaju da se obezbedi zatvaranje body i html tag
        die("Neuspela konekcija. Razlog: " . mysqli_connect_error() . "</body></html>");
    }

    mysqli_set_charset($conn, "utf8");

    // jedna komanda pa nije neophodna jos jedna tacka zarez
    $sql = "SELECT ime, prezime, visina, tezina, god_rodjenja FROM pacijenti";

    // ako imamo i listu i tabelu mora da se resetuje result sledecom linijom, da bi radilo
    $result = mysqli_query($conn, $sql);
    // vraca niz, i to kao asocijativni, ako stavimo select * sve kolone su kljucevi
    
    // prvo mora da se proveri da li je upit uspesno izvrsen, da li trazimo u pravoj bazi, ako trazimo da nam ispise iz tabele pacijenti, a gore smo selektovali bazu videoteka onda odlazi na else granu i vraca echo upit nije uspesno izvrsen
    if($result !=false){

    // Prvo mora da se proveri DA LI POSTOJE REDOVI U TABELI, jer ne moze da ispise ako je tabela prazna, prosledjuje se rezultat da bi se proverilo - mysqli_num_rows vraca broj redova koji zadovoljavaju uslov
    // stampanje tabele
    if(mysqli_num_rows($result)==0){
        echo "Pacijenti ne postoje u bazi";
    }else{
        // upisujemo i prikazujemo kroz listu
        
        echo "<table class='pac'>";
        // echo "<ul>";
        
        // funkcija koja se zove kao da sama ima iterator koji sama povecava, pri svakom izvrsenju, odnosno pozivu, ne moramo mi da ga povecavamo kroz petlju
        $red=mysqli_fetch_assoc($result);//moze i samo ovo da se napise u while, ali onda se brise ovde, a ono sto pise u while sad, to se brise i ne stavlja se nigde taj uslov
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

            }//end-while
            
            echo "</table>";
            // echo "</ul>";

        }
            
    }else{
        echo "Upit nije uspesno izvrsen.";
    }

    // svi pacijenti sa prezimenom petrovic
    $sql = "SELECT ime, prezime, visina, tezina, god_rodjenja FROM pacijenti WHERE prezime='Petrovic'";

    $result = mysqli_query($conn, $sql);
   
    if($result !=false){

    // stampanje tabele
    if(mysqli_num_rows($result)==0){
        echo "Pacijenti ne postoje u bazi";
    }else{
        
        echo "<table class='pac'>";
        
        $red=mysqli_fetch_assoc($result);
        echo "<tr><th>Ime</th><th>Prezime</th><th>Visna</th><th>Tezina</th><th>Godiste</th></tr>";
        while($red!=false){

            echo "<tr>";

            echo "<td>" . $red["ime"] . "</td><td>" . $red["prezime"] . "</td>";
            echo "<td>" . $red["visina"] . "</td><td>" . $red["tezina"] . "</td><td>" . $red["god_rodjenja"] . "</td>";
            
            echo "</tr>";

            $red=mysqli_fetch_assoc($result);

            }//end-while
            
            echo "</table>";


        }
    }

    // odrediti sva razlicita prezimena u bazi i ispisati pacijente sa datim prezimenima
    $sql = "SELECT DISTINCT prezime FROM pacijenti ORDER BY prezime";
    $result = mysqli_query($conn, $sql);
    while($red=mysqli_fetch_assoc($result)){
        $prezime = $red["prezime"];
        echo "Pacijenti cije prezime $prezime: ";
        $sql1 = "SELECT * FROM pacijenti WHERE prezime = '$prezime' ORDER BY ime";
        $result1 = mysqli_query($conn, $sql1);//izvrsavanje upita
        
        echo "<table class='pac'>";
    
        echo "<tr><th>Ime</th><th>Prezime</th><th>Visna</th><th>Tezina</th><th>Godiste</th></tr>";
        while($red=mysqli_fetch_assoc($result1)){

            echo "<tr>";

            echo "<td>" . $red["ime"] . "</td><td>" . $red["prezime"] . "</td>";
            echo "<td>" . $red["visina"] . "</td><td>" . $red["tezina"] . "</td><td>" . $red["god_rodjenja"] . "</td>";
            
            echo "</tr>";

            $red=mysqli_fetch_assoc($result1);

            }//end-while
            
            echo "</table>";

    }


?>
</body>
</html>