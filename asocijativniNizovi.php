<?php
/*
    1. Dat je niz elemenata u obliku MarkaAuta/Godiste. Ispisati sve automobile, kao i njihova godista. 
    Ispisati automobile koji su stariji od 10 godina. Ispisati automobili cija Marka sadrzi string "Opel", 
    a proizvedena su posle 2000.
*/

    $automobili = array ("Audi TT" => 2018, "Opel Vektra" => 2001, "BMW X6" => 2007, "Opel Astra" => 1996);
    foreach($automobili as $marka => $godiste){
        echo "Automobil " . $marka ." proizveden: ". $godiste . " godine <br>";
    }
    echo "<hr>";

    foreach($automobili as $marka => $godiste){
        if(date("Y")-$godiste>=10){
            echo "Stariji od 10 godina je: " . $marka. "<br>";     
        }
    }
    echo "<hr>";
    //uradi za opel preko str funkcije koja vraca string ne poziciju
    foreach($automobili as $marka => $godiste){
        if($marka == "Opel" && $godiste>2000){
            echo "Automobil " . $marka ." giste: ". $godiste . " <br>";
        }
    }
    echo "<hr>";

    // 2. Dat je niz elemenata u obliku ImeOsobe/Visina.Ispisati sve osobe sa njihovim visinama.
    // Ispisati sve natprosečno visoke osobe. Ispisati sve osobe koje imaju maksimalnu visinu.
    // Ispisati sve osobe sa visinom ispod proseka, a čije ime počinje na slovo 'V'.

    $niz = array ("Milica" => "164", "Nikolina" => "180", "Pera" => "180", "Jelena" => "174");
    foreach($niz as $ime => $visina){
        echo $ime . " je visoka " . $visina . " cm<br>";
    }
    echo "<hr>";
    //natprosecno visoke
    $suma=0;
    foreach($niz as $ime => $visina){
        $suma += $visina;
    }
    $prosek = $suma/count($niz);
    echo "Prosecna visina je: $prosek<br>";
    echo "<hr>";
    // visina iznad proseka
    foreach($niz as $ime => $visina){
        if($visina>$prosek){
            echo "Osoba koja je visoka iznad proseka je: " . $ime . " , njena visina je " . $visina . " cm<br>";
        }
    }
    echo "<hr>";


    $max = 0;
    foreach($niz as $ime => $visina){
        if($max<$visina){
            $max=$visina;
        }
    }
    foreach($niz as $ime => $visina){
        if($max<$visina){
            $max=$visina;
        }
    }
    echo "Najvisa visina $max<br>";
    foreach($niz as $ime => $visina){
        if($max==$visina){
            echo "Osoba $ime je visoka $visina cm <br>";
            break; //ako hocemo samo da nam ispise prvi element niza koji nadje da je jednak maksimalnoj vrednosti
            //  i da ne ispisuje ostale, npr dve najvise osobe imaju istu visinu Pera i Jelena da ispise samo jednu
            // na koju prvu naidje u nizu
        }
    }
    echo "<hr>";
?>