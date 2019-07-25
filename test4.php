<?php
/*1) Zadatak
Napisati funkciju suma koja određuje sumu onih brojeva koji su deljivi
sa 3 i nisu deljivi sa 7, u intervalu od n do m. Sumu vratiti pomoću
return naredbe i tek onda je ispisati na ekranu.*/

function suma ($n, $m){
    $sum = 0;
    for($i=$n; $i<=$m; $i++){
        if($i%3==0 && $i%7!=0){
            $sum+=$i;
        }
    }
    return $sum;
}   

$s=suma(18,22);
echo $s;


/*2) Zadatak
Napraviti funkciju ispis kojoj se prosleđuju tri parametra – boja na
engleskom jeziku $color, numerička vrednost za veličinu fonta $font i
numeričku vrednosti za broj iteracija $n. U funkciji iteriranje vršiti $n
puta pomoću while petlje i u okviru HTML paragrafa ispisivati redni
broj iteracije, paragraf obojiti prosleđenom bojom i podesiti mu
prosleđenu veličinu za veličinu fonta.*/

function ispis ($color, $font, $n){
    $i=1;
    while($i<=$n){
        echo "<p style='font-size:$font; color:$color'>$i</p>";
        $i++;
    }
}

ispis("red",50, 3);


/*3) Zadatak
Napraviti funkciju krvnaGrupa koja na osnovu prosleđenog tipa krvne
grupe A+, 0+, B+ ili AB+ u switch naredbi ispisuje krv koje krvne
grupe osoba može da primi, a kojim krvnim grupama krv može da da,
na osnovu sledeće tabele.*/
function krvnaGrupa($tip){
    switch($tip){
        case "A+":
            echo "Osoba je krvne grupe $tip.<br>";
            echo "Moze dati krv: A+, AB+ <br>";
            echo "Moze primiti krv: A+,0+ <hr>";
            break;
        case "0+":
            echo "Osoba je krvne grupe $tip.<br>";
            echo "Moze dati krv: 0+, A+, B+, AB+<br>";
            echo "Moze primiti krv: 0+ <hr>";
            break;
        case "B+":
            echo "Osoba je krvne grupe $tip.<br>";
            echo "Moze dati krv: B+, AB+ <br>";
            echo "Moze primiti krv: B+,0+ <hr>";
            break;
        case "AB+":
            echo "Osoba je krvne grupe $tip. <br>";
            echo "Moze dati krv: AB+ <br>";
            echo "Moze primiti krv: Sve krvne grupe <hr>";
            break;
        default: 
            echo "Pogresan unos.<hr>";
    }
}

krvnaGrupa("0+");



    
?>