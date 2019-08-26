<?php
// nema potrebe da se vezujemo na bazu, sesija je nezavisno postoji i bez baze
    // logout da ne bi morali da gasimo browser
    session_start();

    // ako je sesija setovana, ispitamo
    if(isset($_SESSION['id'])){
        // unistimo sesiju
        session_unset();
        session_destroy();
        header('Location: mrezaLogin.php');//redirekcija kad se unisti sesija, na login stranicu
    }

?>