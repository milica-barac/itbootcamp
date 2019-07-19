<?php


	echo "Zdravo svete!!! <br>";

	echo"<br>";	
	$x=3;
	echo $x."<br>";
	$y=5;
	echo $y;
	echo "<br>";
	$z="tralalal";
	$q=4;
	echo $q;
	echo "<br>";
	$h=($q+$x)*$y;
	echo "<br>";
	echo $h;
	echo "<br><br>Zamena x i y-brojcanih vrednosti:";
	$z=$x;
	$x=$y;
	$y=$z;
	echo "$x, $y, $z";


	echo "<br><br>Zamena x i y String vrednosti:<br>";
	$x="crni";
	$y="zuti";
	echo $x." , ".$y."<br>";
	$z=$x;// $z je crni
	echo "$x , $y , $z <br>";
	$x=$y;// $x je zuti
	echo $x." , ".$y." , ".$z."<br>";
	$y=$z;// $y je crni
	echo $x." , ".$y." , ".$z."<br>";
	// echo "<br> $x, $y, $z <br>";

	echo "<br>";
	$x=5;//x=5
	$x=2*$x;//x-10
	$y=$x + $x;//y-20
	// $rez=$x+(int)$y;
	$rez=$x+$y;//rez=30
	echo "$rez";

	// 1. Za umetu cenu robe i kolicinu novca koji je kupac 
	// dao, ispisati koliki kusur treba kasirka da vrati 
	// kupcu
	echo "<br>";
	$cena=100;
	$uplata="500";//konvertuje u brojcanu vrednost int
	$kusur=$uplata-$cena;
	echo $kusur;

	/*4. iz celzijusa u farenhajte*/
	echo "<br>";
	$c=30;
	$f=$c*9/5+32;
	echo $f;

	/*5. iz far u cel*/
	echo "<br>";
	$far=86;
	$cel=($far-32)*5/9;
	echo $cel;


	/*Za preuzeto vreme u satima i minutima izracunati koliko 
	je minuta proslo od ponoci*/
	echo "<br>";
	$sati=13;
	$minuta=49;
	$ukupnoMinuta=$sati*60+$minuta;
	echo $ukupnoMinuta;

	/*druga varijanta*/
	// date("format")-vraca trenutni datum i vreme u odredjenom formatu
	// format = "G" - 24h-vreme(0 - 23)
	// format = "g" - 12h - vreme (0-11)
	// format = "H" - 24h - vreme (00-23)
	// format = "h" - 12h-vreme (00-11)	
	// format = "i" - (00-59)
	echo "<br>";
	$sati = date("G");
	$minuti = date("i");
	$ukupnoMinuta = $sati*60 + $minuti;
	echo $ukupnoMinuta;
	echo "<br>";

?>

