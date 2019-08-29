<?php

    class ZooZivotinja {
        private $ime;
        private $tezina;
        private $brgodina;

        public function __construct($ime, $tezina, $brgodina)
        {
            $this->setIme($ime);   
            $this->setTezina($tezina);   
            $this->setBrgodina($brgodina);   
        }

        public function setIme($ime){
            $this->ime=$ime;
        }

        public function setTezina($tezina){
            if($tezina<0){
                $this->tezina=0;
            }else{
                $this->tezina=$tezina;
            }
        }

        public function setBrgodina($brgodina){
            if($brgodina<0){
                $this->brgodina=0;
            }else{
                $this->brgodina=$brgodina;
            }
        }

        public function getIme(){
            return $this->ime;
        }

        public function getTezina(){
            return $this->tezina;
        }

        public function getBrgodina(){
            return $this->brgodina;
        }

        public function ispisZivotinje(){
            echo "<br>Ime zivotinje: " . $this->getIme() . "<br>Tezina: " . $this->getTezina() . "<br>Broj godina: " . $this->getBrgodina(). "<br>";
        }
    }

    class Sisar extends ZooZivotinja{
        private $pol;
        private $visina;

        public function __construct($ime, $tezina, $brgodina, $pol, $visina)
        {
            parent::__construct($ime, $tezina, $brgodina);
            $this->setPol($pol);
            $this->setVisina($visina);
        }

        public function setPol($pol){
            if($pol=="Z" || $pol=="M"){
                $this->pol=$pol;   
            }else{
                $this->pol="Z";
            }
        }

        public function setVisina($visina){
            if($visina<0){
                $this->visina=0;
            }else{
                $this->visina=$visina;
            }
        }

        public function getPol(){
            return $this->pol;
        }

        public function getVisina(){
            return $this->visina;
        }        

        public function ispisSisara(){
            $this->ispisZivotinje();
            echo "Pol: " . $this->getPol() . "<br>Visina: " . $this->getVisina() . "<br>";
        }

        public function kalorije(){
            if($this->getPol()=="M"){
                $kalorije=13.397 * $this->getTezina() + 4.799 * $this->getVisina() - 5.667 * $this->getBrgodina() + 88.362;
            }else{
                $kalorije=9.247 * $this->getTezina() + 3.098 * $this->getVisina() - 4.330 * $this->getBrgodina() + 47.593;
            }
            return $kalorije;    
        }

    }

    function zenke($sisari){
        foreach($sisari as $s){
            if(strpos($s->getIme(), "Tigar") !==false && $s->getPol()!="M"){
                $s->ispisSisara();
            }
        }
    }

    function kalorijskaVrednost($kalorija, $sisari){
        foreach($sisari as $s){
            if($s->kalorije()>$kalorija){
                return true;
            }
        }
        return false;
    }

    $z1=new ZooZivotinja("krava", 100, 10);
    $z2=new ZooZivotinja("koza", -100, -10);
    $z1->ispisZivotinje();
    $z2->ispisZivotinje();

    $s1=new Sisar("Tigar", 200, 5, "Z", 60);
    $s2=new Sisar("Sibirski Tigar", 0, 5, "M", -60);
    $s3=new Sisar("Africki Tigar", 0, 5, "sa", -60);
    
    $s1->ispisSisara();
    echo "Potreban broj kalorija: " . $s1->kalorije();
    $s2->ispisSisara();
    echo "Potreban broj kalorija: " . $s2->kalorije();
    $s3->ispisSisara();
    echo "Potreban broj kalorija: " . $s3->kalorije();

    $sisari=array($s1,$s2,$s3);
    zenke($sisari);

    if(kalorijskaVrednost(500, $sisari)==true){
        echo "Postoji";
    }else{
        echo "Ne postoji";
    }
    



?>