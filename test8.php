<?php

    class Kamion{

        private $registracija;
        private $nosivost;

        public function __construct($r,$n)
        {
            $this->setRegistracija($r);
            $this->setNosivost($n);
        }

        public function setRegistracija($registracija){
            if(strlen($registracija)>=5){
                $this->registracija=$registracija;
            }else{
                echo "Registracija ne sme imati manje od 5 karaktera";
            }
        }

        public function setNosivost($nosivost){
            if($nosivost<0){
                $this->nosivost=0;
            }else{
                $this->nosivost=$nosivost;
            }
        }

        public function getRegistracija(){
            return $this->registracija;
        }

        public function getNosivost(){
            return $this->nosivost;
        }

        public function ispisiKamion(){
            echo "<p> <span style='color:blue;'> 
            Registracija: " . $this->getRegistracija() . "</span><br>" . 
            "<span style='color:red;'>
            Nosivost: " . $this->getNosivost() . " </span></p>";
        }
    }

    $kam1=new Kamion("12345", 200);
    $kam2=new Kamion("1234", 5000);
    $kam3=new Kamion("54321", -231);

    $kamioni=array($kam1,$kam2,$kam3);

    function ispisSvihKamiona($kamioni){
        foreach($kamioni as $k){
            $k->ispisiKamion();
        }
    }

    function podrzavaNosivost($kamioni, $paket){
        $maxN=$kamioni[0]->getNosivost();
        foreach($kamioni as $k){
            if($k->getNosivost()>$maxN){
                $maxN=$k->getNosivost();
            }
        }
        return $maxN;

        if($maxN<$paket){
            return false;
        }else{
            return true;
        }
    }

    // drugi kraci nacin
    function nosiv($kamioni, $paket){
        foreach($kamioni as $k){
            if($k->getNosivost()>$paket){
                return true;
            }
        }
        return false;
    }
    // moze i sa ipitivanjem, odnosno oduzimanjem paketa od nosivosti i proveravanja da li je taj rezultat veci od nule

    ispisSvihKamiona($kamioni);

    if(podzavaNosivost($kamioni, 300)==true){
        echo "Podzava nosivost";
    }else{
        echo "Ne podrzava nosivost";
    }




?>