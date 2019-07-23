<?php
    $niz = array (1,2,3,4);
    //foreach(naziv niza as promenljiva koja ce da nosi vrednost, moze bilo koji naziv)
    foreach ($niz as $vrednost){
        echo "$vrednost\n";//stampamo vrednosti elemenata niza
    }
    echo "<hr>";

    // moze da se primeni i na stringove i na numercike nizove
    $niz2= array ("Jedan", "Dva", "Tri");
    foreach ($niz2 as $v){
        echo "$v\n";
    }
    echo "<hr>";

    //2. Odrediti zbir elemenata celobrojnog niza sa foreach-om
    $niz3 = array (5, -9, 0, 1, 3, 4, 6);
    $suma=0;
    foreach($niz3 as $elem){
        $suma+=$elem;
    }
    echo "$suma<hr>";

    // 3. Odrediti max vrednost celobrojnog niza uz pomoc foreach
    $maks=$niz3[0];
    for($i=1;$i<count($niz3);$i++){
        if($niz3[$i]>$maks){
            $maks=$niz3[$i];
        }
    }
    echo "$maks<hr>";

    // 6. Odrediti indeks najveceg elementa celobrojnog niza
    $maks=$niz3[0];//pretpostavka prvi je najveci
    $index=0;//indeks na pocetku najveceg je nula
    for($i=1;$i<count($niz3);$i++){
        if($niz3[$i]>$maks){//da li je element veci od maks
            $maks=$niz3[$i];// ako jeste on pojtaje maksimum
            $index=$i;//cuvamo indeks tog maksimalnog elementa
        }
    }
    echo "$index<hr>";

    // 7.Odrediti broj elemenata celobrojnog niza koji su veci od srednje vrednosti
    $br=0;//broj elemenata vecih od srednje vrednosti na pocetku nula
    $sum=0;//suma je na pocetku nula
    //$n = count($niz3)
    //ako ovde stampamo elem onda ce da izbaci undefined
    /*suma uz pomoc foreach petlje 
    foreach($niz3 as $ele){
        $sum+=$ele;
        ako ovde definisemo a iako je besmisleno na a=5
    }
    ovde bi i dalje a bilo pet kad bi se odstampalo jer ne trpi nikakve promene, ali je i bespotrebno
    kada bi ovde odstampali elem on bi imao vrednost poslednjeg elementa niza
    echo $suma/$n*/

    for($i=0;$i<count($niz3);$i++){
        $sum+=$niz3[$i];
    }

    $sred=$sum/count($niz3) . "<br>";
    echo "Srednja vrednost je: $sred";

    foreach($niz3 as $va){//u svakom prolasku se pamti trenutna vrednost elementa
        if($va>$sred){//svaki put kada je vrednost veca od srednje
            $br++;//brojac se povecava za jedan
        }
    }
    echo "Broj elemenata koji su veci od srednje vrednosti je: $br<hr>";
    
    // 8. Izracunati zbir pozitivnih elemenata celobrojnog niza.
    $sum=0;
    foreach($niz3 as $vr){
        if($vr>0){
            $sum+=$vr;
        }
    }
    echo "$sum<hr>";
    //primer sa while petljom
    /*  $suma = 0;
        $i=0;
        while($i<count($niz3)){
            if($niz3[$i]>0){
                $suma+=$niz3[$i];
            }
            $i++;
        }
        echo $suma;
    */

    // 9. Odrediti broj parnih elmenata u celobrojnom nizu.
    $b=0;//broj parnih na pocetku je nula
    foreach($niz3 as $vre){
        if($vre%2==0){
            $b++;//kad element ispunjavao uslov iz if brojac povecavamo za 1
        }
    }
    echo "$b<hr>";

    // 10. Izracunati sumu elemenata u nizu sa parnim indeksom
    $sum=0;
    //ili bez if, ali u for korak na $i+=2 odnosno $i= $i+2
    for($i=0;$i<count($niz3);$i++){
        if($i%2==0){
            $sum+=$niz3[$i];
        }
    }
    echo "$sum<hr>";

    // 11.Promeniti znak svakom elementu celobrojnog niza.
    //ne moze foreach jer vazi samo u petlji promena vrednosti
    echo "Pre promene: ";
    stampajNiz($niz3);
    foreach($niz3 as $vred){
        $vred=-$vred;
        echo "$vred\n";
    }
    echo "Ovo je sa foreach , a posle je proemena sa forom <hr>";
    //da bi promenili i posle odstampali niz sa promenama
    function stampajNiz($niz){
        foreach($niz as $elem){
            echo $elem. " ";
        }
        echo "<hr>";
    }
    echo "Pre promene: ";
    stampajNiz($niz3);

    for($i=0; $i<count($niz3); $i++){
        $niz3[$i]=-$niz3[$i];
    }
    echo "Posle promene: ";
    stampajNiz($niz3);
    
    // 12. Promeniti znak svakom neparnom elementu celobrojnog niza sa parnim indeksom.
    // ako stavimo $i+=2 u for petlji, onda u if mozemo da sklonimo uslov $i%2==0
    //zato sto su negativni brojevi ne moze $niz3[$i]%2==1, jer sa negativnim se dobija -1
    for($i=0; $i<count($niz3); $i++){
        if($i%2==0 && $niz3[$i]%2!=0){
            $niz3[$i]=-$niz3[$i];
        }
        echo $niz3[$i]."\n";
    }
    echo "<hr>";

    // 13. Odrediti broj parnih elemenata sa neparnim indeksom.
    $br=0;
    for($i=1;$i<count($niz3);$i+=2){
        if($niz3[$i]%2==0){
            $br++;
        }
    }
    echo "$br<hr>";

    // 14. Ispisati dužinu svakog elementa u nizu stringova.
    $stringovi = array("Milica", "Barac", "Tralala");
    foreach($stringovi as $vredno){
        echo strlen($vredno);//ugradjena funkcija strlen, vraca duzinu 
    }
    echo "<hr>";

    // 15. Odrediti element u nizu stringova sa najvećom dužinom.
    $max=strlen($stringovi[0]);//pretpostavka za max prvi element 
    $in=0;
    for($i=1; $i<count($stringovi); $i++){
        if(strlen($stringovi[$i])>$max){
            $max = strlen($stringovi[$i]);
            $in=$i;
        }
    }
    echo "Makismalna duzina je $max". " ,a rec je: " . $stringovi[$in];
    echo "<hr>";

    //primer sa foreach-om
    $max = -$stringovi[0];//warning zbog minusa, jer nije brojcana vrednost nego string
    $maxRec= ""; 
    foreach($stringovi as $valu){
        if($max<strlen($valu)){
            $max = strlen($valu);
            $maxRec = $valu;
        }
    }
    echo "<br> $max rec je $maxRec<hr>";

    // 16. Odrediti broj elemenata u nizu stringova čija je dužina veća od prosečne dužine svih stringova u nizu.
    $brojac=0;
    $sum=0;
    $n=count($stringovi);
    foreach($stringovi as $value){
        $sum += strlen($value);
    }
    $s=$sum/$n;
    echo "Srednja duzina je $s<br>";
    foreach($stringovi as $value){
        if(strlen($value)>$s){
            $brojac++;
        }
    }
    echo "Broj stringova vecih od prosecne duzine: $brojac<hr>";

    // 17. Odrediti broj elemenata u nizu stringova koji sadrže slovo 'a'.
    $br=0;
    //da li se neki string nalazi unutar nekog stringa, ugradjena funkcija koja ispituje da li neki string
    // sadrzi neko slovo
    foreach($stringovi as $rec){
        //strpos funkcija prima dva parametra, prvi je string $rec u kome trazimo, ono sto napisemo kao drugi 
        //parametar "a". strpos($s1,$s2) ako $s2 postoji u $s1 kao pod string: prva pozicija pojavljivanja $s2
        // u npr. strpos("Jelena","ele")=>1, strpos("Ana","a")=>0, ako $s2 ne postoji u $s1 vraca => false
        if(strpos($rec, "a")!==false){
//mora da se obuhvati i nula, tj ako se a nalzai kao prvo slovo reci, onda strpos vraca nulu 0, sto je false i onda
// ne obuhvata slucaj sa !=, nego moramo da poredimo i po tipu i zato koristimo !== da bi ukljcili i taj slucaj
            $br++;
        }
    }
    echo "$br<hr>";
    
    // 18. Odrediti broj elemenata u nizu stringova koji počinju na slovo 'a' ili 'A'.

    $broj=0;//povecava se ukoliko je ispunjeno da je a na nultoj poziciji, sto znaci da string pocinje na a
    foreach($stringovi as $ime){
        // var_dump($ime);
        // var_dump()
        if(strpos($ime, "a")===0 || strpos($ime, "A")===0){
            $broj++;
        }
    }
    echo "Broj stringova koji pocinju na A: $broj<br>";

    //$a = $b (dodela vrednosti-a dobija vrednost b, sa desna na levo)
    // $a == $b (poredjenje po vrednosti: vraca true ako a i b imaju istu vrednost a false inace)
    // $a === $b (poredjenje po vrednosti i tipu, sa leve strane prazan string a sa desne nula vraca false
    // jer nisu isti po tipu iako su nula i false u sistemu gledaju kao iste vrednosti) 


    // drugi nacin za 18. zadatak sa substr funkcijom laski, manje komplikovano
    $br=0;
    foreach($stringovi as $ime){
        // substr($str, $pos, $len)
        // vraca podstring stringa $str pocev od pozicije $pos duzine $len
        if(substr($ime, 0, 1)=="a" || substr($ime, 0, 1)=="A"){
            //ovde ne mora ===, jer funkcija substr vraca podrstring, a ne poziciju na kojoj se on nalazi, tako da kada
            // se poredi sa "a", istog su tipa i ne mora tri znaka jednakosti
            $br++;
        }
    }
    echo "Broj stringova koji pocinju na A odredjen funkcijom substr: $broj<hr>";

    /* 20. Dati su nizovi $a[0], $a[1], ..., $a[n - 1] i $b[0], $b[1], ..., $b[n - 1]. Formirati niz $c[0], $c[1], ...,
    $c[2n – 1] čiji su elementi $a[0], $b[0], $a[1], $b[1], ..., $a[n - 1], $b[n - 1].*/
    $a = array(5,8,9,-2);
    $b = array(7,0,-1,2);
    // na pocetku niz u koji zelimo da dodajemo elemente je prazan
    $c =array();
    for($i=0; $i<count($a);$i++){
        // svejedno da li count od a ili od b jer su iste duzine
        $c[]=$a[$i];//php sam dodeljuje prvi slobodan indeks kada ostavimo prazne uglaste zagrade
        $c[]=$b[$i];

    }
    stampajNiz($c);

    //drugi nacin sa dve for petlje sa i za a i j za b,a moze i sa array push ugradjenom funkcijom PROBAJ

    //provera da li ce da prelepi ili stavlja na prvo prazno mesto ili posle poslednjeg zauzetog indeksa 
    $d[0]=1;
    $d[2]=3;
    $d[]=2;

    // 19. Na osnovu celobrojnog niza $a[0], $a[1], ... formirati niz $b[0], $b[1], ... koji sadrži samo pozitivne brojeve.
    $a = array(13,-4,11,-5,12);
    $b=array();
    for($i=0;$i<count($a);$i++){
        if($a[$i]>0){
            $b[]=$a[$i];
        }
    }
    stampajNiz($b);

    // 22. Na osnovu niza $a[0], $a[1],..., $a[2n - 1] formirati niz $b[0],$b[1], ..., $b[n - 1].po formuli:
    $a=array(1,3,4,6,-3);
    $b=array();
    for($i=0; $i<count($a)/2; $i++){
        $b[$i]=($a[$i]+$a[count($a)-1-$i])/2;
    }
    stampajNiz($b);


?>