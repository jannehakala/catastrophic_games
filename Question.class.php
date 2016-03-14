<?php

class Question {

    private $questions = array(
        'Burana' => 'ibuprofeeni',
        'Panadol' => 'parasetamoli',
        'Marevan' => 'varfariini',
        'Selexid' => 'pivmesillinaami',
        'Trimopan' => 'trimetopriimi',
        'Amorion' => 'amoksisilliini',
        'Metforem' => 'metformiini',
        'Thyroxin' => 'levyotyroksiininatrium',
        'Heinix' => 'setiritsiini',
        'Oxanest' => 'oksikodoni',
        'Lantus' => 'glarginsuliini',
        'Nexium' => 'esomepratsoli',
        'Adalat' => 'nifedipiini',
        'Albetol' => 'labetalolihydrokloridi',
    );
    
    private $template = "Mikä on valmisteen %s vaikuttava aine?";
    
    function __construct() {
        $this->generateQuestions();
    }
    
    private function generateQuestions()
    {
        $this->choices = array();
        $this->correct = array_rand($this->questions, 1);
        while (in_array($this->correct, $_SESSION['spent'])) {
            $this->correct = array_rand($this->questions, 1);
        }
        array_push($_SESSION['spent'], $this->correct);
        $_SESSION['correct_answer'] = $this->questions[$this->correct];
        array_push($this->choices, $this->correct);
        
        $this->alt1 = array_rand($this->questions, 1);
        while (in_array($this->alt1, $this->choices, true)) {
            $this->alt1 = array_rand($this->questions, 1);
        }
        array_push($this->choices, $this->alt1);
        
        $this->alt2 = array_rand($this->questions, 1);
        while (in_array($this->alt2, $this->choices, true)) {
            $this->alt2 = array_rand($this->questions, 1);
        }
        array_push($this->choices, $this->alt2);
        shuffle($this->choices);
    }
    
    public function printQuestion()
    {
        echo "<h2>";
        printf($this->template, $this->correct);
        echo "</h2>";
        echo "<form method=POST>";
        $i = 0;
        foreach ($this->choices as $value) {
            if ($i++ == 0) $checked = "checked";
            else $checked = "";
            echo "<input type=radio name=ans value={$this->questions[$value]} {$checked}> {$this->questions[$value]}<br>";
        }
        echo "<input type=submit name=next value=next>";
        echo "</form>";
    }
}