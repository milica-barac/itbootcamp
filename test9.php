<?php

    class Racunar{
        private $sifra;
        private $boja;

        public function __construct($sifra, $boja)
        {
            $this->setSifra($sifra);
            $this->setBoja($boja);
        }

        public function setSifra($sifra){
            if(strlen($sifra)==4){
                $this->sifra=$sifra;
            }else{
                $this->sifra="aaaa";
            }

        }

        public function setBoja($boja){
            if($boja=="siva" || $boja=="crna" || $boja=="bela"){
                $this->boja=$boja;                
            }else{
                $this->boja="bela";
            }
        }

        public function getSifra(){
            return $this->sifra;
        }

        public function getBoja(){
            return $this->boja;
        }

        public function ispisiRacunar(){
            echo "Sifra: " . $this->getSifra() . "<br>Boja: " . $this->getBoja() . "<br>";
        }

    }

    class Laptop extends Racunar{
        private $masa;

        public function __construct($sifra, $boja, $masa)
        {
            parent::__construct($sifra, $boja);
            $this->setMasa($masa);
        }

        public function setMasa($masa){
            if($masa<100){
                $this->masa=100;
            }else{
                $this->masa=$masa;
            }
        }

        public function getMasa(){
            return $this->masa;
        }

        public function ispisiLaptop(){
            $this->ispisiRacunar();
            echo "Masa: " . $this->getMasa() . "<br><br>";
        }
    }

    $l1 = new Laptop("asdf", "bela", 5);
    $l1->ispisiLaptop();

    $l2 = new Laptop("1234", "crna", 150);
    $l2->ispisiLaptop();

    $l4 = new Laptop("1234", "crna", 150);
    $l4->ispisiLaptop();

    $l3 = new Laptop("a1", "plava", 100);
    $l3->ispisiLaptop();

    $laptopovi = array($l1, $l2, $l3, $l4);

    function natprosecni($laptopovi){
        $sum=0;
        foreach($laptopovi as $lap){
            $sum+=$lap->getMasa();
        }
        $prosek=$sum/count($laptopovi);

        foreach($laptopovi as $lap){
            if($lap->getMasa()>$prosek){
                $lap->ispisiLaptop();
            }
        }
    }

    echo "Nsatprosecno tezak:<br>";
    natprosecni($laptopovi);

    function najucestalija($laptopovi){
        $siva=0;
        $crna=0;
        $bela=0;
        foreach($laptopovi as $lap){
            if($lap->getBoja()=="siva"){
                $siva++;
            }elseif($lap->getBoja()=="crna"){
                $crna++;
            }else{
                $bela++;
            }
        }
        if($siva>$crna){
            if($siva>$bela){
                return "siva";
            }else{
                return "bela";
            }
        }elseif($crna>$bela){
            return "crna";
        }else{
            return "bela";
        }
    }

    echo "Najcesca boja: " . najucestalija($laptopovi);


?>