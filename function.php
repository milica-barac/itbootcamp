<?php
    //funkcija bez prosledjene vrednosti
    function mojaFunkcija(){
        echo "Zdravo svete!<hr>";
    }
    mojaFunkcija();//poziv funkcije bez argumenta 

    // funkcija sa prosledjenim parametrom text koji je tipa string u argumentu funkcije ()
    function myFunction($text){
        echo $text;
    }
    $text = "Hello world!<hr>";
    myFunction($text);//poziv f-je sa argumentom

    //funkcija sa dva prosledjena parametra
    function user($name, $familyName){
        echo "User: $name $familyName<hr>";
    }
    user("Joe", "Black");//navodnici obavezno kad je string
    
    //funkcija za ispis sa prosledjenom string i numerickom vrednosti 
    function korisnik($ime, $god){
        echo "$ime ima $god godina.";
    }
    korisnik("Ana",18);//string pod navodnicima, broj bez navodnika se prosledjuje
    korisnik("Bojana",23);//dva argumenta funkcije string i int
    korisnik("Vuk",21);//pri pozivanju moraju da se proslede obe 
    echo "<hr>";

    //funkcija koja se poziva 5 puta u for petlji
    function zdravo(){
        echo "Zdravo!!!<br>";
    }
    function it($i){
        echo "Broj $i: ";
    }
    for($i=1; $i<=5; $i++){
        it($i);
        zdravo();//pri svakom prolasku ispise zdravo, ukupno 5 puta
    }
    echo "<hr>";

    //pet puta napisati ime i prezime, proslediti funkciji
    //istu funkciju ime koristim i za ime i za prezime, samo gledam sta prosledjujem, u prvoj petlji ime, a u drugoj for petlji prezime
    function ime ($ime){
        echo $ime;
    }
    for($i=1; $i<=5; $i++){
        ime("Milica");
    }
    for($i=1; $i<=5; $i++){
        ime("Barac");
    }
    echo "<hr>";

    //funkcija za zbir
    //kljucna rec functionm ima ime to je zbir u ovom primeru, ima parametre, to su $a i $b
    //ima promenljivu rez gde cuva sumu brojeva $a i $b i cuva u 
    function zbir($a, $b){
        $rez = $a + $b;
        echo "$rez ";
    }
    //mora da se prosledi onoliko parametara koliko funkcija zahteva, ali ne moraju da se zovu isto kao u funkciji, primer umesto $a,$b npr $x,$y
    zbir(5,10);
    $a=5;
    $b=7;
    zbir($a,$b);
    $x=12;
    $y=35;
    zbir($x,$y);
    zbir($x,$x);
    echo "<hr>";

    //funkcija koja vraca vrednost return, prosledjuju joj se dve numericke vrednosti
    function suma ($a, $b){
        $rez = $a + $b;
        return $rez;
    }
    $rezultat = suma(5,17);
    echo "$rezultat<hr>";

    //drugi nacin, kada cuvamo neki rezultat, pa opet pozovemo funkciju da uradi sumu prethodna dva rezultata
    function suma1 ($a, $b){
        $rez = $a+$b;
        return $rez;
    }
    $c = suma1(6,7);
    $d = suma1(8,1);
    echo suma1($c,$d);
    echo "<hr>";
    //pojma nemam zasto ne ispisuje, proveri 
    echo suma1(suma1(7,6),suma1(1,8));//pazi koju funkciju pozivas
    echo "<hr>";

    //ZADACI ZA VEZBU

    // 1. Napisati funkciju pozdrav kojoj se prosleđuje ime i prezime, a funkcija ispisuje pozdrav. Na primer za uneto ime Jelena i prezime Matejić, funkcija ispisuje Zdravo Jelena Matejić. 
    function pozdrav ($ime, $prezime){
        echo "Zdravo $ime $prezime <hr>";
    }

    pozdrav("Jelena", "Matejic");


    // 2. Napisati funkciju zbir koja računa zbir dva realna broja. Šta bi trebalo izmeniti da bi se dobila razlika, proizvod ili količnik dva broja.
    function zbir2 ($a, $b){
        echo $a+$b . "<hr>";
    }
    zbir2 (4, 9);


    // 3. Napisati funkciju neparan koja za uneti ceo broj n vraća tačno ukoliko je neparan ili netačno ukoliko nije neparan.


    // 4. Napisati funkciju maks2 koja vraća veći od dva prosleđena realna broja. Zatim napisati funkciju maks4 koja vraća najveći od četiri prosleđena realna broja.
    function maks2 ($br1, $br2){
        if($br1>$br2){
            return $br1;
        }else{
            return $br2;
        }
    }
    $m2=maks2(2,5);
    echo "$m2<br>";

    function maks4 ($br1, $br2, $br3, $br4){
        $max1=maks2($br1, $br2);//maks prva dva broja
        $max2=maks2($br3,$br4);//maks druga dva broja
        $max= maks2($max1,$max2);//maks maksimuma prvog i drugog para
        //$max = maks2(maks2($br1,$br2),maks2($br3, $br4)); elegantniji nacin
        return $max;
    }
    $m = maks4(1, -3, 5, 7);
    echo "$m<hr>";


    // 5. Napraviti funkciju koja prikazuje sliku za prosledjenu adresu slike.
    function prikaz ($adresa){
        echo "<img src='$adresa' width=150/><hr>";
    }
    prikaz("1.png");


    // 6. Napraviti funkciju koja za unetu boju na engleskom jeziku boji tekst paragrafa u tu boju.
    function oboji($boja){
        echo "<p style='color:$boja'>Tekst paragrafa obojen.</p><hr>";
    }
    oboji("blue");


    // 7. Napraviti funkciju kojoj se prosleđuje ceo broj a ona ispisuje tekst koji ima prosleđenu veličinu fonta.
    function font($velicina){
        echo "<p style='font-size:$velicina'>Tekst paragrafa velicine $velicina.</p><hr>";
    }
    font(24);


    // 8. Napraviti funkciju koja pet puta ispisuje istu rečenicu, a veličina fonta rečenice treba da bude jednaka vrednosti iteratora. 
    function pet(){
        for($i=13; $i<=17; $i++){
            echo "<p style='font-size:$i'>Ova recenica ce se ispisati 5 puta, velicina fonta je $i.</p>";
        }
    }
    pet();
    echo "<hr>";


    // 9. Napisati program koji sadrži funkciju sedmiDan koja za uneti broj n ispisuje n-ti dan u nedjelji (npr. za 1 se ispisuje „Ponedjeljak“, za 7 ispisuje “Nedelja”, a za 8 opet “Ponedeljak”). Pitanje: Kako bismo realizovali ovaj zadatak da se tražio n-ti mesec u godini?
    //moze i sa else if...
    function sedmiDan($n){
        switch($n%7){
            case 1:
                echo "Ponedeljak";
                break;
            case 2:
                echo "Utorak";
                break;
            case 3:
                echo "Sreda";
                break;
            case 4:
                echo "Cetvrtak";
                break;
            case 5:
                echo "Petak";
                break;
            case 6:
               echo "Subota";
               break;
            case 0:
                echo "Nedelja";
                break;
            default:
                echo "Pogresan unos";
        }
    }
    // $n%7==case moze i u case,ali lepse izgleda u switch
    sedmiDan(16);
    echo "<hr>";

    //za mesece u godinu
    function dvanestiMesec($m){
        if($m%12==1){
            echo "Januar.";
        }elseif($m%12==2){
            echo "Februar.";
        }elseif($m%12==3){
            echo "Mart.";
        }elseif($m%12==4){
            echo "April.";
        }elseif($m%12==5){
            echo "Maj.";
        }elseif($m%12==6){
            echo "Jun.";
        }elseif($m%12==7){
            echo "Jul.";
        }elseif($m%12==8){
            echo "Avgust.";
        }elseif($m%12==9){
            echo "Septembar.";
        }elseif($m%12==10){
            echo "Oktobar.";
        }elseif($m%12==11){
            echo "Novembar.";
        }elseif($m%12==0){
            echo "Decembar.";
        }else{
            echo "Pogresan unos.";
        }
    }
    dvanestiMesec(23);
    echo "<hr>";

    // 10. Napraviti funkciju deljivSaTri koja se koristi u ispisivanju brojeva koji su deljivi sa tri u intervalu od n do m. Prebrojati koliko ima ovakvih brojeva od n do m.
    function deljivSaTri($n, $m){
        $brojac = 0;
        for($i=$n; $i<=$m;$i++){
            if($i%3==0){
                echo "$i ";
                $brojac++;
            }
        }
        echo "<br>U intervalu od $n do $m ima $brojac bojeva deljivih sa 3<hr>";
    }
    deljivSaTri(3,27);


    // 11. Napisati funkciju koja ispisuje brojeve u intervalu od n do m koji su deljivi sa tačno dva od brojeva 2, 3, 5 i 7.
    function deljivSaTacnoDva($n, $m){
        for($i=$n; $i<=$m; $i++){
            $br=0;//resetuje se za svaki broj jer na pocetku nije deljiv ni sa cim dok ne ispitamo, mora da se resetuje u for petlji
            //stavljamo if umesto elseif, jer moramo da ispitamo sve slucajeve, a ne da izadje kad ispuni prvi uslov
            if($i%2==0){
                $br++;
            }
            if($i%3==0){
                $br++;
            }
            if($i%5==0){
                $br++;
            }
            if($i%7==0){
                $br++;
            }
            if($br==2){
                echo "$i ";
            }
        }
    }
    deljivSaTacnoDva(5,15);

    /*tesko na ovaj nacin, ali dugacko je i mogucnost greske je veca, moze kad se ispituje da li je deljiv sa dva ili vise broja, a ne tacno dva
    function deljivSaDvaBroja($n, $m){
        for($i=$n; $i<=$m;$i++){
            if($i%2==0 && ($i%3==0 || $i%5==0 || $i%7==0)){
                echo "$i ";
            }elseif($i%3==0 && ($i%2==0 || $i%5==0 || $i%7==0)){
                echo "$i ";
            }elseif($i%5==0 && ($i%3==0 || $i%2==0 || $i%7==0)){
                echo "$i ";
            }elseif($i%7==0 && ($i%3==0 || $i%5==0 || $i%2==0)){
                echo "$i ";
            }else{
                echo "$i ";
            }
            }
        }

    deljivSaDvaBroja(2, 32);*/
    






?>