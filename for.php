<?php
    //URADITI PRVIH 8 ZADATAKA I PREKO WHILE-A

    // Ispisati brojeve od 5 do 50:
    for($i=5; $i<=50; $i++){
        echo "$i ";
    }
        echo"<hr>";
    
    
    //1. ispisati brojeve od 1 do 20
    for($i=1; $i<=20; $i++){
        echo "$i ";
    }
        echo"<hr>";

    //2. ispisati brojeve od 20 do 1
    for($i=20; $i>0; $i--){
        echo "$i ";
    }
        echo"<hr>";

    //3. ispisati parne brojeve od 1 do 20
    for($i=2; $i<=20; $i++){
        if($i%2==0){
            echo "$i ";
        }
    }
        echo"<hr>";

    //drugi nacin $i+=2 ili $i = $i + 2;
    for($i=2; $i<=20; $i+=2){
        echo "$i ";
    }
        echo"<hr>";

    // 4. Ispisati dvostruku vrednost brojeva od 5 do 15
    for($i=5; $i<=15; $i++){
            echo 2*$i." ";
            // moze i u paragrafima echo "<p>". 2*$i ."</p>";
    }
        echo"<hr>";
        
    // 5. Odrediti sumu brojeva od 1 do 100
    $sum = 0;//neutral za sabiranje, sta god da saberete sa 0 dobijete taj broj
    for($i=1; $i<=100; $i++){
        $sum += $i;
    }
    echo "$sum<hr>";

    // 6. Odrediti sumu brojeva od 1 do n
    $n=25;
    $sum = 0;
    for($i=1; $i<=$n; $i++){
        // $s = $s + $i;
        $sum += $i;
        //da zelimo da izbrisemo svaki put kad saberemo, ovde bi pisali sumu
    }
    //zelimo da ispisemo samo krajnju sumu
    echo "$sum <hr>";
    
    // 7. Odrediti sumu brojeva od n do m
    $n=25;
    $m=32;
    $sum = 0;
    for($i=$n; $i<=$m; $i++){
        $sum += $i;
    }
    echo "$sum <hr>";
    
    // 8. Odrediti proizvod brojeva od n do m
    $n=3;
    $m=6;
    // $i = $n;
    $proizvod = 1;//neutral za mnozenje je 1, bilo koji broj pomnoziti sa 1 dobijamo taj broj
    for($i=$n; $i<=$m; $i++){
        // $p =  $p * $i;
        $proizvod *= $i;
    }
    echo "$proizvod <hr>";
    
    // DODATAK FAKTORIJEL
    $x = 5;
    $p = 1;
    for($i=$x; $i>=1; $i--){
        $p *= $i;
    }
    echo "$p <hr>";

    // 9. Odrediti sumu kvadrata brojeva od n do m
    $sum=0;
    $n=1;
    $m=5;
    for($i=$n; $i<=$m; $i++){
        $sum += $i**2;
    }
    echo "$sum<hr>";

    // 10. Preuzeti sa interneta tri slike i imenovati ih 1, 2 ,3. For petljom u HTML-u ispisati svaku od slicica uz pomoc brojaca(iteratora).
    for($i=1; $i<=3; $i++){
        echo "<img src='$i.png' width=200>";
    }
    echo "<hr>";
    
    // 11. Sabrati sve brojeve deljive sa 9 u intervalu od 1 do 30
    $sum=0;
    for($i=1; $i<=30; $i++){
        if($i%9==0){
            $sum += $i;
        }
    }
    echo "$sum<hr>";
    
    // 12. Odrediti proizvod svih brojeva deljivih sa 22 u intervalu od 20 do 100
    $p=1;
    for($i=20; $i<=100; $i++){
        if($i%11==0){
            $p *= $i;
        }
    }
    echo "$p<hr>";

    // 13.Prebrojati koliko ima brojeva deljiv sa 13 u intervalu od 5 do 150.
    $brojac=0;
    for($i=5; $i<=150; $i++){
        if($i%13==0){
            $brojac++;
            // $br+=1; drigi nacini da se napise
            // $br=$br+1;
        }
    } 
    echo "$brojac<hr>";

    // 14. Ispisati aritmeticku sredinu brojeva od n do m
    $n=7;
    $m=12;
    $sum=0;
    //$br=0;
    for($i=$n; $i<=$m; $i++){
        $sum += $i;   
        //$br++;     
    }
    echo $sum/($i-$n) . "<hr>";
    // echo $sum/($m-$n+1) . "<hr>";

    // 15. Prebrojati koliko brojeva od n do m je pozitivno, a koliko njih negativno
    $n=5;
    $m=-15;
    $neg=0;
    $pos=0;
    if($n<$m){
        for($i=$n; $i<=$m; $i++){
            if($i<0){
                $neg++;
            }else{
                $pos++;
            }
        }
    }else{
        for($i=$m; $i<=$n; $i++){
            if($i<0){
                $neg++;
            }else{
                $pos++;
            }
        }
    }
    echo "Broj negativnih brojeva je: $neg, a broj pozitivnih je: $pos<hr>";

    // 16. Prebrojati koliko je brojeva od 5 do 50 koji su deljivi sa 3 ili sa 5.
    $br=0;
    for($i=5; $i<=50; $i++){
        if($i%3==0 || $i%5==0){
            $br++;
        }
    }
    echo "$br<hr>";

    // 17. Prebrojati i izračunati sumu brojeva od n do m kojima je poslednja cifra 4 i parni su.
    $n=8;
    $m=98;
    $br=0;
    //$pos=$i%10;
    for($i=$n; $i<=$m; $i++){
        if($i%10==4){
            $sum+=$i;
            $br++;
        }
    }
    echo "Suma je: $sum, a broj: $br <hr>";

    //18. Ispisati brojeve od n do m, koji su deljivi sa a.
    $n=9;
    $m=87;
    $a=3;
    $br=0;
    for($i=$n; $i<=$m; $i++){
        if($i%$a==0){
            echo "$i ";
        }
    }
    echo "<hr>";

    // 19. Ispisati brojeve od n do m koji nisu deljivi sa a
    $n=9;
    $m=17;
    $a=3;
    $br=0;
    for($i=$n; $i<=$m; $i++){
        if($i%$a!=0){
            echo "$i ";
        }
    }
    echo "<hr>";

    // 20. Odrediti sumu brojeva od n do m koji su nisu deljivi brojem a
    $n=8;
    $m=13;
    $a=4;
    $sum=0;
    for($i=$n; $i<=$m; $i++){
        if($i%$a!=0){
            $sum += $i;
        }
    }
    echo "$sum <hr>";

    // 21. Odrediti proizvod brojeva od n do m koji su deljivi brojem a
    $n=7;
    $m=15;
    $a=5;
    $pr=1;
    for($i=$n; $i<=$m; $i++){
        if($i%$a==0){
            $pr *= $i;
            // $pro = $pro * $i;
        }
    }
    echo "$pr <hr>";

?>