<!-- 1. Zadatak (40 poena) 
Napaviti stranicu kao sa sledeće slike, koja ispunjava zahteve:
➢ Pozadinska boja stranice je siva sa heksadecimalnim kodom #cfcfcf
➢ Font teksta je Arial, podebljan je, veličina je 22px i plavo je obojen
➢ Padding u odnosu na levu ivicu je 30px, a u odnosu na gornju ivicu je 40px.
➢ Sliku sa transparentnom pozadinom preuzeti sa interneta i postaviti joj širinu 250px.
➢ Napraviti formu koristi metod GET i koja sadržii:
○ Dva input polja u koja se unose numeričke vrednosti u kojima je
podrazumevana vrednsot 0
○ Četiri radio dugmeta: saberi, oduzmi, pomnoži i podeli, gde je
podrazumevano označena opcija za sabiranje
○ Dugme za izračunavanje
➢ Kada se u polje Broj A i u polje broj B unese vrednost, odabere operacija i klikne na
dugme Izračunaj, ispod dugmeta treba da se prikaže rezultat računanja
➢ Naslov i rezultat (koji je takođe naslov) obojiti crvenom bojom -->

<html>
    <head>
        <style>
            body{
                background-color:#cfcfcf;
                font-family: Arial;
                font-weight: bold;
                font-size: 22px;
                color: blue;
                padding-left: 30px;
                padding-top: 40px;
            }
            h1{
                color:red;
            }
            img{
                weight: 250px;
                height: 250px;
            }


        </style>
    </head>
    <body>
        <h1>Izracunajte . . .</h1><br>
        <img src="http://pluspng.com/img-png/maths-hd-png-open-2000.png" alt="">
        <br>
        <form action="index.php" method="get">
        <label>Broj A = </label>
        <input type="number" name="a" value=0><br><br>
        <label>Broj B = </label>
        <input type="number" name="b" value=0><br><br>
        <input type="radio" name="operacija" value="Saberi" checked>Saberi <br>
        <input type="radio" name="operacija" value="Oduzmi">Oduzmi <br>
        <input type="radio" name="operacija" value="Pomnozi">Pomnozi <br>
        <input type="radio" name="operacija" value="Podeli">Podeli <br>
        <br><br>
        <input type="submit" name=""value="Izracunaj">
        </form>

        <h1>
            <?php 
                if($_SERVER["REQUEST_METHOD"]=="GET"){
                    if(empty($_GET["a"])==FALSE && empty($_GET["a"])==FALSE){
                $a = $_GET["a"]; 
                $b = $_GET["b"];
                $op = $_GET["operacija"];
                switch($op){
                    case "Saberi":
                        $rez=$a+$b;
                        $opera="+"; 
                        break;
                    case "Oduzmi":
                        $rez=$a-$b; 
                        $opera="-"; 
                        break;
                    case "Pomnozi":
                        $rez=$a*$b;
                        $opera="*";  
                        break;                    
                    case "Podeli":
                        $rez=$a/$b; 
                        $opera="/"; 
                        break;
                    default:
                        echo "Greska";
                } 
                echo "<h1>$a $opera $b = $rez </h1>";
                }
            }
            ?>  




    </body>
</html>