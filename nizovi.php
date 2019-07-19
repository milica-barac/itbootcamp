<?php
    $nizAuta = array("BMW", "Opel", "Toyota");
    $prvaKlupa = array("Nikola","Milica","Jelena","Milica","Vanja","Jelena");
    //kod nizova mora da se pristupi svakom clanu niza preko indeksa
    // nizovi mogu biti numericki, indeksirani, najcesci defoltni
    // asocijativni sa kljucevima stringovima
    // visedimenzionalni nizovi necemo da radimo, nizovi nizova
    echo $prvaKlupa[1];//defoltno indeksiranje je od nule
    echo "<hr>";
    echo $prvaKlupa[5];
    echo "<hr>";
    // $ime = "Filip"; kad je jedna promenljiva onda echo radi, jer ima samo jednu vrednost
    // echo $ime;
    $drugaKlupa[213]="Bogdan";//proizvoljni brojevi nizova
    $drugaKlupa[100]="Nemanja";//ne mora ni redom
    $drugaKlupa[2]="Rade";
    $drugaKlupa[423]="Sanja";

    echo $drugaKlupa[2];
    echo "<hr>";
    //vise dimenzioni
    $t = array(array(1,2,3),array(4,5,6));
    echo $t[0][2];
    echo "<hr>";
    

    $len=count($prvaKlupa);//ugradjena funkcija count
    for($i=0;$i<$len;$i++){
        echo $prvaKlupa[$i];
        echo "<br>";
    }
    echo "<hr>";

    //1. Ispisati sve elemente niza od 5 stringova
    $prva1Klupa = array("Nikola","Milica","Jelena","Milica","Vanja");
    //$l=count($prva1Klupa);//duzina niza moze i bez uvodjenja promenljive, da se direktno u for petlji pozove count
    for($i=0;$i<=count($prva1Klupa)-1;$i++){
        echo $prva1Klupa[$i];
        echo "<br>";
    }
    echo "<hr>";

    //2. Odrediti zbir elemenata celobrojnog niza
    $celiBrojevi= array(1,2,-3,4,5,0);
    $sum=0;
    $le=count($celiBrojevi);
    for($i=0;$i<$le;$i++){
        $sum+=$celiBrojevi[$i];
    }
    echo $sum;



?>