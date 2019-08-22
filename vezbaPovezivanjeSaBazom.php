<?php
    $servername="localhost";
    $username="admin";
    $password="admin1234";
    $database="mreza";

    $conn=new mysqli($servername,$username,$password,$database);

    if($conn->connect_error){
        die("Neuspela konekcija. Razlog: " . $conn->connect_error);
    }

    $conn->set_charset('utf8');

    $id=1;

    // if(!empty($_GET['id']))
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="sredjivanjePhpSqlListeTabele.css">
    </head>
    <body>
        <?php
        $sql = "SELECT k.id AS ID, p.ime AS Ime, p.prezime AS Prezime, p.pol AS Pol, k.username AS `Korisnicko ime` FROM korisnici AS k INNER JOIN profili AS p ON k.id = p.korisnik_id WHERE k.id != $id ORDER BY ime, prezime";

        $result=$conn->query($sql);

        if(!$result){
            echo "Greska pri izvrsavanju upita. Razlog: " . $conn->error;
        }else{
            if($result->num_rows==0){
                echo "Nema korisnika u bazi";
            }else{
                echo "<p>Korisnici: </p>";
                echo "<table class=pac>";
                echo "<tr><th>Ime</th><th>Prezime</th><th>Korisnicko ime</th><th>Svojstvo</th><th>Dodaj</th></tr>";
                while($red=$result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $red["Ime"] . "</td>";
                    echo "<td>" . $red["Prezime"] . "</td>";
                    if($red["Pol"]=="z"){
                        echo "<td style='color:red'>" . $red["Korisnicko ime"] . "</td>";
                    }elseif($red["Pol"]=="m"){
                        echo "<td style='color:blue'>" . $red["Korisnicko ime"] . "</td>";
                    }
                    
                    $pid = $red["ID"];

                    $sql1= "SELECT * FROM prijatelji WHERE korisnik_id=$id AND prijatelj_id=$pid";
                    $result1=$conn->query($sql1);
                    $jaTebe=$result->num_rows;

                    $sql2 = "SELECT * FROM prijatelji WHERE korisnik_id=$pid AND prijatelj_id=$id";
                    $result2=$conn->query($sql2);
                    $tiMene=$result2->num_rows;
                    echo "<td>";

//GRESKA IZBACUJE SVUDA OBOSTRANO PRACENJE

                    if($jaTebe + $tiMene > 1){
                        echo "Obostrano pracenje";
                    }elseif($jaTebe){
                        echo "Pratim korisnika";
                    }elseif($tiMene){
                        echo "Korisnik prati mene";
                    }else{
                        echo "Nema veze";
                    }
                    echo "</td>";

                    echo "<td>";
                    echo "<a href='mrezaDodaj.php?dodaj=$pid'>Prati korisnika</a>";
                    echo "</td>";

                    echo "</tr>";

                }
                echo "</table>";
            }
        }
        ?> 
    </body>    
</html>

