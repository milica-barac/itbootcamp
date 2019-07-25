<?php
    function stampajFor($niz){
        for($i=0; $i<count($niz); $i++){
            echo $niz[$i] . "\n";
        }
        echo "<hr>";
    }

    function stampajForeach($niz){
        foreach($niz as $kljuc=>$vrednost){
            echo "Kljuc: $kljuc, vrednost: $vrednost<br>";
        }
        echo "<hr>";
    }

    $brojevi= array(3,5,7,1);
    sort($brojevi);
    stampajForeach($brojevi);

    rsort($brojevi);
    stampajFor($brojevi);

    $imena= array("Pera","Mika","Zika","Jova");
    sort($imena);
    stampajFor($imena);

    rsort($imena);
    stampajFor($imena);

    $asocijativni=array("Milica"=>"24", "Rade"=>"27", "Tanja"=>"53");
    asort($asocijativni);
    stampajForeach($asocijativni);

    ksort($asocijativni);
    stampajForeach($asocijativni);
    
    arsort($asocijativni);
    stampajForeach($asocijativni);
    
    krsort($asocijativni);
    stampajForeach($asocijativni);
    
    /*Napraviti asocijativni niz boja gde ce kljuc biti heksadecimalna vrednost boje, a vrednost odgovarajuci naziv boje. Na primer za crvenu
    boju kljuc ce biti #FF0000, a vrednost ce biti red. Ovako zadat niz sortirati:
    -rastuce u odnosu na heksadecimalni kod;
    -opadajuce u odnosu na heksadec. kod;
    -rastuce u odnosu na naziv;
    -opadajuce u odnosu na naziv.
    */
    $aBoje=array("#FF0000"=>"red","#00FF00"=>"green","#0000FF"=>"blue");
    echo "Rastuce u odnosu na heksadecimalni kod:<br>";
    ksort($aBoje);
    stampajForeach($aBoje);

    echo "Opadajuce u odnosu na heksadecimalni kod:<br>";
    krsort($aBoje);
    stampajForeach($aBoje);

    echo "Rastuce u odnosu na naziv:<br>";
    asort($aBoje);
    stampajForeach($aBoje);

    echo "Opadajuce u odnosu na naziv:<br>";
    arsort($aBoje);
    stampajForeach($aBoje);

?>