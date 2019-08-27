<?php
    session_start();

    require_once 'mrezaKonekcija.php';

    if(!isset($_SESSION['id'])){
        // da mora da se loguje ukoliko nije ulogovan, tera na login stranicu
        header('Location: mrezaLogin.php');
    }
    // korinik kad se ulogovao, sad imamo njegov id u sesiji i uzimamo ga na sledeci nacin, svuda promeni
    $id=$_SESSION['id'];

    if(!empty($_GET['brisi'])){
        $pid = $conn->real_escape_string($_GET['brisi']);
        $sql = "SELECT * FROM prijatelji WHERE korisnik_id=$id AND prijatelj_id=$pid";
        // die($sql);proverava da li je dobar upit, za proveru kad ne radi
        $result= $conn->query($sql);

        if($result->num_rows>0){
            $sql1="DELETE FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
            $result1=$conn->query($sql1);
        }//end-if unutrasnji
            header('Location: mrezaPrijateljiTabela.php');//redirekcija za tabelu
           // header('Location: mrezaPrijateljiLista.php');//redirekcija za listu
    }//end-if spoljanji

?>