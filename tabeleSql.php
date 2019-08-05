<?php
    // server uvek localhost bar za sada
    $servername="localhost";
    // napraviti korisnika koji ima privilegije nad bazom u privileges check all
    $username = "admin";
    // bolji password, ima sve privilegije
    $password = "admin123";
    // ime baze kojoj zelimo da pristupimo
    $database = "ambulanta";

    // konekcija se vrsi preko ugradjene funkcije mysqli_connect i prosledjujemo sva cetiri parametra
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // provera da li je konekcija sa bazom uspesno izvrsena
    if(!$conn){
        // mysqli_connect_error je funkcija koja vraca razlog zbog koga konekcija nije izvrsena
        die("Neuspela konekcija. Razlog: " . mysqli_connect_error());
        // drugi nacin da se napise if je sa tri echo i kada imamo else granu, ovo je lakse i krace
    }
    // da bi mogli da stavljamo specijalna slova sa kukicama latinica
    mysqli_set_charset($conn, "utf8");
    // treba i u bazi da se promeni operations collation ili utf-16 ili utf-8 da bi radilo

    /*
    // jedan upit - query 
    $sql = "INSERT INTO pacijenti VALUES(10, 'Pera', 'Perić', 189, 88, 1983);";
    
    // ne mora uslov da je razlicito od false, radi i bez toga, a funkcija vraca true ili false
    if(mysqli_query($conn, $sql)!=FALSE){
        // ako query prodje treba da ispise da je uspesno, ali nas ne zanima sta smo dodali, jer nije select, bitno da se upise u bazu
        echo "Uspesno dodavanje reda u tabelu!";
    }else{
        echo "Desila se greska: ";
        echo mysqli_error($conn);
    }

    echo "Uspesna konekcija! :) ";
    */
    // mora tacka zarez kada je vise upita, prvi je za zavrsetak upita u sql, odnosno razdvajanje vise upita
    $sql = "INSERT INTO pacijenti VALUES(10, 'Marica', 'Mikić', 166, 55, 1989);";
    // za nadovezivanje .=, nikako = jer se onda prethodni upit pregazi, a sa tackom i jednako se nadoveze samo na prethodni i vrsi se izvrsenje oba
    $sql .= "INSERT INTO pacijenti VALUES(11, 'Perica', 'Antić', 169, 75, 2001);";
    $result = mysqli_multi_query($conn, $sql);
    if($result){
        echo "Uspesno dodati redovi";
    }else{
        echo "Desila se greska: ";
        echo mysqli_error($conn);
    }
?>