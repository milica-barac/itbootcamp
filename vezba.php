<html>
    <head>
    <style>
    
    </style>
    </head>
    <body>
    <?php
    /* Data je slika sa svojom putanjom i imenom. Prikazati datu sliku na veb stranici. */
    // Ubacimo sliku u htdocs napravimo folder images
    $putanja = "images/wwf.png";
    echo "<img src='$putanja'>";

    /*Zadatak: Za radnika je poznato broj radnih sati u mesecu, cena rada po satu, kao u procenat odbijanja na osnovu doprinosa. 
    Odrediti bruto i neto dohodak radnika */
    $brojSati=160;
    $cena = 5;
    $procenat = 65;
    $bruto = $brojSati*$cena;
    $neto = $bruto - $bruto * $procenat / 100;
    echo "<p>Bruto zarada: $bruto &euro;<br>
    Neto zarada: $neto &euro;</p>";

    /*Broj minuta, pretvoriti u sate i minute*/
    $brojMinuta=563;
    $sati = (int)($brojMinuta / 60);
    $minuti = $brojMinuta % 60;
    echo "<p>Broj sati: $sati, broj minuta: $minuti.</p>";

    /*Ako je vrednost neke robe x dinara, odrediti najmanju kolicinu novcanica od 500 dinara, 100 dinara, 10 dinara i 1 dinar, kojima se 
    moze platiti data roba.*/
    $x = 4689;//cena haljine
    $petsto = (int)($x / 500);//koliko celih 500 ima u x
    $x = $x % 500;//sa desna na levo podeli sa pedsto, pa 399 smesti u novo x
    $sto = (int)($x / 100);//koliko ima 100 u ostatku x
    $x = $x % 100;//ostatak smestamo u novi x, dobijamo ga preko modula
    $deset = (int)($x / 10);//(int da bi bio ceo broj)
    $dinar = $x % 10;//moduo 10 ya ostatak u dinaricicima
    echo "<p>Petsto: $petsto,
    Sto: $sto, 
    Deset: $deset, 
    Jedan: $dinar</p>";

    



    ?>
    <!-- ne moze navodnici unutar navodnika, kad imamo dvostruke unutar njih idu jednostruki navodnici -->
    <!-- <input type="submit" onclick="alert('')"> -->
    </body>
</html>
