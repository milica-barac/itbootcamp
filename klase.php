<?php
    // praksa je da klase nazivamo pocetnim velikim slovom
    class Auto{
        //tri atributa(polja)
        private $marka;
        private $boja = 'white';
        private $imaKrov = true;

        // automatski se poziva i odradi sve pri kreiranju objekta(instanciranju)
        public function __construct($m, $b, $k){
            $this->marka=$m;
            $this->boja=$b;
            $this->imaKrov=$k;
        }

        //jedna metoda(funkcija)
        public function sviraj(){
            echo "Beep! Beep! <br>";
        }

        // vidljivost(nivo pristupa) uvek ide na pocetku(public, private, protected)
        public function setMarka($m){
            $this->marka=$m;
        }

        public function setBoja($b){
            $this->boja=$b;
        }

        public function setImaKrov($k){
            $this->imaKrov=$k;
        }

        public function getMarka(){
            return $this->marka;
        }

        public function getBoja(){
            return $this->boja;
        }

        public function getImaKrov(){
            return $this->imaKrov;
        }


    }
    
    // $i = array(1,3,6);
    // instraciranje-kreiranje objekta
    $auto1=new Auto("BMW", "blue", false);
    // precutno se poziva konstruktor, svaka klasa mora da ima konstruktor
    $auto2=new Auto("Audi", "yellow", false);

    // kada nema konstruktora, nije da ga nema, precutno php sam napravi javan prazan konstruktor bez argumenata
    // $auto3=new Auto; npr 
    /* class Auto{
        //...
        u ovom slucaju preko setera postavljamo polja
        public function __construct()
        {
            
        }
    }
    */
    // ako napisemo konstruktor
    /* class Auto{
        public function __construct($m, $b, $k)
        {
            //....      
        }
    }
    vise nije dozvoljena sledeca kreacija objekata $auto4=new Auto; NIJE DOZVOLJENO!!!
    $auto4 = new Auto()
    */

    // suvisno sve sto je zakomentarisano zbog konstruktora
    // objektu dodeljujemo atribut
    // $auto1->setMarka("BMW");
    //ne moze da se pristupa polju marka van klase, kontrolisemo da moze da se postavlja samo uy pomoc setera, a ne i ovako: $auto1->marka="Audi";
    // $auto1->setBoja("blue");
    // $auto1->setImaKrov(false);

    // $auto2->setMarka("Audi");
    // kad ne stavimo boju ide podrazumevana, bela boja (vrednost) koju smo stavili gore u atributima
    // $auto2->setImaKrov(true);

    echo "Karakteristike prvog automobila: ";
    echo $auto1->getMarka() . ", " . $auto1->getBoja() . ", " . $auto1->getImaKrov() . "<br>";
    
    if($auto1->getImaKrov()===false){
        echo "Prvi auto nema krov <br>";
    }
    $auto1->sviraj();
    
    echo "Karakteristike drugog automobila: ";
    echo $auto2->getMarka() . ", " . $auto2->getBoja() . ", " . $auto2->getImaKrov() . "<br>";
    $auto1->sviraj();

    echo "<hr>";

    class Film{
        private $naslov;
        private $reziser;
        private $godina;
        
        public function __construct($n, $r, $g=2000){
            $this->naslov=$n;
            $this->reziser=$r;
            if($g>1800){
                $this->godina=$g;
            }else{
                $this->godina=1800;
            }
        }

        public function stampaj(){
            // this je pokazivac na objekat koji poziva metodu
            // tip podatka object, a this omogucava da ispise naslov filma koji je pozvao metodu
            // moze i u stringu, ne mora konkatenacija
            echo "Film: $this->naslov , rezirao: $this->reziser, godina izdanja: $this->godina <br>";
        }

        public function setNaslov($n){
            $this->naslov=$n;
        }

        public function setReziser($r){
            $this->reziser=$r;
        }

        public function setGodina($g){
            if($g>1800){
                $this->godina=$g;
            }else{
                $this->godina=1800;
            }
        }

        public function getNaslov(){
            return $this->naslov;
        }

        public function getReziser(){
            return $this->reziser;
        }

        public function getGodina(){
            return $this->godina;
        }
    }

    $film1=new Film("Titanic", "Cameron", 1997);
    $film2=new Film("Maratonci trce pocasni krug", "Slobodan Sijan", 1982);
    $film3=new Film("Balkanski spijun", "Dusan Kovacevic", 1784);
    $film4=new Film("Gladiator", "Ridley Scott");

    // $film1->setNaslov("Titanic");
    // $film1->setReziser("Cameron");
    // $film1->setGodina(1997);
    $film1->stampaj();

    // $film2->setNaslov("Maratonci trce pocasni krug");
    // $film2->setReziser("Slobodan Sijan");
    // $film2->setGodina(1982);
    $film2->stampaj();

    // $film3->setNaslov("Balkanski spijun");
    // $film3->setReziser("Dusan Kovacevic");
    // $film3->setGodina(1784);
    $film3->stampaj();

    $film4->stampaj();

    echo "<hr>";

    class Pacijent{
        private $ime;
        private $visina;
        private $tezina;

        public function __construct($i,$v,$t){
            // mogu da se pozivaju druge metode iz klase
            $this->setIme($i);
            $this->setVisina($v);
            $this->setTezina($t);
        }

        public function stampaj(){
            echo "Pacijent: " . $this->ime . ", visok: " . $this->visina . ", tezak: " . $this->tezina. ". <br>";
        }

        public function bmi(){
            $bmi=$this->tezina * 10000 / ($this->visina * $this->visina);
            return $bmi;
        }

        public function kritican(){
            if($this->bmi()<15 || $this->bmi()>40){
                return true;
            }
                return false;
            }

        // ako ne zelimo da moze da menja, a ipak nam je lakse da pisemo setere, koje cemo da pozivamo u __construct, stavljamo ih na private
        public function setVisina($v){
            if($v<0){
                $this->visina=0;
            }elseif($v>250){
                $this->visina=250;
            }else{
                $this->visina=$v;
            }
        }

        public function setTezina($t){
            if($t<0){
                $this->tezina=0;
            }elseif($t<=550){
                $this->tezina=$t;
            }else{
                $this->tezina=550;
            }
        }

        public function setIme($i){
            $this->ime=$i;
        }

        public function getIme(){
            return $this->ime;
        }

        public function getVisina(){
            return $this->visina;
        }

        public function getTezina(){
            return $this->tezina;
        }

    }


    $pac1=new Pacijent("Pera", 187, 78);
    $pac2=new Pacijent("Mika", 375, 60);
    $pac3=new Pacijent("Laza", 192, 600);

    // $pac1->setIme("Pera");
    // $pac1->setVisina(187);
    // $pac1->setTezina(78);
    $pac1->stampaj();
    echo "BMI: " . $pac1->bmi() . "<br>";
    if($pac1->kritican()){
        echo "Pacijent je kritican<hr>";
    }else{
        echo "Pacijent nije kritican<hr>";
    }
    //za false ne vraca nista, a za true ispisuje 1, tako da mora prethodni if da bi proverio sta je i ispisao sta zelimo echo "Kritican: " . $pac1->kritican(); 

    // $pac2->setIme("Mika");
    // $pac2->setVisina(375);
    // $pac2->setTezina(60);
    $pac2->stampaj();
    echo "BMI: " . $pac2->bmi() . "<br>";
    if($pac2->kritican()){
        echo "Pacijent je kritican<hr>";
    }else{
        echo "Pacijent nije kritican<hr>";
    }

    // $pac3->setIme("Laza");
    // $pac3->setVisina(192);
    // $pac3->setTezina(600);
    $pac3->stampaj();
    echo "BMI: " . $pac3->bmi() . "<br>";
    if($pac3->kritican()){
        echo "Pacijent je kritican<hr>";
    }else{
        echo "Pacijent nije kritican<hr>";
    }
