<html>
<head>
    <style>
    /* da se zvedice oboje u crveno */
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <!-- logika stranice ide na vrh -->
    <?php
        // resavanje preblema sa undefined kada se ne popune polja, resava se sa promenljivima koje se uvode, 
        // prave se prazne promenljive, za sve unose, odnosno inpute, citanje i dodela sa desna na levo
        // sve u jednom redu, da ne bi zauzimalo mnogo mesta, na pocetku sve prazni stringovi
        // pol prazan string jer na pocetku nista nije cekirano i za pravila isto
        $ime = $prezime = $email = $sajt = $komentar = $pol = $pravila = "";
        $imeO = $prezimeO = $emailO = $sajtO = $komentarO = "*";
        // pravimo da samo kada se klikne na dugme, tek kada se aktivira post metod, da preuzima iz inputa i smesta
        // u promenljive koje smo napravili da na pocetku budu prazni stringovi
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            // proveravamo da li je korisnik prosledio prazno, vratice true
            
            if(empty($_POST["ime"])==TRUE){
                // crvena zvezdica za obavezno polje, i erori ako se ne popune ta polja
                // kada se prosledi prazan onda se zvezdica menja sledecim stringom za imeO
                $imeO= "Ime ne sme biti prazan string.";
            }elseif(preg_match("[a-y A-Z]", $_POST["ime"])==FALSE){
                $imeO = "Ime moze sadrzati samo slova";
            }
            else{
                $ime = $_POST["ime"];    
            }
            // karakteri za imena i prezimena mogu da budu samo slova, bez specijalnih karaktera

            if(empty($_POST["prezime"])==TRUE){
                $prezimeO = "Prezime ne sme biti prazan string";
// LOSA VALIDACIJA POGLEDAJ SLEK I KUCI - GRESKA
            }elseif(preg_match("[a-zA-Z]", $_POST["prezime"])==FALSE){
                $prezimeO = "Prezime moze sadrzati samo slova";
            }else{
                $prezime = $_POST["prezime"];    
            }
            
            if(empty($_POST["email"])==TRUE){
                $emailO = "Email ne sme biti prazan string";
            }elseif(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==FALSE){
                // provera da li ima sve karaktere koje treba da sadrzi jedan mail, ugradjena funkcija filter_var
                // koja prima za parametre input polje koje povlacimo, i FILTER_VALIDATE_EMAIL
                $emailO = "E-mail nije dobro unet";   
            }else{
                $email = $_POST["email"];    
            }

            if(empty($_POST["sajt"])==TRUE){
                $sajtO = "Sajt ne sme biti prazan string";
            }elseif(filter_var($_POST["sajt"], FILTER_VALIDATE_URL)==FALSE){
                $sajtO = "Neispravno unet sajt";
            }else{
                $sajt = $_POST["sajt"];    
            }

            //da li je komentar kraci od 15 karaktera, mora biti duzi od 15 karaktera
            if(strlen($_POST["komentar"])<15){
                $komentarO = "Komentar mora biti duzi od 15 karaktera.";
            }else{
                $komentar = $_POST["komentar"];
            }
            

            
            // ako ne cekiramo nista vraca gresku, zato nam treba validacija-pravila
            $pol = $_POST["pol"];
            /*
            $pravila = $_POST["pravila"];
            //validacija se radi isto ovde na pocetku
            if(isset($_POST["pravila"])==TRUE){
                //ako je cekirano 
                $pravila = "Prihvacena pravila";
            }else{
                //ako nije cekirano
                $pravila = "Pravila nisu prihvacena";
            }
            */
            //ova funkcija isset moze da se koristi i za radio button
            if(isset($_POST["pravila"])){
                $pravila = $_POST["pravila"];
            }else{
                $pravila = "Ne.";#default value
            }
        }

    ?>

    <h1>Primer PHP validacije forme</h1>
    <!-- akcija koja dovodi do poziva iste stranice, odnsno ispisuje se na istoj stranici unos akcija koja se pise je sledeca ili index.php,
    odnosno u mom slucaju u action="validacijaForme"-->
    <!-- neki od podataka su osetljivi i zatko koristimo metod post -->
    <!-- razlika izmedju funkcije i tagova, sto ne mora tacnim redosledom u tagu da se redjaju podaciji(npr moze prvo mehod,
     pa action), a u funkciji moramo da prosledimo parametre uvek utvrdjenim redosledom -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        
        <!-- labele ne moraju da se pisu, moze i samo tekst ili u paragrafu, sve jedno -->
        <label>Ime: </label>
        <input type="text" name="ime">
        <!-- da pored imena i ostalog sto je obavezno stoji zvezdica -->
        <span class="error"><?php echo $imeO;?></span>
        <br><br>
        
        <label>Prezime: </label>
        <input type="text" name="prezime">
        <span class="error"><?php echo $prezimeO;?></span>
        <br><br>
        
        <label>E-mail: </label>
        <!-- ne type email, ybog kasnije provere i primera validacije -->
        <input type="text" name="email">
        <span class="error"><?php echo $emailO;?></span>
        <br><br>
        
        <label>Sajt: </label>
        <!-- ne stavljamo za type "url" zato sto hocemo posle da proverimo validaciju unusa -->
        <input type="text" name="sajt">
        <span class="error"><?php echo $sajtO;?></span>
        <br><br>
        
        <label>Komentar: </label>
        <textarea name="komentar" rows="5" cols="40"></textarea>
        <!-- za komentar uvodimo ovde i gore skroz promenljivu da bi moglu da proverimo da li ima vise od 15 karaktera -->
        <span class="error"><?php echo $komentarO;?></span>
        <br><br>

        <label>Pol: </label>
        <!-- svi radio button moraju da imaju isti name, moze samo jedno da se oznaci(radio), na kraju pisemo sta treba
        da pise  -->
        <input type="radio" name="pol" value="Zenski">Zenski
        <input type="radio" name="pol" value="Muski">Muski
        <input type="radio" name="pol" value="Ostalo" checked>Ostalo
        <br><br>

        <label>Prihvatate pravila koriscenja: </label>
        <!-- ukoliko je korisnik cekirao da prihvata pravila, programu se prosledjuje da, analogno value kod radio button -->
        <input type="checkbox" name="pravila" value="Da">
        <!-- moze i ne mora da se cekira -->
        <br><br>
        <!--difoltno je value submit, ako ne stavimo value, ako zelimo drugacije da pise na dugmetu npr potvrdi onda u value
        pisemo sta treba da pise na dugmetu -->
        <input type="submit" name="submit" value="Potvrdi"> 
    </form>
    <br><br>
    <!-- php kod pisemo posle forme, ne u okviru forme -->
    <?php
        // resavanje problema sa undefined index, na pocetku dokumenta uvodimo prazne promenjlive, kojima kasnije 
        // prosledjujemo podatke iz inputa, kada se aktivira post metod
        echo "<h2>Vasi podaci:</h2>";
        // echo "Korisnik: " . $_POST["ime"] . " " . $_POST["prezime"] . "<br>";
        echo "Korisnik: " . $ime . " " . $prezime . "<br>";
        // echo "Korisnicki email: " . $_POST["email"] . "<br>";
        echo "Korisnicki email: " . $email . "<br>";
        // echo "Website korisnika: " . $_POST["sajt"] . "<br>";
        echo "Website korisnika: " . $sajt . "<br>";
        // echo "Komentar korisnika: " . $_POST["komentar"] . "<br>";
        echo "Komentar korisnika: " . $komentar . "<br>";
        // echo "Pol korinika: " . $_POST["pol"] . "<br>";
        echo "Pol korinika: " . $pol . "<br>";
        // echo "Prihvacena pravila koriscenja: " . $_POST["pravila"] . "<br>";
        echo "Prihvacena pravila koriscenja: " . $pravila . "<br>";
    ?>

</body>

</html>