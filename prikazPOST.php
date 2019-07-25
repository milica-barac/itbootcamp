<html>
<body>
    <!-- uzima ono sto je u inputu koji nosi prosledjeni name u uglastim zagradama $_GET -->
    <!-- ako je get vide se podaci u url i moze da se bookmarkuje, ali se lakse preuzimaju podaci, ako je post nisu vidljivi i ne moze da se 
    bookmarkuje, get se koristi za javne ne toliko osetljive podatke kao npr ime i prezime, a post za poverljive, osetljive podatke -->
    <p>DOBRODOSLI <?php echo $_POST["ime"]; ?></p>
    <p>Vasa e-mail adresa je: <?php echo $_POST["email"]; ?></p>    
</body>

</html>