<?php
    session_start();

    require_once 'mrezaKonekcija.php';

    if(!isset($_SESSION['id'])){
        // da mora da se loguje ukoliko nije ulogovan, tera na login stranicu
        header('Location: mrezaLogin.php');
    }
    // korinik kad se ulogovao, sad imamo njegov id u sesiji i uzimamo ga na sledeci nacin, svuda promeni
    $id=$_SESSION['id'];

    if(!empty($_GET['dodaj'])){
        // priprema parametar za sql upit, da ne moze da kuca svasta u url
        $pid = $conn->real_escape_string($_GET['dodaj']);
        //$id - onaj koji salje zahtev
        //$pid - onaj koji prima zahtev

        // Provera da li pracenje postoji
        $sql = "SELECT * FROM prijatelji WHERE korisnik_id=$id AND prijatelj_id=$pid";
        $result = $conn->query($sql);//izvrsavanje upita

        // , mora prvo da se ispita da li postoji red
        if($result->num_rows==0){
            //Dodaje se pracenje tek kada ne postoji
            $sql1="INSERT INTO prijatelji
            (korisnik_id, prijatelj_id) 
            VALUE ($id, $pid)";
            $result = $conn->query($sql1);
        }// end-if prvi(unutrasnji)
        // redirekcija, sa jedne na drugu stranicu, menja se u odnosu da li zelimo listu ili tabelu
        header('Location: mrezaPrijateljiTabela.php'); //za tabelu
        //header('Location: mrezaPrijateljiLista.php'); za listu
    }//end-if (spoljasnji)

?>