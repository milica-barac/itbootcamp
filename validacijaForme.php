<html>
<body>

    <h1>Primer PHP validacije forme</h1>
    <!-- akcija koja dovodi do poziva iste stranice, odnsno ispisuje se na istoj stranici unos akcija koja se pise je sledeca ili index.php,
    odnosno u mom slucaju u action="validacijaForme"-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        
        <label>Ime: </label>
        <input type="text" name="ime"><br><br>
        
        <label>Prezime: </label>
        <input type="text" name="prezime"><br><br>
        
        <label>E-mail: </label>
        <input type="email" name="email"><br><br>
        
        <label>Sajt: </label>
        <input type="url" name="sajt"><br><br>
        
        <label>Komentar: </label>
        <textarea name="komentar" rows="5" cols="40"></textarea>
        <br><br>

        <label>Pol: </label>
        <input type="radio" name="pol" value="Zenski">Zenski
        <input type="radio" name="pol" value="Muski">Muski
        <input type="radio" name="pol" value="Ostalo">Ostalo
        <br><br>
        
        <input type="submit" name="submit" value="Potvrdi"> 
    </form>
    <br><br>

    <?php
        echo "<h2>Vas unos:</h2>";
        echo "Vase ime i prezime: " . $_POST["ime"] . " " . $_POST["prezime"] . "<br>";
        echo "Vas email je: " . $_POST["email"] . "<br>";
        echo $_POST["sajt"] . "<br>";
        echo $_POST["komentar"] . "<br>";
        echo $_POST["pol"] . "<br>";
    ?>

</body>

</html>