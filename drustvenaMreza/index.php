<?php
    session_start();
    
    require_once 'mrezaKonekcija.php';

    if(!isset($_SESSION['id'])){
        // da mora da se loguje ukoliko nije ulogovan, tera na login stranicu
        header('Location: mrezaLogin.php');
    }
    // korinik kad se ulogovao, sad imamo njegov id u sesiji i uzimamo ga na sledeci nacin, svuda promeni
    $id=$_SESSION['id'];
?>

<html>

    <head>
        <link rel="stylesheet" type="text/css" href="sredjivanjePhpSqlListeTabele.css">
    </head>

    <body>
        <h1>Home page</h1>
        <ul class="navBar">
            <li><a href='index.php'>Home</a></li>
            <!-- <li><a href='mrezaPrijateljiLista.php'>Prijatelji</a></li> -->
            <li><a href='mrezaPrijateljiTabela.php'>Friends</a></li>
            <li><a href='mrezaForma.php'>Edit</a></li>
            <li><a href='mrezaLogout.php'>Logout</a></li>
        </ul>
    </body>
</html>