"Kreiranje baze podataka"
CREATE DATABASE ambulanta;

"Koristi bazu podataka"
USE ambulanta;

"Kreiranje tabele"
CREATE TABLE IF NOT EXISTS pacijenti
(
	id INT NOT NULL UNIQUE,
    ime VARCHAR(50) NOT NULL,
    prezime VARCHAR(150)NOT NULL,
    visina INT,
    tezina FLOAT,
    PRIMARY KEY(id)
);

"Dodavanje kolone"
ALTER TABLE pacijenti 
ADD COLUMN god_rodjenja INT;

"Izmena tabele"
ALTER TABLE pacijenti
MODIFY COLUMN god_rodjenja YEAR;

"Unos podataka u tabelu"
INSERT INTO pacijenti(id, ime, prezime, visina, tezina, god_rodjenja)
VALUES (1, "Marija", "Markovic", 168, 68, 1973);

"Unos podataka po redosledu kolona"
INSERT INTO pacijenti 
VALUES(3,"Milan","Milic", 190, 90, 1987);

"Oznaci sve podatke iz tabele pacijenti"
SELECT *
FROM pacijenti;

"Oznaci samo id iz tabele pacijenti"
SELECT id
FROM pacijenti;

"Oznaci id, ime i prezime iz tabele pacijenti"
SELECT id, ime, prezime
FROM pacijenti;

"Omogucava nam da promenimo samo tip kolone "
ALTER TABLE pacijenti
MODIFY COLUMN god_rodjenja YEAR;

"Omogucava nam da promenimo i naziv kolone"
ALTER TABLE pacijenti
CHANGE 'god_rodjenja' 'godina_rodjenja' INT NOT NULL;

"Citanje razlicitih podataka (podataka bez ponavljanja)"
SELECT DISTINCT ime
FROM pacijenti;

"Pacijenti rodjeni pre 1995. godine"
SELECT *
FROM pacijenti
WHERE god_rodjenja<1995;

"Pacijenti rodjeni izmedju 1970. i 1990. godine"
SELECT *
FROM pacijenti
WHERE god_rodjenja>1970 AND god_rodjenja<1990; "AND ili &&"

"Pacijenti stariji od 1970. ili mladji od 2000. god_rodjenja"
SELECT *
FROM pacijenti
WHERE god_rodjenja<1970 OR god_rodjenja>2000;

"BETWEEN - Sve vrednosti izmedju dve vrednosti"
SELECT * 
FROM pacijenti
WHERE god_rodjenja BETWEEN 1970 AND 1990;

"Gde je ime Marija"
SELECT * 
FROM `pacijenti` 
WHERE ime = "Marija";

"Gde je ime Marija sa LIKE"
SELECT * 
FROM pacijenti 
WHERE ime LIKE "Marija";

"Gde ime sadrzi sufuiks Marija"
SELECT * 
FROM pacijenti 
WHERE ime LIKE "%marija";

"Gde ime sadrzi infiks Marija"
SELECT * 
FROM `pacijenti` 
WHERE ime LIKE "%marija%";

"Imena u kojima fali jedan karakter nakon Marij"
SELECT *
FROM pacijenti
WHERE ime LIKE "Marij_";

SELECT *
FROM pacijenti
WHERE ime LIKE "Mari_a"

"Ogranicenje u prikazu"
SELECT * 
FROM `pacijenti` 
WHERE tezina = 55
LIMIT 1;

"Sortiranje rastuce po koloni visina"
SELECT * 
FROM `pacijenti` 
ORDER BY visina;

"Sortiranje rastuce po koloni visina na drugi nacin"
SELECT * 
FROM `pacijenti` 
ORDER BY visina ASC;

"Sortiranje opadajuce po koloni visina"
SELECT * 
FROM `pacijenti` 
ORDER BY visina DESC;

"Tri osobe sa najvišom visinom"
SELECT ime, prezime, visina 
FROM `pacijenti` 
ORDER BY visina DESC
LIMIT 3;

"Pacijenti cije je ime Marija, Anamarija ili Marijana"
SELECT *
FROM pacijenti
WHERE ime IN ("Marija", "Anamarija", "Marijana");

"Pacijenti cije je ime Marija, Anamarija ili Marijana, bez ponavljanja imena"
SELECT DISTINCT ime
FROM pacijenti
WHERE ime IN ("Marija", "Anamarija", "Marijana")








