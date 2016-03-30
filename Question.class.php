<?php


class VaikuttavaAine {

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
        $result = $this->db->query("select laakenimi, ainenimi from pakkaus join laakeaine on pakkaus.pakkausnro = laakeaine.pakkausnro order by rand() limit 3");
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
        echo "<form>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio name=ans value={$choice}>{$choice}<br>";
        }
        echo "<input type=submit name=next value=Seuraava>";
        echo "</form>";
    }
}


class Laakelasku {
    
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
        echo "<form>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio name=ans value={$choice}>{$choice} ml<br>";
        }
        echo "<input type=submit name=submit value=Seuraava>";
        echo "</form>";
    }
}