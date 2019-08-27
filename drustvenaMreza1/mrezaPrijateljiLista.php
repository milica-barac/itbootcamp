<?php
    require_once 'mrezaHeader.php';

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

    <!-- OVDE NE OTVARAMO HTML I BODY TAG, JER SMO NA POCETKU UVEZLI, ODNOSNO PROSLEDILI hrezaHeader.php file u kome SU OTVORENI HTML I BODY TAG, A NISU ZATVORENI -->
        
        <?php
            //Prikazi sve korisnike koji nisu ja(glupo da dodamo sebe za prijatelja)
            // Kolonama stavljamo alias AS jer posle koristimo u $red uglastim zagradama, elegantnije
            // moramo da koristimo join, jer nam nije dovoljna informacija da prikazemo samo korisnicko ime(fica123), nego i dodatne informacije iz profila ime, prezime, sve sto nam treba...da bi znali koga da dodamo, obrisemo
            // imena tabela ako su dugacka, mozemo da stavimo neki alias
            // moramo da kazemo preko cega su povezane kolone koje JOINujemo, preko ON
            // sortiramo prvo po imenu, ako ima isto ime, onda po prezimenu
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
            $result = $conn->query($sql);//linija izvrsavanja upita
            // var_dump($result); kako iygleda objekat, ne iteresuje nas, ali tu se cuva num_rows koji nas interesuje, koristi pazljivo samo za proveru, da vidis da li lepo vraca, tipa za num_rows
            if(!$result){ //da li ima greske u sql upitu
                echo "<p>Greska! Razlog: ";
                echo $conn->error;
                echo "</p>";

            }else{ //upit je dobar, moze da se izvrsi
                // ali moze da vrati praznu tabelu, pa treba i to proveriti
                if($result->num_rows == 0){
                    // ako nema korisnika ili ima samo jednog u bazi, a to sam ja
                    echo "<p>Nemate nijednog korisnika u mrezi. :( </p>";
                }else{//IMAMO KORISNIKE
                    //Mozemo celu html strukturu da formiramo
                    echo "<p>Korisnici: </p>";
                    echo "<ul>";
                    //dohvatanje reda, dohvata prvi red i kad ponovo dodje u while precutno prebaci na sledeci
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
                        
                        $pid = $red["id"];//prijatelj id smestamo u promenljivu, kako se izvuce id iz upita, ispita u kakvoj sam vezi sa korisnikom
                        //da li ima relacije u bazi prijatelji i kakva je veza, postoji tri mogucnosti da pratimo nekog, da nas neko prati i uzajamno pracenje

                        $sql1="SELECT * FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
                        $result1 = $conn->query($sql1);//izvrsavanje upita
                        //upit sql1 da li smo mi poslali zahtev korisniku, da li mi pratimo nekog
                        $jatebe = $result1->num_rows; // 0 ili 1 vraca

                        $sql2 = "SELECT * FROM prijatelji WHERE korisnik_id = $pid AND prijatelj_id = $id";
                        $result2 = $conn->query($sql2);//izvrsavanje 2 upita
                        //upit sql2 da li korisnik nas prati
                        $timene = $result2->num_rows;
                        // ako je strogo vece od 1 onda je obostrano pracenje jer ce onda da vrati i za jatebe i za timene po 1, a strogo vece od jedan je 2
                        if($jatebe + $timene > 1){
                            echo " uzajamni prijatelji ";
                            // pita da li je jatebe razlicito od nule
                        }elseif($jatebe){
                            echo " pratim korisnika ";
                            //da li timene razlicito od nule
                        }elseif($timene){
                            echo " korisnik prati mene ";
                        }else{
                            //obicno ne pise, i jatebe i timene su nule
                            echo " niko nikog ne prati ";
                        }

                        if($jatebe){
                            echo " <a href='mrezaBrisi.php?brisi=$pid'>Otprati korisnika</a>";
                        }else{
                            echo "<a href='mrezaDodaj.php?dodaj=$pid'>Prati korisnika</a>";
                        }

                        echo "</li>";
                    }
                    echo "</ul>";
                }
            }
        ?>    
    </body>
    
</html>