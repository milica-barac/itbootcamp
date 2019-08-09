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

-- 8. Izlistati sve kompozicije koje je komponovao Hajdn.

-- 9. Izlistati sve kompozitore koji su komponovali makar jednu od kompozicija iz tabele kompozicije

