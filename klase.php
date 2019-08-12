<?php
    // praksa je da klase nazivamo pocetnim velikim slovom
    class Auto{
        //tri atributa(polja)
        var $marka;
        var $boja = 'white';
        var $imaKrov = true;

        //jedna metoda(funkcija)
        function sviraj(){
            echo "Beep! Beep! <br>";
        }


    }
    
    // $i = array(1,3,6);
    // instraciranje-kreiranje objekta
    $auto1=new Auto;
    $auto2=new Auto;

    // objektu dodeljujemo atribut
    $auto1->marka = "BMW";
    $auto1->boja = "blue";
    $auto1->imaKrov = false;

    $auto2->marka = "Audi";
    // kad ne stavimo boju ide podrazumevana, bela boja (vrednost) koju smo stavili gore u atributima
    $auto2->imaKrov=true;

    echo "Karakteristike prvog automobila: ";
    echo $auto1->marka . ", " . $auto1->boja . ", " . $auto1->imaKrov . "<br>";
    
    if($auto1->imaKrov===false){
        echo "Prvi auto nema krov <br>";
    }
    $auto1->sviraj();
    
    echo "Karakteristike drugog automobila: ";
    echo $auto2->marka . ", " . $auto2->boja . ", " . $auto2->imaKrov . "<br>";
    $auto1->sviraj();

    class Film{
        var $naslov;
        var $reziser;
        var $godinaIzdanja;
        
        function stampaj(){
            // this je pokazivac na objekat koji poziva metodu
            // tip podatka object, a this omogucava da ispise naslov filma koji je pozvao metodu
            echo "Film: " . $this->naslov . ", rezirao: " . $this->reziser . ", godina izdanja: " . $this->godinaIzdanja . "<br>";
        }
    }

    $film1=new Film;
    $film2=new Film;
    $film3=new Film;

    $film1->naslov="Titanic";
    $film1->reziser="Cameron";
    $film1->godinaIzdanja=1997;
    $film1->stampaj();

    $film2->naslov="Maratonci trce pocasni krug";
    $film2->reziser="Slobodan Sijan";
    $film2->godinaIzdanja=1982;
    $film2->stampaj();

    $film3->naslov="Balkanski spijun";
    $film3->reziser="Dusan Kovacevic";
    $film3->godinaIzdanja=1984;
    $film3->stampaj();

    class Pacijent{
        var $ime;
        var $visina;
        var $tezina;

        function stampaj(){
            echo "Pacijent: " . $this->ime . ", visok: " . $this->visina . ", tezak: " . $this->tezina. ". <br>";
        }

        function bmi(){
            $bmi=$this->tezina * 10000 / ($this->visina * $this->visina);
            return $bmi;
        }

        function kritican(){
            if($this->bmi()<15 || $this->bmi()>40){
                return true;
            }
                return false;
            }
        }


    $pac1 = new Pacijent;
    $pac2=new Pacijent;
    $pac3=new Pacijent;

    $pac1->ime="Pera";
    $pac1->visina=187;
    $pac1->tezina=78;
    $pac1->stampaj();
    echo "BMI: " . $pac1->bmi() . "<br>";
    if($pac1->kritican()){
        echo "Pacijent je kritican<hr>";
    }else{
        echo "Pacijent nije kritican<hr>";
    }
    //za false ne vraca nista, a za true ispisuje 1, tako da mora prethodni if da bi proverio sta je i ispisao sta zelimo echo "Kritican: " . $pac1->kritican(); 

    $pac2->ime="Mika";
    $pac2->visina=175;
    $pac2->tezina=60;
    $pac2->stampaj();
    echo "BMI: " . $pac2->bmi() . "<r>";
    if($pac2->kritican()){
        echo "Pacijent je kritican<hr>";
    }else{
        echo "Pacijent nije kritican<hr>";
    }

    $pac3->ime="Laza";
    $pac3->visina=192;
    $pac3->tezina=100;
    $pac3->stampaj();
    echo "BMI: " . $pac3->bmi() . "<br>";
    if($pac3->kritican()){
        echo "Pacijent je kritican<hr>";
    }else{
        echo "Pacijent nije kritican<hr>";
    }

?>