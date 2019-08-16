<?php

class Vozilo{
    // atributi u roditeljskoj klasi
    public $boja;
    public $tip;

    public function __construct($boja,$tip)
    {
        $this->setBoja($boja);
        $this->setTip($tip);
    }

    public function ispisVozila(){
        echo "<p>Boja: " . $this->getBoja() . ", tip:" 
        . $this->getTip() . "</p><br>";
    }

    public function getBoja(){
        return $this->boja;
    }

    public function getTip(){
        return $this->tip;
    }

    public function setBoja($boja){
        $this->boja=$boja;
    }

    public function setTip($tip){
        $this->tip=$tip;
    }
}

    class Automobil extends Vozilo{
        public $registracija;

        public function __construct($boja,$tip, $registracija)
        {
            parent::__construct($boja,$tip);
            // $this->setBoja($boja);
            // $this->setTip("automobil");
            $this->setRegistracija($registracija);
        }

        public function setRegistracija($registracija){
            $this->registracija=$registracija;
        }
        
        public function getRegistracija(){
            return $this->registracija;
        }
        public function ispisiAuto(){
            echo "<p>Boja: " . $this->getBoja() . ", tip:" 
            . $this->getTip() . ", registracija: " 
            . $this->getRegistracija() . "</p><br>";

            //ili drugi nacin echo ispisVozila() . "Registracija: " . $this->getRegistracija();
        }
    }

    $obj= new Vozilo("crna", "bicikla");
    $obj->ispisVozila();
    
    $obj1 = new Automobil("crvena", "automobil" ,123456);
    $obj1->ispisiAuto();





?>