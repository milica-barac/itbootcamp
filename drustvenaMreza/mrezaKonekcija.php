<?php
    // Konekcija sa bazom(parametri na osnovu kojih se konektujemo)
    $servername = "localhost";
    // nad jednom bazom moze da ima pristup vise korisnika, ali nemaju iste privilegije (sta ko moze da radi)
    $username = "admin";
    // u ovom slucaju napravili smo korisnika (admina) koji ima sve privilegije
    $password = "admin1234";
    $database = "mreza";
    
    //BITNO
    // ponekad se javlja greska ako ne stavimo da je $conn globalna promenljiva, sledeca linija resava gresku
    // ako se desi takva greska dodajte global pa ime promenljive u tom fajlu koji ukljucujemo u druge stranice
    global $conn;

    // parametre prosledjujemo da bi napravili konekciju kroz konstruktor mysqli()
    // mozemo da pravimo vise konekcija, sa razlicitim korisnicima
    $conn = new mysqli($servername, $username, $password, $database);

    // proveravamo da li se dobro konektovala, odnosno da li je uspesno izvrsena konekcija, ako dodje do problema kazemo konekciji da umre :D
    if($conn->connect_error){
        die("Neuspela konekcija! Razlog: " . $conn->connect_error);
    }

    //  mora i ovde zbog slova
    $conn->set_charset('utf8');


?>