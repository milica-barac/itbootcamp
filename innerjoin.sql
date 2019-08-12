-- 1. Izlistati sve kompozicije koje su nastale između 1800. i 1900. godine.
SELECT * FROM kompozicije WHERE kompozicije.god BETWEEN 1800 AND 1900;

-- 2. Izlistati sve instrumente koji u svom opisu sadrže reč „uraraljke“ ili „duvački“.
SELECT * FROM instrumenti WHERE instrumenti.opis LIKE "udaraljke%" OR instrumenti.opis LIKE "duvacki%";

-- 3. Izlistati sve instraumente koji u svom nazivu sadrže reč "viol".
SELECT * FROM instrumenti WHERE instrumenti.naziv LIKE "%viol%"

-- 4. Izlistati sve kompozicije koje pripadaju baroku ili romantizmu.
SELECT * FROM kompozicije INNER JOIN periodi ON kompozicije.id_perioda=periodi.id_perioda WHERE periodi.naziv LIKE "Barok" OR periodi.naziv LIKE "Romantizam";

-- 5. Izlistati sve nazive kompozicije i imena kompozitora koji su ih komponovali.
SELECT kompozicije.naziv, kompozitori.ime, kompozitori.prezime FROM kompozitori INNER JOIN komponuje ON kompozitori.id_kompozitora=komponuje.id_kompozitora INNER JOIN kompozicije ON kompozicije.id_kompozicije= komponuje.id_kompozicije;

-- 6. Izlistati sve nazive kompozicija, nazive perioda, kao i trajanje perioda kome pripadaju.
SELECT kompozicije.naziv, periodi.naziv, periodi.od_god, periodi.do_god FROM kompozicije INNER JOIN periodi ON kompozicije.id_perioda= periodi.id_perioda;

-- 7. Izlistati sve nazive kompozicija koje pripadaju baroknom stilu.
SELECT kompozicije.naziv FROM kompozicije INNER JOIN periodi ON kompozicije.id_perioda = periodi.id_perioda WHERE periodi.naziv="Barok"; 

-- 8. Izlistati sve kompozicije koje je komponovao Hajdn.
SELECT kompozicije.naziv FROM kompozicije INNER JOIN komponuje ON kompozicije.id_kompozicije=komponuje.id_kompozicije INNER JOIN kompozitori ON komponuje.id_kompozitora= kompozitori.id_kompozitora WHERE kompozitori.prezime="Hajdn";

-- 9. Izlistati sve kompozitore koji su komponovali makar jednu od kompozicija iz tabele kompozicije
SELECT DISTINCT kompozitori.ime, kompozitori.prezime FROM kompozitori INNER JOIN komponuje ON kompozitori.id_kompozitora=komponuje.id_kompozitora WHERE kompozitori.id_kompozitora = komponuje.id_kompozitora

-- 10. Prikazati najstariju kompoziciju, njenu godinu stvaranja, kompozitora koji ju je komponovao i period kome pripada.
SELECT kompozicije.naziv AS "Naziv kompozicije", kompozicije.god AS "Godina", kompozitori.ime AS "Ime kompoztora", kompozitori.prezime AS "Prezime kompozitora", periodi.naziv AS "Period" FROM kompozitori INNER JOIN komponuje ON kompozitori.id_kompozitora=komponuje.id_kompozitora INNER JOIN kompozicije ON komponuje.id_kompozicije=kompozicije.id_kompozicije INNER JOIN periodi ON kompozicije.id_perioda=periodi.id_perioda ORDER BY kompozicije.god LIMIT 1
-- drugi nacin
SELECT kompozicije.naziv AS "Naziv kompozicije", kompozicije.god AS "Godina", kompozitori.ime AS "Ime kompoztora", kompozitori.prezime AS "Prezime kompozitora", periodi.naziv AS "Period" FROM kompozitori INNER JOIN komponuje ON kompozitori.id_kompozitora=komponuje.id_kompozitora INNER JOIN kompozicije ON komponuje.id_kompozicije=kompozicije.id_kompozicije INNER JOIN periodi ON kompozicije.id_perioda=periodi.id_perioda WHERE kompozicije.god = (SELECT MIN(kompozicije.god) FROM kompozicije) LIMIT 1

-- 11. Izlistati sve kompozitore čija su dela stvarana između 1800. i 1900. godine.
-- SELECT kompozitori.ime, kompozitori.prezime FROM kompozitori INNER JOIN komponuje ON kompozitori.id_kompozitora=komponuje.id_kompozitora INNER JOIN kompozicije ON komponuje.id_kompozicije-kompozicije.id_kompozicije WHERE (kompozitori.id_kompozitora=komponuje.id_kompozitora) AND (kompozicije.god BETWEEN 1800 AND 1900) ne valja nesto ovde

-- 12. Izlistati sve kompozitore čija dela pripadaju romantizmu.


-- 13. Izlistati sve muzičke instrumente (bez ponavljanja) koji sviraju u Betovenovim kompozicijama.
SELECT DISTINCT instrumenti.naziv FROM instrumenti INNER JOIN svira ON instrumenti.id_instrumenta=svira.id_instrumenta INNER JOIN kompozicije ON svira.id_kompozicije=kompozicije.id_kompozicije INNER JOIN komponuje ON kompozicije.id_kompozicije=komponuje.id_kompozicije INNER JOIN kompozitori ON komponuje.id_kompozitora-kompozitori.id_kompozitora WHERE kompozitori.prezime LIKE "%Mocart%";
-- ne izbacuje lepo

-- 14. Prebrojati koliko ima muzičkih instrumenata koji sviraju u Betovenovim kompozicijama.
SELECT DISTINCT COUNT(instrumenti.naziv) AS "Broj instrumenata" FROM instrumenti INNER JOIN svira ON instrumenti.id_instrumenta=svira.id_instrumenta INNER JOIN kompozicije ON svira.id_kompozicije=kompozicije.id_kompozicije INNER JOIN komponuje ON kompozicije.id_kompozicije=komponuje.id_kompozicije INNER JOIN kompozitori ON komponuje.id_kompozitora-kompozitori.id_kompozitora WHERE kompozitori.prezime LIKE "%Mocart%";
-- ne izbacuje lepo

-- 15. Izlistati sve muzičke instrumente (bez ponavljanja) koji sviraju u baroknom stilu.


-- 16. Izlistati sve muzicke instrumente bez ponavljanja koji su se koristili u kompozicijama izmedju 1500 i 1800 godine
SELECT DISTINCT instrumenti.naziv FROM instrumenti INNER JOIN svira ON instrumenti.id_instrumenta=svira.id_instrumenta INNER JOIN kompozicije ON svira.id_kompozicije=kompozicije.id_kompozicije WHERE kompozicije.god BETWEEN 1500 AND 1800;

