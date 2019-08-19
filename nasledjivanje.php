<?php

class Vozilo{
    // atributi u roditeljskoj klasi, private da ne moze da im se pristupa svuda i da se menjaju vrednost
    private $boja;
    private $tip;

    public function __construct($boja,$tip)
    {
        // preporucuje se da ide preko setera
        $this->setBoja($boja);
        $this->setTip($tip);
    }

    public function ispisVozila(){
        echo "<p>Boja: " . $this->getBoja() . ", tip:" 
        . $this->getTip() . "</p>";
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
        // nema potrebe da ovde navodimo tip i boju jer ih nasledjuje
        private $registracija;

        public function __construct($boja, $registracija)
        {   
            // moze i kao u javi super konstruktor, ako radimo ovaj nacin moramo da prosledimo i tip u konstruktoru
            // parent::__construct($boja,$tip);
            $this->setBoja($boja);
            // rucno stavljamo difoltnu vrednost za tip, ne prosledjujemo konstruktoru u ovom slucaju
            $this->setTip("automobil");
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
            . $this->getRegistracija() . "</p>";

            //ili drugi nacin echo $this->ispisVozila() . "Registracija: " . $this->getRegistracija();
        }
    }

    class Kamion extends Vozilo{

        private $nosivost;

        public function __construct($boja,$nosivost)
        {
            parent::__construct($boja,"Kamion");
            $this->setNosivost($nosivost);

        }

        public function setNosivost($nosivost){
            $this->nosivost=$nosivost;
        }

        public function getNosivost(){
            return $this->nosivost;
        }

        public function ispisiKamion(){
            echo "<p>Boja: " . $this->getBoja() . ", tip:" 
            . $this->getTip() . ", nosivost: " 
            . $this->getNosivost() . "</p>";
        }
    }

    class Motocikl extends Vozilo{
        
        private $brTockova;
        
        public function __construct($boja,$brTockova)
        {
            parent::__construct($boja,"Bicikl");
            $this->setBrTockova($brTockova);
        }

        public function setBrTockova($brTockova){
            $this->brTockova=$brTockova;
        }

        public function getBrTockova(){
            return $this->brTockova;
        }

        public function ispisiBickl(){
            echo "<p>Boja: " . $this->getBoja() . ", tip:" . $this->getTip() . ", nosivost: " . $this->getBrTockova() . "</p>";
        }
    }

    $obj= new Vozilo("crna", "bicikla");
    $obj->ispisVozila();
    
    // podvuceno zbog gita, ako negde na gitu postoji klasa Automobil i on sed buni, ali radi bez obzira na to
    $obj1 = new Automobil("crvena", 123456);
    $obj1->ispisiAuto();

    $obj2 = new Kamion("plava", 2500);
    $obj2->ispisiKamion();

    $obj3 = new Motocikl("siva", 2);
    $obj3->ispisiBickl();

    class Osoba{
        // atributima se pristupa sa this->atribut npr u seterima ili bilo gde drugde
        private $ime;
        private $prezime;
        private $godRodj;

        public function __construct($ime, $prezime, $godina)
        {
            // ako ovde stavimo defoltno za nesto, onda brisemo iz konstruktora i ne prosledjujemo pri instanciranju objekata kasnije
            $this->setIme($ime);
            $this->setPrezime($prezime);
            $this->setGodRodj($godina);
        }

        // preglednije prvo svi seteri kojima prosledjujemo nesto, pa onda svi geteri kojima se ne prosledjuje nista
        public function setIme($ime){
            $this->ime=$ime;
        }

        public function setPrezime($prezime){
            $this->prezime=$prezime;
        }

        public function setGodRodj($godRodj){
            $this->godRodj=$godRodj;
        }

        public function getIme(){
            return $this->ime;
        }

        public function getPrezime(){
            return $this->prezime;
        }

        public function getGodRodj(){
            return $this->godRodj;
        }

