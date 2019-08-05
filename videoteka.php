<?php
        $servername="localhost";
        $username = "admin";
        $password = "admin123";
        $database = "videoteka";
    
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        if(!$conn){
            die("Neuspela konekcija. Razlog: " . mysqli_connect_error());
        }
    
        mysqli_set_charset($conn, "utf8");
    
        $sql = "INSERT INTO filmovi VALUES(7, 'Zikina dinastija 2', 'Zoran Calić', 1980, 'Komedija', '7.3')";
        
        
        if(mysqli_query($conn, $sql)!=FALSE){
            echo "Uspesno dodavanje reda u tabelu!";
        }else{
            echo "Desila se greska: ";
            echo mysqli_error($conn);
        }
    
        echo "Uspesna konekcija! :) ";
?>