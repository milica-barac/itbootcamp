<html>
<body>   
    <p>Rezultat je: 
    <?php
        $a=$_GET["broj1"];
        $b=$_GET["broj2"];
        $c=$_GET["operacija"];
        switch($c){
            case "+":
            case "sabiranje":
                $rez=$a+$b;
                break;
            case "-":
            case "oduzimanje":
                $rez=$a-$b;
                break;
            case "*":
            case "mnozenje":
                $rez=$a*$b;
                break;
            case "/":
            case "deljenje":
                $rez=$a/$b;
                break;
            default:
                echo "Pogresan unos";
            
        }
        echo $rez;

    ?>
    </p>
</body>

</html>