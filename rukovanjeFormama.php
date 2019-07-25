<html>
<body>
<!-- akcija koju zelimo stranicu da otvorimo prikaz.php, postoje metode get i post, kada je metod get u prikaz.php koristimo $_GET -->
<!-- forma ima akciju i metod, imamo labele i input, INPUT ima NAME, da bi mogli da definisemo odakle iz kog inputa hocemo da izvucemo -->
    <form action="prikazGET.php" method="get">
        <label>Ime: </label>
        <input type="text" name="ime"><br><br>
        <label>E-mail: </label>
        <input type="email" name="email"><br><br>
        <input type="submit" value="Potvrdite"> 
    </form>
    <br><br>
    <!-- sve isto samo nije get nego post metod -->
    <!-- obrati paznju na akciju, mora da postoji -->
    <form action="prikazPOST.php" method="post">
        <label>Ime: </label>
        <input type="text" name="ime"><br><br>
        <label>E-mail: </label>
        <input type="email" name="email"><br><br>
        <input type="submit" value="Potvrdite"> 
    </form>
    <!-- zadatak da izvuce iz forme i da se izvrsi operacija nad brojevima -->
    <form action="racunanjeGET.php" method="get">
        <label>Broj 1: </label>
        <input type="number" name="broj1"><br><br>
        <label>Broj 2: </label>
        <input type="number" name="broj2"><br><br>
        <label>Operacija: </label>
        <input type="text" name="operacija"><br><br>
        <input type="submit" value="Izracunaj"> 
    </form>
</body>

</html>

