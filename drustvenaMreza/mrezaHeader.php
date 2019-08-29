<?php
    // svuda na pocetku session_start();
    session_start();

    require_once 'mrezaKonekcija.php';

    // Podesavanje id logovanog korisnika, sa sad rucno unosimo
    //$id=1; //ovde se posle menja kada sacuvamo u sesiji, za sada unosimo rucno, za testiranje se vracamo na ovu liniju!
    // proveravamo da li je ulogovan korisnik
    if(!isset($_SESSION['id'])){
        // da mora da se loguje ukoliko nije ulogovan, tera na login stranicu
        header('Location: mrezaLogin.php');
    }
    // korinik kad se ulogovao, sad imamo njegov id u sesiji i uzimamo ga na sledeci nacin, svuda promeni
    $id=$_SESSION['id'];
    // ovo sam ja
?>

<html>
    <head>
        <!-- ovde uvozimo css -->
        <link rel="stylesheet" type="text/css" href="sredjivanjePhpSqlListeTabele.css">
    </head>
    <body background="videoblocks-triangle-polygon.png">
        <!-- menu -->
        <ul class="navBar">
            <li><a href='index.php'>Home</a></li>
            <li><a href='mrezaPrijateljiTabela.php'>Friends</a></li>
        <!-- <li><a href='mrezaPrijateljiLista.php'>Prijatelji</a></li> -->
            <li><a href='mrezaForma.php'>Edit</a></li>
            <li><a href='mrezaIzmeniSifru.php'>Change password</a></li>
            <li><a href='mrezaProfil.php'>Profil</a></li>
            <li><a href='mrezaLogout.php'>Logout</a></li>
        </ul>
        <br>

        <!-- NE ZATVARAMO body i html TAGOVE!!! -->