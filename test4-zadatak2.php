<!-- 2. Zadatak (60 poena)
Uneti niz od n celih brojeva koji predstavljaju plate radnika jedne firme.
➢ (10 poena)
Napisati funkciju prosecna kojoj se prosleđuje niz plata radnika, a ona vraća prosečnu platu
radnika ove firme.
➢ (15 poena)
Napisati funkciju ispisiNiz kojoj se prosleđuje niz plata radnika, prethodno izračunata prosečna
plata i nazivi dve boje na engleskom jeziku. Ova funkcija na ekranu ispisuje sve plate radnika,
ali tako da prvom prosleđenom bojom budu obojene sve natprosečne plate radnika, a drugom
prosleđenom bojom sve ostale plate.
➢ (15 poena)
Napisati funkciju indeksMinMax kojoj se prosleđuje niz plata radnika i na ekranu ispisuje zbir
indeksa minimalne i maksimalne plate.
➢ (20 poena)
Napisati funkciju slika kojoj se prosleđuje niz i dve promenljive koje čuvaju adrese dve slike -
slika nasmejanog čovečuljka i slika tužnog čovečuljka. Funkcija na ekranu treba da ispisuje
prosleđenu sliku nasmejanog čovečuljka ukoliko više od polovine radnika ima natprosečnu
platu, a u suprotnom prikazuje prosleđenu sliku tužnog čovečuljka. -->
<?php

    
    $plate = array(50000, 30000, 90000, 40000, 60000, 70000, 80000, 100000);
    
    function prosecna ($plate){
        $sum=0;
        foreach($plate as $p){
            $sum+=$p;
        }
        $prosek=$sum/count($plate);
        return $prosek;
    }
    echo prosecna($plate);

    function ispisiNiz($plate, $prosek, $color1, $color2){
        foreach($plate as $pl){
            if($pl>=prosecna($plate)){
                echo "<p style='color:$color1;'>$pl</p>";
            }else{
                echo "<p style='color:$color2;'>$pl</p>";
            }
        }
    }
    ispisiNiz($plate, prosecna($plate), "red", "green");


    function indeksMinMax($plate){
        $n=count($plate);
        sort($plate);
        $min=$plate[0];
        $max=$plate[$n-1];

        echo "Index minimalne plate je 0, a maximalne: " . ($n-1);
    }

    indeksMinMax($plate);

    $adresa1="https://pbs.twimg.com/profile_images/416275620872466432/calFkWPs_400x400.jpeg";
    $adresa2="https://cdn2.iconfinder.com/data/icons/emotion-on-a-face/600/8-512.png";
    function slika($plate, $adresa1, $adresa2){
        $br=0;
        foreach($plate as $p){
            if($p>=prosecna($plate)){
                $br++;
            }
        }
        if($br>(count($plate)/2)){
            echo "<img src='$adresa1'>";
        }else{
            echo "<img src='$adresa2'>";
        }
    }
    
    slika($plate, $adresa1, $adresa2);

?>