        // dva nacina za ispis preko getera i preko pristupanja direktno atributima
        public function ispisiOsobu(){
            // echo "$this->ime $this->prezime $this->godRdoj";
            echo "<br>Ime: " . $this->getIme() . "<br>Prezime: " . $this->getPrezime() . "<br>Godina rodjenja: " . $this->getGodRodj() . "<br>";
        }
    }


    class Zaposleni extends Osoba{
        // ime, prezime i godina se nasledjuju iz klase osoba
        private $plata;
        private $pozicija;

        public function __construct($ime, $prezime, $godina, $plata, $pozicija)
        {
            // ne mora da se zove isto kao u roditeljskom konstruktoru, mozemo da prosledimo, x,y,z, ako hocemo
            parent::__construct($ime, $prezime, $godina);
            $this->setPlata($plata);
            $this->setPozicija($pozicija);
        }

        public function setPlata($plata){
            $this->plata=$plata;
        }

        public function setPozicija($pozicija){
            $this->pozicija=$pozicija;
        }

        public function getPlata(){
            return $this->plata;
        }

        public function getPozicija(){
            return $this->pozicija;
        }

        public function ispisiZaposlenog(){
            $this->ispisiOsobu(); 
            echo "Plata: " . $this->getPlata() . "<br>Pozicija: " . $this->getPozicija() . "<br>";
        }
    }

    function Ekonomista(){
        if($this->getPozicija()=="Ekonomista"){
            echo "Zaposlen u ekonomskom sektoru";
        }
    }

    function prosecnaPlata($zaposleni){
        $sum=0;
        // kada radimo bez counta  onda $br=0;
        foreach($zaposleni as $radnik){
            $sum+=$radnik->getPlata();
            //$br++; ili $br+=1; ili $br=$br+1;
        }
        return $sum/count($zaposleni);
    }

// ne moze ovako ne valja obrati paznu
//     function natprosecna($zaposleni){
//         foreach($zaposleni as $radnik){
//             if($radnik->getPlata()>prosecnaPlata($zaposleni)){
//                 return true;
//             }else{
//                 return false;
//             }
//     }
// }

    function natprosecna2($zaposleni, $radnik){
        $prosek=prosecnaPlata($zaposleni);
            if($radnik->getPlata()>$prosek){
                return true;
            }else{
                return false;
            }
    }


    $o1=new Osoba("Ana", "Antic", 1990);
    $o1->ispisiOsobu();
    
    echo "<hr>";
    
    $z1=new Zaposleni("Pera", "Peric", 1992, 40000, "komercijalista");
    $z1->ispisiZaposlenog();
    $z2=new Zaposleni("Mika", "Mikic", 1991, 45000, "saradnik");
    $z2->ispisiZaposlenog();
    $z3=new Zaposleni("Laza", "Lazic", 1990, 50000, "ekonomista");
    $z3->ispisiZaposlenog();
    
    echo "<hr>";

    $zaposleni=array($z1,$z2, $z2);
    // mora echo jer u funkciji imamo samo vracanje vrednosti return
    echo prosecnaPlata($zaposleni);
    echo "<hr>";
    
    if(natprosecna2($zaposleni, $z3)==true){
        echo "Natprosecna";
    }else{
        echo "Ispod proseka";
    }

    echo "<hr>";

    class Persona{
        private $ime;
        private $prezime;
        private $godRodj;
        private $gradRodj;

        public function __construct($ime, $prezime, $godina, $grad)
        {
            $this->setIme($ime);
            $this->setPrezime($prezime);
            $this->setGodRodj($godina);
            $this->setGradRodj($grad);
        }

        public function setIme($ime){
            $this->ime=$ime;
        }

        public function setPrezime($prezime){
            $this->prezime=$prezime;
        }

        public function setGodRodj($godRodj){
            $this->godRodj=$godRodj;
        }

