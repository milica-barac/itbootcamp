<?php
    $servername="localhost";
    $username="admin";
    $password="admin1234";
    $database="mreza";

    $conn=new mysqli($servername,$username,$password,$database);

    if($conn->connect_error){
        die("Neuspela konekcija. Razlog: " . $conn->connect_error);
    }

    $id=1;

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
        // redirekcija, sa jedne na drugu stranicu
        header('Location: mrezaPrijatelji.php');//promeni redirekciju, ako hoces da radi za tabelu ili za listu
    }//end-if (spoljasnji)

?>