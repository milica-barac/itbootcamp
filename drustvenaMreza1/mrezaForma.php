<?php
    // u headeru vec postoji id, koji nam treba iz sesije, pa mozemo samo da pozovemo $id, ne moramo da pozivamo sesiju
    require_once 'mrezaHeader.php';

    // na pocetku definisemo dve promenljive koje ce da oznacavaju i kontrolisu i menjaju se u zavisnosti da li su popunjena obavezna polja
    $imeProvera="*";
    $prezimeProvera="*";

    // da se u edit pojavi ime i prezime za logovanje i izmenu
    // vadimo iz baze pomocu upita, pre svega da bi bili popunjeni inputi
    $sql="SELECT * FROM profili WHERE korisnik_id = $id";
    $result=$conn->query($sql);//izvrsavanje upita
    // da li postoji takav korisnik profil u tabeli
    if($result->num_rows == 0){
        // ove vrednosti, odnosno promenljive $imeValue i $prezimeValue postavimo u inputu za ime i prezime u formi dole, kao value vrednost
        $imeValue="";
        $prezimeValue="";
        $pol="o";
    }else{
        // ako postoji profil postavljamo ime i prezime za izmenu
        $red=$result->fetch_assoc();        
        $imeValue=$red['ime'];
        $prezimeValue=$red['prezime'];
        $pol=$red['pol'];
    }

    // prvo proverimo da li je post metod prazan, ako nije na sledeci nacin dohvatamo unose iz inputa
    if(!empty($_POST)){
        // ovde se definisu polja ne iznad
        //$id=12; ne treba nam vise mehanicki, jer vadimo iznad iz sesije
        $ime = $conn->real_escape_string($_POST['ime']);
        // validacija da ne moze Milicici da se unese prazno
        
        $prezime = $conn->real_escape_string($_POST['prezime']);
        $pol = $conn->real_escape_string($_POST['pol']);

        if(/*$ime!="" || !*/empty($ime/*empty($ime)==false*/)){
            $imeProvera="Morate uneti ime.";
        }
        //elseif za prezime i za pol ne mora jer smo stavili checked i onda tek else da se izvrsi upit 
        else{
            if(empty($prezime)){
                $prezimeProvera="Mora uneti prezime";    
            }else{
            //echo "Zdravo $ime $prezime $pol";

                if($result->num_rows==0){
                    // ako ne postoji profil, onda imamo upit za insert
                $sql="INSERT INTO profili(korisnik_id, ime, prezime, pol) VALUES($id,'$ime','$prezime','$pol')";

                }else{
                    // ako postoji profil treba nam upit za update-ovanje, ovaj upit edituje
                    //za ime i prezime navodnici jer su string, id je intager pa ne treba
                    $sql = "UPDATE profili SET ime='$ime', prezime='$prezime', pol='$pol' WHERE korisnik_id=$id";
                }
                    // na kraju i $conn i refresh, da ne pisemo dva puta i u if u else, smanjuje linije koda 
                    // ne skodi sto se za oba upita promenljiva zove isto $sql
                    $conn->query($sql);
                    // refreshuje stranicu da ne ostaju stari neizmenjeni podaci
                    
                    header("Refresh: 0; mrezaForma.php");
            }
        }
}
?>

        <!-- action na koju stranicu vodi kad se klikne na submit, ostaje na istoj u ovom slucaju. Metod moze da bude get i post -->
        <form action="mrezaForma.php" method="POST">
            <label for="ime">Ime: </label>    
            <input type="text" name="ime" value="<?php echo $imeValue ?>">
            <span><?php echo $imeProvera ?></span>
            <br><br>

            <label for="prezime">Prezime: </label>
            <input type="text" name="prezime" value="<?php echo $prezimeValue ?>">
            <span><?php echo $prezimeProvera ?></span>
            <br><br>
            
            <label for="pol">Pol: </label><br>
            <label for="zenski">Zenski </label>
            <input type="radio" name="pol" value="z"
            <?php
            if($pol=="z"){
                echo "checked";
            }
            ?>
            ><br>
            <label for="muski">Muski </label>
            <input type="radio" name="pol" value="m"
            <?php
            if($pol=="m"){
                echo "checked";
            }
            ?>
            ><br>
            <label for="ostalo">Ostalo </label>
            <input type="radio" name="pol" value="o"
            <?php
            if($pol=="o"){
                echo "checked";
            }
            ?>
            ><br><br>
            <?php
            /* drugi nacin
            if($pol="z"){
                echo "<label for='pol'>Pol: </label><br>
                <label for='zenski'>Zenski </label>
                <input type='radio' name='pol' value='z' checked><br>
                <label for='muski'>Muski </label>
                <input type='radio' name='pol' value='m'><br>
                <label for='ostalo'>Ostalo </label>
                <input type='radio' name='pol' value='o'><br><br>
                ";
            }elseif($pol=="m"){
                echo "<label for='pol'>Pol: </label><br>
                <label for='zenski'>Zenski </label>
                <input type='radio' name='pol' value='z' ><br>
                <label for='muski'>Muski </label>
                <input type='radio' name='pol' value='m' checked><br>
                <label for='ostalo'>Ostalo </label>
                <input type='radio' name='pol' value='o'><br><br>
                ";
            }else{
                echo "<label for='pol'>Pol: </label><br>
                <label for='zenski'>Zenski </label>
                <input type='radio' name='pol' value='z'><br>
                <label for='muski'>Muski </label>
                <input type='radio' name='pol' value='m'><br>
                <label for='ostalo'>Ostalo </label>
                <input type='radio' name='pol' value='o' checked><br><br>
                ";
            }
            */
            ?>

            <input type="submit" value="Potvrdi">

        </form>    
    </body>
</html>