        public function setGradRodj($grad){
            $this->gradRodj=$grad;
        }

        public function getIme(){
            return $this->ime;
        }

        public function getPrezime(){
            return $this->prezime;
        }

        public function getGodRodj(){
            return $this->godRodj;
        }

        public function getGradRodj(){
            return $this->gradRodj;
        }

        public function ispisiPersonu(){
            echo "Ime: " . $this->getIme() . $this->getPrezime() . "<br>Godina rodjenja: " . $this->getGodRodj() . "<br>Grad rodjenja: " . $this->getGradRodj() . "<br>";
        }
    }

    class Kosarkas extends Persona{
        private $visina;
        private $tezina;
        private $brDresa;
        private $brPoena;
        private $brOdigranihUtakmica;
        private $pozicija;
        private $reprezentacija;

        public function __construct($i, $p, $god, $grad, $v, $t, $brD, $brP, $brOU, $poz, $r)
        {
            parent::__construct($i,$p,$god,$grad);
            $this->setVisina($v);
            $this->setTezina($t);
            $this->setBrDresa($brD);
            $this->setBrPoena($brP);
            $this->setBrOdigranihUtakmica($brOU);
            $this->setPozicija($poz);
            $this->setReprezentacija($r);
        }

        public function setVisina($v){
            $this->visina=$v;
        }

        public function setTezina($t){
            $this->tezina=$t;
        }

        public function setBrDresa($dres){
            $this->brDresa=$dres;
        }

        public function setBrPoena($poeni){
            $this->brPoena=$poeni;
        }

        public function setBrOdigranihUtakmica($ucesce){
            $this->brOdigranihUtakmica=$ucesce;
        }

        public function setPozicija($p){
            $this->pozicija=$p;
        }

        public function setReprezentacija($r){
            $this->reprezentacija=$r;
        }

        public function getVisina(){
            return $this->visina;
        }

        public function getTezina(){
            return $this->tezina;
        }

        public function getBrDresa(){
            return $this->brDresa;
        }

        public function getBrPoena(){
            return $this->brPoena;
        }

        public function getBrOdigranihUtakmica(){
            return $this->brOdigranihUtakmica;
        }

        public function getPozicija(){
            return $this->pozicija;
        }

        public function getReprezentacija(){
            return $this->reprezentacija;
        }

        public function ispisiKosarkasa(){
            $this->ispisiPersonu();
            echo "Visina: " . $this->getVisina() . "<br>Tezina: " . $this->getTezina() . "<br>Broj dresa: " . $this->getBrDresa() . "<br>Broj poena: " . $this->getBrPoena() . "<br>Broj odigranih utakmica: " . $this->getBrOdigranihUtakmica() . "<br>Pozicija: " . $this->getPozicija() . "<br>Reprezentacija: " . $this->getReprezentacija();
        }
    }

    function prosek($kosarkas){
        return $kosarkas->getBrPoena() / $kosarkas->getBrOdigranihUtakmica();
    }

    function teskiCentar($k){
        if($k->getPozicija()==5 && $k->getVisina()>=210 && $k->getTezina()>=110){
            // ovde mora return jer ne moze echo u echo, pa u spanu ne boji
            return " Teski centar";
        }
    }

    $k1=new Kosarkas("Mika", "Mikic", 1991, "Nis", 212, 115, 99, 80, 4, 5, "Srbija");
    $k2=new Kosarkas("Pera", "Peric", 1990, "Nis", 215, 105, 23, 70, 3, 1, "Srbija");
    $k3=new Kosarkas("Laza", "Lazic", 1992, "Nis", 200, 100, 7, 60, 2, 2, "Srbija");

    $kosarkasi=array($k1,$k2,$k3);
    teskiCentar($k1);

    foreach($kosarkasi as $k){
        $k->ispisiKosarkasa();
        echo "<span style='color:red'>" . teskiCentar($k) . "</span>";
        echo "<br>";
    }

?>