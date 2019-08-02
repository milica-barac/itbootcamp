-- 1.
CREATE DATABASE videoteka;

-- 2.
CREATE TABLE `videoteka`.`filmovi` ( `id` INT NOT NULL , `naslov` VARCHAR(255) NOT NULL , `reziser` VARCHAR(255) NOT NULL , `god_izdavanja` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- 3.
ALTER TABLE `filmovi` CHANGE `god_izdavanja` `god_izdavanja` YEAR(11) NOT NULL;

-- 4.
INSERT INTO `filmovi` (`id`, `naslov`, `reziser`, `god_izdavanja`) VALUES ('1', 'Titanic', 'James Cameron', '1997'), ('2', 'The Shawshank Redemption', 'Frank Darabont', '1994'), ('3', 'The Godfather', 'Francis Ford Coppola', '1972'), ('4', 'The Godfather: Part II', 'Francis Ford Coppola', '1974'), ('5', 'Schindlers List', 'Steven Spielberg', '1993');

-- 5.
SELECT `naslov`, `reziser` FROM `filmovi`;

-- 6.
SELECT * FROM `filmovi` WHERE `reziser` LIKE "%john%" AND `god_izdavanja` > 2000;

-- 7.
SELECT `naslov`,`god_izdavanja` FROM `filmovi` ORDER BY `god_izdavanja` DESC;

-- 8.
SELECT DISTINCT `god_izdavanja` FROM `filmovi` WHERE `god_izdavanja` BETWEEN 2010 AND 2019;

-- zanr– Tekstualni podatak dužine do 255 karaktera različit od NULL, ocena –Decimalni brojNastavak vezbanja posle testa baze ubacivanje dve kolone zanr i ocena
ALTER TABLE `filmovi` ADD `zanr` VARCHAR(255) NOT NULL AFTER `god_izdavanja`, ADD `ocena` DOUBLE NULL AFTER `zanr`;

-- kada smo ubacili dve nove kolone one su prazne da bi ubacili za sve filmove i podatke u te dve kolone koji nedostaju pisemo upit UPDATE
UPDATE `filmovi` SET `zanr` = 'Drama, Romantika', `ocena` = '7.8' WHERE `filmovi`.`id` = 1;

-- Selektovati sve upite koja je žanr tragedija,komedija ili drama. Ne moze da ima vise zanrova, dok ne napravimo relacije i tabelu zanr sa stranim kljucem, moze samo po jedan zanr
SELECT * FROM `filmovi` WHERE `zanr` IN ('Tragedija', 'Komedija', 'Drama');

-- Selektovati sve filmove kojima je ocena između 5 i 10.
SELECT * FROM `filmovi` WHERE `ocena` BETWEEN 5 AND 10;

-- Selektovati režisere (bez ponavljanja) koji su režirali filmove izdate 2003. godine i poređati ih abecednim redom.
SELECT DISTINCT `reziser` FROM `filmovi` WHERE `god_izdavanja`=1972 ORDER BY `reziser` ASC;

-- Selektovati sve filmove tako da im zanr nije komedija. za nije jednako != ili NOT LIKE
SELECT * FROM `filmovi` WHERE `zanr` <> "Komedija";

-- Prikazati sve informacije o najbojle rangiranom filmu
SELECT * FROM `filmovi` ORDER BY `ocena` DESC LIMIT 1;

-- Prikazati sve informacije o najbojle rangiranoj drami
SELECT * FROM `filmovi` WHERE `zanr`="drama" ORDER BY `ocena` DESC LIMIT 1;

-- Selektovati trojicu rezisera ciji filmovi imaju najbolje ocene.
SELECT DISTINCT `reziser` FROM `filmovi` ORDER BY `ocena` DESC LIMIT 3;

-- Selektovati sve žanrove filmova, bez ponavljanja.
SELECT DISTINCT `zanr` FROM `filmovi`;

-- Selektovati sve filmove u obliku naslov (režiser).
SELECT CONCAT (`naslov`, "(", `reziser`, ")") AS "Naslov(reziser)" FROM `filmovi`;

-- Selektovati sve filmove u obliku naslov (režiser) – godina izdanja. Selektovane filmove sortirati rastuće prema godini izdanja.
SELECT CONCAT (`naslov`, "(", `reziser`, ") - ", `god_izdavanja`) AS "Naslov(reziser)-godina izdanja" FROM `filmovi` ORDER BY `god_izdavanja` ASC;


-- min, max, count i avg rade samo sa brojevima

-- minimalna vrednost kolone
SELECT MIN(`tezina`) AS "Minimalna tezina" FROM `pacijenti`;

-- minimalna tezina pacijenta koji se zove Marija
SELECT MIN(`tezina`) AS "Minimalna tezina" FROM `pacijenti` WHERE `ime` LIKE "Marija";

-- maximalna tezina pacijenta koji se zove Marija
SELECT MAX(`tezina`) AS "Maximalna tezina" FROM `pacijenti` WHERE `ime` LIKE "Marija";

-- prebrojavanje redova
SELECT COUNT(`id`) FROM `pacijenti`;

-- broj pacijenata tezis od 70 kg
SELECT COUNT(`tezina`) FROM `pacijenti` WHERE `tezina`>70;

--Srednja vrednost, kada ima null, preskace red i broji samo one gde ima vrednosti i podeli sa brojem tih popunjenih redova
SELECT AVG(`tezina`) AS "Prosecna tezina" FROM `pacijenti`;

-- zbir svih tezina
SELECT SUM(`tezina`) AS "Ukupna tezina" FROM `pacijenti`;

-- moze i da se sabiraju vise kolona, ovde nema smisla, ali mozda ce nekad imati
SELECT SUM(`tezina`)+SUM(`visina`) AS "Ukupna tezina i visina" FROM `pacijenti`;

-- srednja vrednost na drugi nacin, lakse je sa avg
SELECT SUM(`tezina`) / COUNT(`tezina`) AS "Prosecna tezina" FROM `pacijenti`;

-- vezba 50 slajd za itbootcamp
-- odrediti broj radnika
SELECT COUNT(`id`) AS "Broj radnika" FROM `customers`;

-- odrediti minimalnu platu
SELECT MIN(`salary`) AS "Min plata" FROM `customers`;

-- odrediti maximalnu platu
SELECT MAX(`salary`) AS "Min plata" FROM `customers`;

-- ukupna plata svih radnika
SELECT SUM(`salary`) AS "Ukupna plata" FROM `customers`;

-- prosecna plata
SELECT AVG(`salary`) AS "Ukupna plata" FROM `customers`;


-- UGNJEZDENI UPITI
-- tacka zarez ; samo na kraju celog upita

-- ako ima dva pacijenta sa najvisom visnom oba ispisuje
SELECT * FROM `pacijenti` WHERE `visina` = (SELECT MAX(`visina`) FROM `pacijenti`);

-- Pacijent sa najvisom visinom, ako se zove Marija, ako ne postoji pacijent sa najvisom visinom koiji se zove marija
SELECT * FROM `pacijenti` WHERE `ime` LIKE "Marija" AND `visina` = (SELECT MAX(`visina`) FROM `pacijenti`);

-- da izbaci najvisu Mariju
SELECT * FROM `pacijenti` WHERE `ime` LIKE "Marija" AND `visina` = (SELECT MAX(`visina`) FROM `pacijenti` WHERE `ime` LIKE "Marija")



