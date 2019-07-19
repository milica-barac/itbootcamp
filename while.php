<html>
    <head>
    <style>
        .blue{
            color:blue;
        }
        .yellow{
            color:yellow;
        }
        .red{
            color:red;
        }
    </style>

        
    </head>
    <body>
        

<?php
    // Ispisati brojeve od 1 do 10
    $i=1;
    while($i<=10){
        echo "$i <hr>";
        $i++;
    }
    /*drugi nacini
    $i=0;
    while($i<10){
        $i++;
        echo "$i <hr>";
    }

    $i=0;
    while($i<=11){
        $i++;
        echo "$i <hr>";
    }
    */
    // 1. Ispisati brojeve od 1 do 20.
    $i=1;
    while($i<=20){
        echo "$i  ";
        $i++;
    }
    echo "<hr>";
    // 2. ispisati brojeve od 20 do 1.
    $i=20;
    while($i>=1){
        echo "$i  ";
        $i--;
    }
    echo "<hr>";

    //drugi nacin komplikovan bez razloga
    $i=0;
    while($i < 20){
        echo 20 - $i;
        echo "<br>";
        $i++;
    }
    echo "<hr>";

    // 3. ispitati parne brojeve od 1 do 20
    $i=1;
        while($i<=20){
            if($i%2==0){
                echo "$i  ";
            }
            $i++;
        }
        echo "<hr>";

    //bez if grananja, bez provere da li je paran broj
    $i=2;
        while($i<=20){
                echo "$i  <br>";
                $i= $i+2;
            }
    
        echo "<hr>";
    

    // 4. odrediti kolicnik i ostatak pri deljenju brojeva a sa b bez koriscenja operacija / i %.
        $a=82;
        $b=8;
        $kol = 0;
        $ost = $a;
        while($ost>=$b){
            $ost = $ost - $b;
            $kol++;
        }
        echo "$a = $kol * $b + $ost";
        echo "<hr>";

    // 5. sest paragrafa naizmenicno obojiti sa tri raclicite boje
        $paragraf="Ovo je paragraf, nesto treba da pise u njemu";
        $i=0;
        while($i<6){
            if($i%3==1){
                //1 i 4
                echo "<p class='blue'>$paragraf</p>";
            }elseif($i%3==2){
                //2 i 5
                echo "<p class='yellow'>$paragraf</p>";
            }else{
                echo "<p class='red'>$paragraf</p>";
            }   
            $i++;
        }
        // }

    // 6. Odrediti sumu brojeva od 1 do 100
    $i=1;
    $sum = 0;
    while($i<=100){
        // $sum = $zbir + $i;
        $sum += $i; //cuvamo prethodnu sumu i dodajemo svako novo i
        $i++;
    }
    echo "<hr>Suma brojeva od 1 do 100 je: $sum<hr>";
    
    // 7. Odrediti sumu brojeva od 1 do n
    $i=1;
    $n = 10;
    $sum = 0;
    while($i<=$n){
        // $suma = $suma + $i;
        $sum += $i;
        $i++;
    }
    echo "Suma brojeva od 1 do $n je: $sum <hr>";

    // 8. Odrediti sumu brojeva od n do m
    $n = 5;
    $m = 10;
    $sum = 0;//pocetna suma kad se sabira
    if($n<$m){
        $i = $n;
        while($i <= $m){
            $sum += $i;
            $i++;
        }
    }else{
        $i = $m;
        while($i <= $n){
            $sum += $i;
            $i++;
        }
    }
    echo "Suma brojeva od $n do $m je: $sum <hr>";


    // 9. Odrediti proizvod brojeva od n do m
    //uradi ako je m manje od n
    $n = 5;
    $i = $n;
    $m = 10;
    $pro = 1;//pocetna vrednost proizvoda
    while($i <= $m){
        $pro *= $i;
        $i++;
    }
    echo "Proizvod brojeva od $n do $m je: $pro <hr>";

    // 10. Odrediti sumu kvadrata brojeva od n do m
    $n = 2;
    $i = $n;
    $m = 4;
    $sum = 0;
    while($i <= $m){
        // $sum += $i**2; za kvadriranje umesto ^2
        // $suma += pow($i, 2); - ugradjena funkcija za kvadriranje
        $sum += $i*$i;
        $i++;
    }
    echo "Proizvod brojeva od $n do $m je: $sum <hr>";

?>

</body>
</html>