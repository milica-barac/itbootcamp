<?php
    require_once 'mrezaHeader.php';

    // $id - preuzet preko sesije odnosno headera
    $sql="SELECT * FROM korisnici WHERE id = $id";
    
    $result=$conn->query($sql);

    // kad smo ulogovani znamo da postoji samo jedan red i ne moramo da proveravamo da li je num_rows == 0
    $red=$result->fetch_assoc();//hvatamo red
    $username=$red['username'];// uzimamo username i smestamo ga u promenljivu
    $pass=$red['pass'];//isto i za password

    // promenljive za spanove, error
    $passUnosStara="*";
    $passUnosNova="*";

    if(!empty($_POST)){
        // pristupamo poljima preko value koja je u formi, za korisnicko nam ne traba, za sifre $_POST['name iz inputa']
        $staraSifra = $conn->real_escape_string($_POST['staraSifra']);
        $novaSifra = $conn->real_escape_string($_POST['novaSifra']);
        $potvrdaSifre = $conn->real_escape_string($_POST['potvrdaSifre']);
        
        $hesiranaNova=md5($novaSifra);//nova promenljiva, sve jedno gde se definisi, jer se ta promenljiva ne pominje u if

        // ne moze da se odkodira, tako da sifru koju unesomo u input kodiramo u md5 i proverimo da li se poklapa sa pass koji je u bazi
        if(md5($staraSifra)==$pass && $novaSifra==$potvrdaSifre){
            //dobra stara sifra i nova i potvrda se poklapaju, mozemo izvrsiti promenu sifre
            // passwordi su string pa mora pod ''
            $sql1 = "UPDATE korisnici SET pass = '$hesiranaNova' WHERE id = $id";
            $conn->query($sql1);
        }else{
            if(md5($staraSifra)!=$pass){
                //Ispis da nije ispravno uneta stara sifra
                $passUnosStara = "Neispravno uneta stara sifra";
            }
            if($novaSifra!=$potvrdaSifre){
                //ispis da nova i potvrdjena nisu iste
                $passUnosNova = "Greska u potvrdi sifre";
            }
        }
    }

?>
        <form action="mrezaIzmeniSifru.php" method="POST">
            <label for="korisnicko">Korisnicko ime: </label>
            <!-- readonly ili disable, moze i preko value ili preko placeholder, a s obzirom da je readonly svejedno je, jer ne moze da se menja -->
            <input type="text" name="korisnicko" placeholder="<?php echo $username ?>" readonly>
            <br><br>
            <label for="staraSifra">Stara sifra: </label>
            <input type="text" name="staraSifra">
            <span><?php echo $passUnosStara ?></span>
            <br><br>
            <label for="novaSifra">Nova sifra: </label>
            <input type="text" name="novaSifra">
            <span><?php echo $passUnosNova ?></span>
            <br><br>
            <label for="potvrdaSifre">Potvrda sifre: </label>
            <input type="text" name="potvrdaSifre">
            <span><?php echo $passUnosNova ?></span>
            <br><br>
            <input type="submit" value="Potvrdi">

        </form>

    </body>
</html>