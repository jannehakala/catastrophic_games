<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
class DrugIdentification {

    protected $template;
    protected $substance;
    protected $answer;
    protected $choices = array();

    private $templates = array(
        "Mikä on valmisteen %s vaikuttava aine?",
        "Valitse vaikuttava aine valmisteelle %s",
        "Lääkäri määrää potilaalle %s. Mikä on sen vaikuttava aine?"
    );
    
    function __construct($db)
    {
        $this->db = $db;
        $this->makeQuestion();
        $this->template = $this->templates[array_rand($this->templates, 1)];
    }

    protected function makeQuestion()
    {
        $result = $this->db->query("select distinct laakenimi, ainenimi from pakkaus join laakeaine on pakkaus.pakkausnro = laakeaine.pakkausnro where laakemuototun = 994 or laakemuototun = 889 or laakemuototun = 839 or laakemuototun = 565 or laakemuototun = 562 or laakemuototun = 535 or laakemuototun = 510 or laakemuototun = 334 order by rand() limit 3;");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $this->substance = $row['laakenimi'];
        $this->answer = $row['ainenimi'];
        $_SESSION['correct_answer'] = $this->answer;
        array_push($this->choices, $this->answer);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($this->choices, $row['ainenimi']);
        }
        shuffle($this->choices);
    }
    
    public function printQuestion()
    {
        printf($this->template, $this->substance);
        echo "<form method=POST>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio name=ans value={$choice}>{$choice}<br>";
        }
        echo "<input type=submit name=next value=Seuraava>";
        echo "</form>";
    }
}


class DrugCalculation {
    
    private $weight;
    private $choices = array();

    private $templates = array(
        "Amoriinia käytetaan mm. virtsatietulehduksen hoitoon. Sitä on olemassa oraalinesteenä, jonka vahvuus<br>
        on 50mg/ml. Lasten vaikeisiin infektioihin tätä tulee antaa 40mg/kg/vrk jaettuna kolmeen (3) antokertaan.<br>
        Laske kerta-annos %d kg painavalle lapselle.",
        "Lapselle on määrätty vaikean infektion hoitoon kefakloria per os 40 mg painokiloa kohti vuorokaudessa,<br>
        jaettuna kolmeen annokseen. Kefaklori- oraalinesteen vahvuus on 50 mg / ml. Montako millilitraa on kerta-annos,<br>
        kun lapsi painaa %d kg?"
    );
    
    function __construct()
    {
        $this->makeQuestion();
        $this->template = $this->templates[array_rand($this->templates, 1)];
    }
    
    protected function makeQuestion()
    {
        $this->weight = rand(20, 35);
        $this->answer = number_format(round(40 * $this->weight / 50 / 3, 2), 2);
        $_SESSION['correct_answer'] = $this->answer;
        $alt1 = number_format(round($this->answer - rand(-2, 2) * (mt_rand() / mt_getrandmax()), 2), 2);
        while ($alt1 == $this->answer) {
            $alt1 = number_format(round($this->answer - rand(-2, 2) * (mt_rand() / mt_getrandmax()), 2), 2);
        }
        $alt2 = number_format(round($this->answer - rand(-2, 2) * (mt_rand() / mt_getrandmax()), 2), 2);
        while ($alt2 == $alt1 || $alt2 == $this->answer) {
            $alt2 = number_format(round($this->answer - rand(-2, 2) * (mt_rand() / mt_getrandmax()), 2), 2);
        }
        array_push($this->choices, $this->answer);
        array_push($this->choices, $alt1);
        array_push($this->choices, $alt2);
        shuffle($this->choices);
    }
    
    public function printQuestion()
    {
        printf($this->template, $this->weight);
        echo "<form method=POST>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio name=ans value={$choice}>{$choice} ml<br>";
        }
        echo "<input type=submit name=next value=Seuraava>";
        echo "</form>";
    }
}

function printf_array($format, $arr)
{
    return call_user_func_array('printf', array_merge((array)$format, $arr));
} 

class UnitConversion {
    
    private $choices = array();

    private $templates = array(
        "Lääkäri on määrännyt potilaalle lääkettä %d mikrogrammaa. Tabletin vahvuus on %.2f milligrammaa.<br>
        Montako tablettia potilaalle annetaan?"
    );
    
    function __construct()
    {
        $this->makeQuestion();
        $this->template = $this->templates[array_rand($this->templates, 1)];
    }
    
    protected function makeQuestion()
    {
        $this->startunit = 50;
        $this->concentration = mt_rand(1, 50) / 100;
        $this->answer = round($this->startunit / ($this->concentration * 1000), 2);
        $_SESSION['correct_answer'] = $this->answer;
        array_push($this->choices, $this->answer);
        array_push($this->choices, round($this->answer + mt_rand(-20, 20) / 100, 2));
        array_push($this->choices, round($this->answer + mt_rand(-20, 20) / 100, 2));
        shuffle($this->choices);
    }
    
    public function printQuestion()
    {
        $data = array($this->startunit, $this->concentration);
        printf_array($this->template, $data);
        echo "<form method=POST>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio name=ans value={$choice}>{$choice}<br>";
        }
        echo "<input type=submit name=next value=Seuraava>";
        echo "</form>";
    }
}