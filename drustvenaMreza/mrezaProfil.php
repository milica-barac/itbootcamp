<?php

// Kreirati novi script dm_profil.php kojem se preko GET metode
// prosleđuje parametar id. Potrebno je na ovoj stranici prikazati meni
// (obavezno uključivanjem fajla dm_header.php), a ispod menija
// prikazati profil korisnika sa zadatim id-jem. Ukoliko se prosledi id
// korisnika koji ne postoji u bazi, ispisati odgovarajuću poruku u
// paragrafu, veličina fonta 24px i u italic stilu.
    

    require_once 'mrezaHeader.php';

    if(!empty($_GET['id'])){
        $pid = $conn->real_escape_string($_GET['id']);
        
        $sql = "SELECT korisnici.username, profili.ime, profili.prezime, profili.pol, profili.bio  FROM korisnici INNER JOIN profili ON korisnici.id=profili.korisnik_id WHERE korisnik_id=$pid";
        
        $result = $conn->query($sql);//izvrsavanje upita
        
        if(!$result){
            echo "Greska pri izvrsavanju upita. Razlog: " . $conn->error;
        }else{
            if($result->num_rows==0){
                echo "<p style = 'font-style: italic; font-size: 24px;'>Odgovarajuca poruka</p>";
            }else{
                $red=$result->fetch_assoc();        
                $ime=$red['ime'];
                $prezime=$red['prezime'];
                $korisnicko=$red['username'];
                $pol=$red['pol'];
                $bio=$red['bio'];
            
            if($pol=="m"){
            echo "<p>Profil</p>";
            echo "<table border='1'><tr><td>Ime</td><td style='color:blue'>$ime</td></tr>
            <tr><td>Prezime</td><td style='color:blue'>$prezime</td></tr>
            <tr><td>Kosisnicko ime</td><td style='color:blue'>$korisnicko</td></tr>
            <tr><td>Pol</td><td style='color:blue'>$pol</td></tr>
            <tr><td>Biografija</td><td style='color:blue'>$bio</td></tr>
            </table>";
            }elseif($pol=="z"){
            echo "<p>Profil</p>";
            echo "<table border='1'><tr><td>Ime</td><td style='color:pink'>$ime</td></tr>
            <tr><td>Prezime</td><td style='color:pink'>$prezime</td></tr>
            <tr><td>Kosisnicko ime</td><td style='color:pink'>$korisnicko</td></tr>
            <tr><td>Pol</td><td style='color:pink'>$pol</td></tr>
            <tr><td>Biografija</td><td style='color:pink'>$bio</td></tr>
            </table>";
            }else{
            echo "<p>Profil</p>";
            echo "<table border='1'><tr><td>Ime</td><td style='color:grey'>$ime</td></tr>
            <tr><td>Prezime</td><td style='color:grey'>$prezime</td></tr>
            <tr><td>Kosisnicko ime</td><td style='color:grey'>$korisnicko</td></tr>
            <tr><td>Pol</td><td style='color:grey'>$pol</td></tr>
            <tr><td>Biografija</td><td style='color:grey'>$bio</td></tr>
            </table>";
            }
        }
    }
}

?>