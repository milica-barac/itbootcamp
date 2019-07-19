
<?php
    $godRodj = 1994;
    $pol = "m";
    $tezina = 46;
    $visina = 173;
    $visinaM = ($visina / 100);
    
    $BMI = $tezina / ($visinaM*$visinaM);
    

    if($pol == "Z"){
        echo "<img src='https://www.clipartmax.com/png/middle/5-55403_blank-avatar-profile-pic-icon-female.png' width=400px><hr>";
    }else{
        echo "<img src='https://cdn3.iconfinder.com/data/icons/user-icon-3-1/100/user_3_Artboard_1-512.png' width=400px><hr>";
    }

    $godine = date('Y') - $godRodj;
    echo "Godine: $godine <hr>";
    echo "BMI index: $BMI <hr>";

    if($BMI<18.5){
        echo "Kategorija: Pothranjena.";
    }elseif($BMI>=18.5 && $BMI<24.9){
        echo "Kategorija: Normalna tezina.";
    }elseif($BMI>=25.0 && $BMI<=29.9){
        echo "Kategorija: Povisena tezina.";
    }else{
        echo "Kategorija: Gojaznost.";
    }
    echo "<hr>";

    echo "Visina u cm: $visina => visina u m: $visinaM";
?>