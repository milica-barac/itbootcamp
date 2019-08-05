<?php
    $servername="localhost";
    $username = "root";
    $password = "";
    $database = "itbootcamp";

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if(!$conn){
        die("Neuspela konekcija. Razlog: " . mysqli_connect_error());
    }

    echo "Uspesna konekcija! :) ";
?>