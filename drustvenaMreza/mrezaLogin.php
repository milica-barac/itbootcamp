<!-- s obzirom da prosledjujemo na istu stranicu post metodom u html delu, logiku pisemo iznad html dela, jer treba -->
<!-- kucanje url podrazumeva da ste na stranicu dosli get metodom -->
<?php
    // OTVARANJE SESIJE UVEK NA POCETKU SCRIPTA ILI BAR PRE OTVORENOG HTML TAGA
    session_start();
    // konekcija ka bazi
    //UKLJUCIVANJE FAJLA KONEKCIJE 
    require_once 'mrezaKonekcija.php';
    /* 4 nacina da se ukljuci fajl:
    - include - ukljucuje fajl(nastavlja ako fajl ne postoji)ignorise gresku
    - require - ukljucuje fajl(prekida izvrsenje ako fajl ne postoji)prijavljuje gresku
    - include_once -II- + ako je vec ukljucen ne ukljucuje ga-ignosrise slucajno ukljucivanje
    - require_once - isto + ako je vec ukljucen, ne ukljucuje ga(samo jednom ukljucuje)
     */
    // prvi put kad se dodje na stranicu ova logika se preskace, a posle kada se submituje na formu i onda se aktivira ova logika post metode(jedini nacin da se dodje na stranicu post metodom)
    // provera da li se na stranicu doslo post metodom

    // uredjivanje da error pokazuje iznad unutar diva ZAVRSI!!!
    $error="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        // u zagradama pisemo name iz inputa, a real_escape priprema za sql upit
        $user = $conn->real_escape_string($_POST['user']);
        $pass = $conn->real_escape_string($_POST['pass']);
        // kroz sledeci upit se proverava da li u bazi postoji username koji se zove kao prosledjeni od korisnika putem inputa, username je string, tako da '$user' mora da bude pod navodnicima
        $sql="SELECT * FROM korisnici WHERE username='$user'";
        // izvrsavanje upita
        $result=$conn->query($sql);
        // da li je dobar upit
        if(!$result){
            echo "Upit nije dobar";
        }else{
            // ako je u redu da li je 0, odnosno nema ni jedan rad, to znaci da takav korisnik ne postoji u bazi
            if($result->num_rows==0){
                echo "Ovakav korisnik ne postoji u bazi";
            }else{
                // ovde vec znamo da postoji tacno jedan red, ne moramo da prolazimo kroz sve redove
                $red=$result->fetch_assoc();
                //$red['id'], $red['username'], $red['pass'] imamo u bazi u toj tabeli
                // onda proveravamo da li se poklapaju passwordi, odnosno pass i username
                
                // hesovana vrednost u bazi, MD5(nesigurno), ali najprostije, istu sifru isto kodira, provaljeno
                // ne moze da se odhesuje vrednost pass iz baze, to je i poenta, samo da se hesuje password koji se prosledjuje iz inputa u bazu
                // hesujemo istim tipom md5 i ovu vrednost u koju cuvamo password korisnika napisan u input polju i prosledjen submit dugmetom preko post metode
                if(md5($pass)!=$red['pass']){
                    echo "Nije doslo do poklapanja sifara";
                }else{
                    // id korisnika koji postoji u tabeli, pamtimo u sesiji
                    // $_SESSION je globalna promenljiva kojoj mozemo da pristupamo samo ako imamo gore na pocetku session_start() u sesiji mozemo da pamtimo bilo koju vrstu podataka
                    $_SESSION['id'] = $red['id'];
                    header('Location: index.php');//redirekcija
                }
            }
        }
    }

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="sredjivanjePhpSqlListeTabele.css">
    </head>
    <body background="Monthly_M.jpg">
        <!-- post zbog passworda, osetljivi podaci -->
        <div class="login">
        <form action="mrezaLogin.php" method="POST">
            <label for="user">Username: </label>
            <input type="text" name="user" value="">
            <br><br>
            <!-- for je cisto stavljen za nas da znamo za sta je, ne mora da se stavlja -->
            <label for="pass">Password: </label>
            <input type="password" name="pass" value="">
            <br><br>
            <input type="submit" value="Login">
        </form>
        </div>
    </body>
</html>