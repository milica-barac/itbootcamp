<?php

    // Konekcija sa bazom(parametri na osnovu kojih se konektujemo)
    $servername = "localhost";
    $username = "admin";
    $password = "admin1234";
    $database = "mreza";

    // parametre prosledjujemo da bi napravili konekciju
    $conn = new mysqli($servername, $username, $password, $database);

    // proveravamo da li se dobro konektovala, odnosno da li je uspesno izvrsena konekcija, ako dodje do problema kazemo konekciji da umre :D
    if($conn->connect_error){
        die("Neuspela konekcija! Razlog: " . $conn->connect_error);
    }

    //  mora i ovde zbog slova
    $conn->set_charset('utf8');

    // Podesavanje id logovanog korisnika
    $id=2; //ovde se posle menja kada sacuvamo u sesiji, za sada unosimo rucno, za testiranje se vracamo na ovu liniju!
    // ovo sam ja

    // Ako se salje zahtev za pracenje korisnika
    // if(isset($_GET['id'])) {...} sve dozvoljeno osim null
    // if(!empty($_GET['id'])) {...} da nije null, nula, prazan string i da nije flase
    // sve jedno za sta se opredelimo oba rade sa ida
    if(!empty($_GET['id'])){
        // treba da se pripremi deo za sql upit kroz real_escape_string
        $pid= $conn->real_escape_string($_GET['id']);
        // Kad god se dohvata vrednost iz GET ili POST treba da se pozove real_escape_string

        //$id - logovan korisnik koji salje zahtev
        //$pid - korisnik kojem se salje zahtev
        //Provera nema li vec prijateljstva
        $sql = "SELECT * FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
        // linija koja izvrsava upit
        $result = $conn->query($sql);
        // ako nema ovakvog reda u tabeli, tek tad mozemo da ubacimo, ako vec ne postoji prijateljstvo stvaramo prijateljstvo, odnosno upisujemo u tabelu prijatelji u bazi novo prijateljstvo
        if($result->num_rows==0){
            $sql1="INSERT INTO prijatelji(korisnik_id, prijatelj_id) VALUE ($id, $pid)";
            $conn->query($sql1);
        }
    }
?>

<html>
    <head>
    </head>
    
    <body>
        <?php
            //Prikazi sve korisnike koji nisu ja
            // stavljamo alias AS jer posle koristimo u red uglastim zagradama, elegantnije
            $sql = "SELECT k.id AS id,
                k.username AS username, 
                p.ime AS ime, 
                p.prezime AS prezime, 
                p.pol AS pol 
            FROM korisnici AS k 
            INNER JOIN profili AS p 
            ON k.id=p.korisnik_id 
            WHERE k.id != $id 
            ORDER BY p.ime, p.prezime";

            // jedan upit query, vise upita multiquery
            $result = $conn->query($sql);
            if(!$result){
                echo "<p>Greska! Razlog: ";
                echo $conn->error;
                echo "</p>";

            }else{
                if($result->num_rows == 0){
                    echo "<p>Nemate nijednog korisnika u mrezi. :( </p>";
                }else{
                    echo "<p>Korisnici: </p>";
                    echo "<ul>";
                    while($red=$result->fetch_assoc()){
                        echo "<li>";
                        echo $red["ime"];
                        echo " ";
                        echo $red["prezime"];
                        echo " (";
                        // key sensitive ako je z i m malo u bazi mora i ovde
                        if($red["pol"]=="z"){
                            echo "<span style='color:red'>";
                            echo $red["username"];
                            echo "</span>";
                        }elseif($red["pol"]=="m"){
                            echo "<span style='color:blue'>";
                            echo $red["username"];
                            echo "</span>";
                        }
                        echo ")";
                        
                        $pid = $red["id"];
                        $sql1="SELECT * FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
                        $result1 = $conn->query($sql1);
                        $jatebe = $result1->num_rows; // 0 ili 1 vraca

                        $sql2 = "SELECT * FROM prijatelji WHERE korisnik_id = $pid AND prijatelj_id = $id";
                        $result2 = $conn->query($sql2);
                        $timene = $result2->num_rows;
                        // ako je strogo vece od 1 onda je obostrano jer ce onda da vrati i za jatebe i za timene po 1 
                        if($jatebe + $timene > 1){
                            echo " uzajamni prijatelji ";
                            // pita da li je jatebe razlicito od nule
                        }elseif($jatebe){
                            echo " pratim korisnika ";
                        }elseif($timene){
                            echo " korisnik prati mene ";
                        }else{
                            echo " niko nikog ne prati ";
                        }

                        echo "<a href='mrezaPrijatelji.php?id=$pid'>Prati korisnika</a>";
                        echo "</li>";
                    }
                    echo "</ul>";
                }
            }
        ?>    
    </body>
    
</html>