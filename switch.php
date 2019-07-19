<?php
    $boja="crvena";

    switch($boja){
        case "crvena":
        echo "Odabrali ste crvenu boju!";
        break;
        case "crvena":
        echo "Odabrali ste plavu boju!";
        break;
        case "crvena":
        echo "Odabrali ste zelenu boju!";
        break;
        default:
        echo "Niste odabrali crvenu, plavu i zelenu boju!";
    }
    echo "<hr>";

    // 1. Za unteri redni broj dana ispisati koji je to dan u nedelji(1.dan je ponedeljak).
    
    //moze i sa date("N") , a sa date("d");-vraca prva tri slova pa u case pisemo sa prvim velikim tipa Mon. . .
    $dan=date("w");
    switch($dan){
        case 1:
        echo "Ponedeljak!";
        break;
        case 2:
        echo "Utorak!";
        break;
        case 3:
        echo "Sreda!";
        break;
        case 4:
        echo "Cetvrtak!";
        break;
        case 5:
        echo "Petak!";
        break;
        case 6:
        echo "Subota!";
        break;
        case 7:
        echo "Nedelja!";
        break;
        default:
        echo " Funkcija date() baguje!";
    }
    echo "<hr>";

    // 2. Za unetu numericku ocenu ucenika ispisati njegovu opisnu ocenu.

    $ocena = 5;

    switch($ocena){
        case 1:
        echo "Nedovoljan!";
        break;
        case 2:
        echo "Dovoljan!";
        break;
        case 3:
        echo "Dobar!";
        break;
        case 4:
        echo "Vrlo dobar!";
        break;
        case 5:
        echo "Odlican!";
        break;
    }
    echo "<hr>";

    // 3. Za uneti paran broj manji od 10 ispitati da li je uneti broj nula, dvojka, cetvorka, sestica, osmica ili je unos pogresan.

    $broj=10;
    if($broj%2==0){
        switch($broj){
            case 0:
            echo "Nula!";
            break;
            case 2:
            echo "Dvojka!";
            break;
            case 4:
            echo "Cetvorka!";
            break;
            case 6:
            echo "Sestica!";
            break;
            case 8:
            echo "Osmica!";
            break;
            default:
            echo "Pogresan unos, broj veci od 10.";
        }
    }else{
        echo "Neparan broj.";
    }
    echo "<hr>";

    // 4. Za uneta dva broja i karakter napraviti kalkulator koji vrsi mnozenje ta dva broja ukoliko je uneto slovo 'm', deljenje ukoliko je uneto slovo 'd', sabiranje ukoliko je uneto slovo 's' izvrsiti sabiranje, a za slovo 'o oduzimanje'. 
    $op = "m";
    $br1=5;
    $br2=99;
    switch($op){
        case "m":
        case "M":
            $rez = $br1 * $br2;
            break;
        case "s":
        case "S":
            $rez = $br1 + $br2;
            break;
        case "d":
        case "D":
            $rez = $br1 / $br2;
            break;
        case "o":
        case "O":
            $rez = $br1 - $br2;
            break;
        default:
            $rez = 0;
            echo "Pogresan unos!";
    }
    echo "$rez <hr>";

    // 5. Za preuzeti dan sa racunara ispisati jos koliko dana je preostalo do vikenda.
    $dan=date("N");
    switch($dan){
        case 1:
        echo "Ostalo je jos:".(5-$dan);
        break;
        case 2:
        echo "Ostalo je jos:".(5-$dan);
        break;
        case 3:
        echo "Ostalo je jos:".(5-$dan);
        break;
        case 4:
        echo "Ostalo je jos:".(5-$dan);
        break;
        case 5:
        echo "Sutra pocinje vikend!";
        break;
        case 6:
        echo "Prvi dan vikenda";
        break;
        case 7:
        echo "Poslednji dan vikenda.";
        break;
        default:
        echo " Ne znam sto se ovaj zadatak radi sa switch-om.";
    }
    echo "<hr>";

    // 6. Preuzeti redni broj meseca sa racunara i ispisati koji je to mesec u godini.

    // 7. Preuzeti redni broj meseca sa racunara i ispisati koliko taj mesec ima dana. Ukoliko je u pitanju mesec februar, preuzeti i godinu sa racunara, ispitati  da li je godina prestupna i na osnovu toga ispisati broj dana meseca februara.
    
    // 8. Na osnovu unete boje na engleskom jeziku obojiti tekst paragrafa u crveno, zeleno ili plavo. Ukoliko nije uneta ni jedna od ove tri boje, tekst paragrafa obojiti u zuto.



?>