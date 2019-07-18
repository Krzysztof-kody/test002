<style>
    .kobieta {color: pink;}
    .mezczyzna {color: blue;}

</style>

<?php
    class Imiona{
        public $nazwa;
        public $plec;
        public $id;

        public function __construct( $n, $p, $id)
        {
            $this->nazwa = $n;
            $this->plec = $p;
            $this->id = $id;
        }
        public function wyswietl($bold){
            if($bold == 1) echo "<b>";
            if($this->plec == "mężczyzna")
                echo "<span class=mezczyzna>";
            else {
                echo "<span class=kobieta>";
            }
            echo $this->nazwa . " " . $this->plec . "<a href=?usun=" . $this->id . "> x </a> <a href=?edytuj=" . $this->id . "> E </a><br>";
            echo "</span>";
            if($bold == 1) echo "</b>";
        }

        public function edytuj(){
            echo "
            <form>
                <input name=imie value=" . $this->nazwa . "> <input name=plec value=" . $this->plec . "> <input type=submit>
            </form>
            
            ";
        }
    }

    $imie[] = new Imiona("Andrzej", "mężczyzna",1);
    $imie[] = new Imiona("Maja", "kobieta",2);
    $imie[] = new Imiona("Andrzej", "mężczyzna",3);
    $imie[] = new Imiona("Maja", "kobieta",4);
    

    $i = 0;
   foreach ($imie as $I){
       $i++;
       $I->wyswietl($i%2);
       if(isset($_GET["edytuj"]))
       {
           if($_GET["edytuj"] == $I->id)
                $I->edytuj();
       }
   }

?>