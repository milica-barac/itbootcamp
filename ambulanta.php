<?php
        $servername="localhost";
        $username = "root";
        $password = "";
        $database = "ambulanta";
    
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        if(!$conn){
            die("Neuspela konekcija. Razlog: " . mysqli_connect_error());
        }
    
        mysqli_set_charset($conn, "utf8");

        $sql = "SELECT ime, prezime, visina, tezina, god_rodjenja FROM pacijenti ORDER BY visina DESC";
        $sql .= "SELECT ime, prezime, visina, tezina, god_rodjenja FROM pacijenti ORDER BY tezina DESC";
        $sql .= "SELECT ime, prezime, visina, tezina, god_rodjenja FROM pacijenti ORDER BY god_rodjenja DESC";
        
        
        if(mysqli_query($conn, $sql)!=FALSE){
            echo "Uspesno dodavanje reda u tabelu!";
        }else{
            echo "Desila se greska: ";
            echo mysqli_error($conn);
        }
    
        echo "Uspesna konekcija! :) ";

?>