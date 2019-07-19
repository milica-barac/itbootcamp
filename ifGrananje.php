<?php
    $a = 4;
    $b = 3;
    if($a>$b){
        echo "a je vece od b <br>";
    }elseif($a<$b){
        echo "vrednost a nije veca od vrednosti b <br>";
    }

    echo "<br>____________________________________<br>";

    $a=5;
    $b=5;
    if($a==$b){
        echo "a i b su jednaki <br>";
    }

    if($a!=$b){
        echo "a i b nisu jednaki<br>";
    }
    echo "<br>____________________________________<br>";
    $a=1;
    $b=2;
    if($a==$b){
        echo "a i b su jednaki<br>";
    }else{
        echo "a i b su razliciti<br>";
    }
    echo "<br>____________________________________<br>";
    /*1. Za dva uneta broja ispisati koji je veci a koji manji */
    $a=4;
    $b=6;
    if($a>$b){
        echo "a je vece od b<br>";
    }elseif($b>$a){
        echo "a je manje od b<br>";
    }else{
        echo "a i b su jednaki";
    }   
    echo "<br>____________________________________<br>";

    /*2. Ispitati da je uneta temperatura u plusu ili je u minusu. Ukoliko je temperatura nula, racunati da je u plusu */
    $temp=25;
    //moj nacin
    if($temp>=0){
        echo "Temperatura je u plusu.<br>";
    }else{
        echo "Temperatura je u minusu<br>";
    }
    /*drugi nacin
    if($temp>0){
        echo "Temperatura je u plusu.<br>";
    }elseif($temp<0){
        echo "Temperatura je u minusu<br>";
    }else{
        echo "Temperature je nula";
    }*/
    echo "<br>____________________________________<br>";
    
    /*3. U odnosu na pol (muski/zenski) koji je korisnik uneo prikazati odgovarajuci avatar*/
    $pol="m";
    if($pol=="m"){
        echo "&male;<br>";
        // echo "<img src = ''>";
    }else{
        echo "&female;<br>";
        // echo "<img src = ''>";
    }
    echo "<br>____________________________________<br>";
    
    /*4. U odnosu na preuzete vrednosti AM i PM sa svog racunara, ispisati da li je trenutno jutro ili podne */
    $vreme = date("A");
    // date("A");vraca PM ili AM
    // echo $x;
    if($vreme=="PM"){
        echo "popodne";
    }else{
        echo "trenutno je prepodne";
    }
    echo "<br>____________________________________<br>";

    /*5. Za preuzetu godinu sa racunara i unetu godinu rodjenja izracunati da li je osoba punoletna ili maloletna */
    $godRodj = 1994;
    $trGod = date('Y'); 
    // echo $trGod; - vraca trenutnu godinu
    $godina = $trGod - $godRodj;
    echo $godina;
    echo "<br>____________________________________<br>";
    
    /*6. Odrediti najveci od tri uneta broja */
    $a=5; $b=-9; $c=12;
    $max = $a;
    if($max<$b){
        $max = $b;
    }
    if($max<$c){
        $max = $c;
    }
    echo $max;
    echo "<br>____________________________________<br>";

    /*drugi nacin za minimum
    $a=5; $b=-9; $c=12;
    $min = $a;
    if($min>$b){
        $min = $b;
    }
    if($min>$c){
        $min = $c;
    }
    echo $min;
    */

    /*7.Na osnovu unetog broja poena ispitati koju ocenu profesor treba da upise uceniku. Ucenik je polozio ispit ukoliko ima vise od 50 poena
    u suprotonom je pao ispit.
    >50 p - 6;
    >60 p - 7;
    >70 p - 8;
    >80 p - 9;
    >90 p - 10;
     */
    $poeni=14;
    if($poeni>90){
        echo "10";
    }elseif($poeni>80){
        echo "9";
    }elseif($poeni>70){
        echo "8";
    }elseif($poeni>60){
        echo "7";
    }elseif($poeni>50){
        echo "6";
    }else{
        echo "Pao ispit.";
    }
    echo "<br>____________________________________<br>";

    /*8.Preuzeti koji je dan u nedelji sa racunara i spitati da li je to radni dan ili je u pitanju vikend. */
    $dan=date("l");
    //echo $dan; - provera sta vraca varijabla $dan kroz ugradjenu funkciju date();
    if($dan=="Saturday" || $dan=="Sunday"){
        echo "Vikend.";
    }else{
        echo "Radni dan.";
    }
    echo "<br>____________________________________<br>";
    /*drugi nacin 
    $dan=date("N");
    //echo $dan; - provera sta vraca varijabla $dan kroz ugradjenu funkciju date(w);
    if($dan<=5)iliif($dan<6){
        echo "Radni dan.";
    }else{
        echo "Vikend.";
    }

    /*9. Za vreme preuzeto sa računara ispisati dobro jutro za vreme manje od 12 sati ujutru, dobar dan za vreme manje od 18 sati popodne i u ostalim  slučajevima ispisati dobro veče. */
    $vreme=date("H");
    //echo $vreme;
    if($vreme>=18){
        echo "<p>Dobro vece.</p>";
    }elseif($vreme<12){
        echo "<p>Dobro jutro.</p>";
    }else{
        echo "<p>Dobar dan.</p>";
    }
    echo "<br>____________________________________<br>";
    // drugi nacin
    /*if($vreme<12){
        echo "<p>Dobro jutro.</p>";
    }elseif($vreme<18){
        echo "<p>Dobar dan.</p>";
    }else{
        echo "<p>Dobro vece.</p>";
    }*/

    /*10.Uporediti dva uneta datuma i ispisati koji od njih je raniji.*/
    //$dan=date("d");
    //$mesec=date("m");
    //$godina=date("Y");
    $dan=23;
    $mesec=8;
    $godina=1994;
    $dan2=17;
    $mesec2=8;
    $godina2=1994;
    if($godina>$godina2){
        echo "Raniji datum: $dan2.$mesec2.$godina2";
    }elseif($godina<$godina2){
        echo "Raniji datum: $dan.$mesec.$godina";
    }elseif($mesec>$mesec2){
        echo "Raniji datum: $dan2.$mesec2.$godina2";
    }elseif($mesec<$mesec2){
        echo "Raniji datum: $dan.$mesec.$godina";
    }elseif($dan>$dan2){
        echo "Raniji datum: $dan2.$mesec2.$godina2";
    }elseif($dan<$dan2){
        echo "Raniji datum: $dan.$mesec.$godina";
    }else{
        echo "Datumi su jednaki.";
    }
    echo "<br>____________________________________<br>";

    /*11. Radno vreme jedne programerske firme je od 9h do 17h. Preuzeti vreme sa računara i ispitati da li u to vreme firma radi ili ne radi. */
    $vreme=date('G');
    //echo $vreme;
    if(9 < $vreme && $vreme <17){
        echo "Firma radi.";
    }else{
        echo "Firma ne radi.";
    }
    echo "<br>____________________________________<br>";

    /*12. Za unet početak i kraj radnog vremena dva lekara ispisati DA ukoliko se njihove smene preklapaju, u suprotnom ispisati NE.*/
    $pocetak=23;
    $kraj=14;
    $pocetak2=17;
    $kraj2=7;
    // ne radi za nocni rad
    if($pocetak<$pocetak2 && $pocetak<$kraj2 && $kraj2>$kraj && $pocetak2>$kraj){
        echo "Ne preklapaju se smene.";
    }elseif($pocetak2<$pocetak && $pocetak2<$kraj && $kraj>$kraj2 && $pocetak>$kraj2){
        echo "Ne preklapaju se smene.";
    // }elseif($kraj){
        
    // }elseif($pocetak){

    }else{
        echo "Preklapaju se smene";
    }
    echo "<br>____________________________________<br>";
    //prepisi od Radeta i pitaj Nenada ili Igora za resenje
    
    // 13. Za uneti broj ispitati da li je paran ili nije.
    $broj=48;
    if($broj%2==1){
        echo "Neparan.";
    }else{
        echo "Paran.";
    }
    echo "<br>____________________________________<br>";
    // 14. Za uneti broj ispisati da li je deljiv sa 3 ili ne.
    $broj=9;
    if($broj%3==0){
        echo "Deljiv.";
    }else{
        echo "Nedeljiv.";
    }
    echo "<br>____________________________________<br>";
    // 15. Za dva uneta broja, od većeg učitanog broja oduzeti manji i rezultat ispisati na ekranu.
    $broj1=124;
    $broj2=32;
    if($broj1>$broj2){
        echo $broj1-$broj2;
    }else{
        echo $broj2-$broj1;
    }
    echo "<br>____________________________________<br>";
    /*    
    $broj1=7;
    $broj2=-5;
    if($broj1>$broj2){
        $rez=$broj1-$broj2;
    }else{
        $rez=$broj2-$broj1;
    }
        echo $rez;
    */

    // 16. Za uneti broj ispitati da li je on manji ili veći od nule. Ukoliko je manji ili jednak nuli ispisati njegov prethodnik, a ukoliko je veći od nule ispisati njegov sledbenik.
    $br1=231;
    $br2=-123;
    if($br2<=0){
        $br2--;//$broj=$broj-1;
    }else{
        $br2++;//$broj=$broj+1;
    }
    echo "$br2 <hr>";

    // 17. Za tri uneta broja ispisati koji od njih ne najveći, koji od njih je srednji, a koji od nih je najmanji. 

    // 18. Za učitani broj ispitati da li je ceo.
    $br=7.3;
    if((int)($br)==$br){
        echo "CEO.<hr>";
    }else{
        echo "Decimalan.<hr>";
    }
    // 19. Za tri uneta broja ispisati koji od njih ne najveći, koji od njih je srednji, a koji od nih je najmanji.
    

    /*UGNJEZDENO GRANANJE PRIMER PRE 20-OG ZADATKA - Napraviti program koji za uneti pol i broj godina korisnika ispisuje da li je korisnik muskarac  ili zena i da li je punoletan*/
    $pol="Z";
    $godine=24;
    if($pol=="Z"){
        echo "Zena, ";
        if($godine>=18){
            echo "punoletna";
        }else{
            echo "maloletna";
        }
    }else{
        echo "Muskarac, ";
        if($godine>=18){
            echo "punoletan";
        }else{
            echo "maloletan";
        }
    }
    echo "<hr>";
    
    // Logicki operatori and-&&-mora svaki-oba tacna, or-||-jedno ili drugo tacno-makar jedan tacan, !=not-tacno ukoliko nije tacno
    $pol="Z";
    $godine=24;
    if($pol=="Z" && $godine>=18){
        echo "Punoletna zena.";
    }elseif($pol=="Z" && $godine<18){
        echo "Maloletna zena.";
    }elseif($godine>=18){
        echo "Punoletan muskarac.";
    }else{
        echo "Maloletan muskarac.";
    }
    echo "<hr>";

    // 20. Učitati dva cela broja i ispitati da li je veći od njih paran. 
    $br=33;
    $br1=41;
    if($br>$br1){
        //ugnjezdeno grananje
        if($br%2==0){
            echo "Veci broj je paran.";
        }else{
            echo "Veci broj je neparan.";
        }
    }else{
        if($br1%2!=1){
            echo "Veci broj je paran.";
        }else{
            echo "Veci broj je neparan.";
        }
    }
    echo "<hr>";
    // 21. Naći koji je najveći od tri uneta broja $a, $b i $c. radili vec sa predpostavkom da je prvi max, pa uporedjujemo redom, drugi nacin kada ima malo brojeva, jednostavniji nacin od predpostavke
    $a=4; $b=9; $c=7;
    //ISPITAJ KAD SU JEDNAKI
    if($a>$b and $a>$c){
        echo "Maks je $a.";
    }elseif($b>$c){
        echo "Maks je $b";
    }else{
        echo "Maks je $c";
    }

    // 22. Ispisati na ekranu „ekstremna temperatura“ ukoliko je temperatura manja od -15 stepeni Celzijusovih  i veća od 40 stepeni Celzijusovih.
    $temp=-16;
    if($temp<-15 || $temp>40){
        echo "Ekstremna temperatura.";
    }else{
        echo "Temperatura u granicama normale.";
    }
    echo "<hr>";

    // 23. Ispitati da li je godina prestupna. (Godinu preuzeti sa vremena na Vašem računaru). Prestupna je ona godina koja je deljiva sa 4, ako nije deljiva sa 100, mada ipak jeste deljiva sa 400.
    $god=date("Y");
    $god =2012;
    if($god%4==0 && ($god%100!=0 || $god%400==0)){
        echo "Godina je prestupna.";
    }else{
        echo "Godina nije prestupna.";
    }
    // 24. Za uneto početno i krajnje radno vreme dva lekara, ispitati koliko sati i minuta se njihove smene preklapaju.
 
    // 25. Ispitati koji je najveći od tri uneta broja.
 
    // 26. Jedan butik ima radno vreme od 9h do 20h radnim danima, a vikendom od 10h do 18h. Preuzeti dan i vreme sa računara i ispitati da li je butik trenutno otvoren. */



?>