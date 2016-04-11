<?php

function printf_array($format, $arr)
{
    return call_user_func_array('printf', array_merge((array)$format, $arr));
} 


class DrugIdentification {

    protected $template;
    protected $substance;
    protected $answer;
    protected $choices = array();

    private $templates = array(
        "What is the substance for %s?",
        "Select the substance for %s",
        "The doctor prescribes %s for the patient. What is the substance of this drug?",
        "The substance for %s is..."
    );
    
    function __construct($db)
    {
        $this->db = $db;
        $this->makeQuestion();
        $this->template = $this->templates[array_rand($this->templates, 1)];
    }

    protected function makeQuestion()
    {
        $result = $this->db->query("
select distinct laakenimi, selites
from pakkaus
join atc on pakkaus.atctun = atc.atctun
where laakenimi in
('burana', 'panadol', 'marevan', 'marevan forte', 'selexid', 'trimopan', 'amorion', 'v-pen mega', 'buventol easyhaler',
'seretide diskus', 'metforem', 'prednison', 'thyroxin', 'simvastatin', 'heinix', 'oxanest', 'lantus', 'nexium', 'lisinopril',
'furesis', 'adalat', 'albetol', 'tractocile')
order by rand() limit 3;"
        );
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $this->substance = $row['laakenimi'];
        $this->answer = $this->translateSubstance($row['selites']);
        $_SESSION['correct_answer'] = $this->answer;
        array_push($this->choices, $this->answer);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($this->choices, $this->translateSubstance($row['selites']));
        }
        shuffle($this->choices);
    }
    
    public function printQuestion()
    {
        printf($this->template, $this->substance);
        echo "<form method=POST>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio id={$choice} name=ans value={$choice}><label for={$choice}>{$choice}</label><br>";
        }
        echo '<input type=submit name=next value=Next class="btn btn-primary">';
        echo "</form>";
    }
	
	public function translateSubstance($index) 
	{
		$translations = array("Ibuprofeeni" => "Ibuprofen", "Parasetamoli" => "Paracetamol", "Varfariini" => "Warfarin", "Pivmesillinaami" => "Pivmecillinam", "Trimetopriimi" => "Trimethoprim", "Amoksisilliini" => "Amoxicillin", "Fenoksimetyylipenisilliini" => "Phenoxymethylpenicillin", "Metformiini" => "Metformin", "Salbutamoli" => "Salbutamol", "Salmeteroli ja flutikasoni" => "Salmeterol and fluticasone", "Prednisoni" => "Prednisone", "Levotyroksiininatrium" => "Levothyroxinum natricum", "Simvastatiini" => "Simvastatin", "Setiritsiini" => "Cetirizine", "Oksikodoni" => "Oxycodone", "Glargininsuliini" => "Insulin glargine", "Esomepratsoli" => "Esomeprazole", "Lisinopriili" => "Lisinopril", "Furosemidi" => "Furosemide", "Nifedipiini" => "Nifedipine", "Labetaloli" => "Labetalol", "Atosibaani" => "Atosiban");
		return $translations[$index];
	}
}


class DrugCalculation {
    
    function __construct()
    {
        // Choose a random question type.
        switch (mt_rand(1, 3)) {
            case 1:
                $this->question = new DCQuestion1();
                break;
            case 2:
                $this->question = new DCQuestion2();
                break;
            case 3:
                $this->question = new DCQuestion3();
                break;
        }
    }
    
    public function printQuestion()
    {
        $this->question->printQuestion();
    }
}

// Question type for DrugCalculation.
class DCQuestion1 {
    
    private $weight;
    private $choices = array();

    private $templates = array(
        "Amorion is used eg. treating urinary tract infections. It is available as an oral liquid with a strength<br>
         of 50mg / ml. For children's severe infections this should be administered 40mg / kg / day divided into three (3) doses.<br>
         Calculate a single dose in milliliters for a child weighing %d kg."

        "The child has been prescribed cefaclor for the treatment of severe infection 40mg / kg / day<br> divided into three (3) doses.<br>
		The strength of the cefaclor oral liquid is 50 mg / mL. How many milliliters is a single-dose,<br>
		when the child weighs %d kg? "
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
            echo "<input type=radio id={$choice} name=ans value={$choice}><label for={$choice}>{$choice} ml</label><br>";
        }
        // echo "<input type=number name=ans><br>";
        echo '<input type=submit name=next value=Next class="btn btn-primary">';
        echo "</form>";
    }
}

// Question type for DrugCalculation.
class DCQuestion2 {
    
    private $weight;
    private $data = array();
    private $choices = array();
    private $templates = array(
        "%dml solution of potassium permanganate contains %d percent of the substance.<br>
		How much water do you need to dilute the entire amount to %.1f percent?"
        
        "How much of water must be added in order to dilute a %dml percent solution to a %.1f percent solution?"
    );
    
    function __construct()
    {
        $this->makeQuestion();
        $this->template = $this->templates[array_rand($this->templates, 1)];
    }
    
    protected function makeQuestion()
    {
        $amount = 50 + mt_rand(0, 6) * 25;
        $start = mt_rand(2, 10);
        $target = 0.5;
        $answer = (2 * $start * $amount) / (2 * $target) - $amount;
        
        $alt = $answer + mt_rand(-5, 5) * 25;
        while ($alt == $answer) {
            $alt = $answer + mt_rand(-5, 5) * 25;
        }
        $alt2 = $answer + mt_rand(-5, 5) * 25;
        while ($alt2 == $answer || $alt2 == $alt) {
            $alt2 = $answer + mt_rand(-5, 5) * 25;
        }
        
        array_push($this->choices, $answer);
        array_push($this->choices, $alt);
        array_push($this->choices, $alt2);
        shuffle($this->choices);
        
        $_SESSION['correct_answer'] = $answer;
        array_push($this->data, $amount);
        array_push($this->data, $start);
        array_push($this->data, $target);
    }
    
    public function printQuestion()
    {
        printf_array($this->template, $this->data);
        echo "<form method=POST>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio id={$choice} name=ans value={$choice}><label for={$choice}>{$choice} ml</label><br>";
        }
        // echo "<input type=number name=ans><br>";
        echo '<input type=submit name=next value=Next class="btn btn-primary">';
        echo "</form>";
    }
}


// Question type for DrugCalculation.
class DCQuestion3 {
    private $data = array();
    private $choices = array();
    private $templates = array(
        "A patient uses Hydrocortison gel. The strength of the gel is %.1f percent.<br>
		How many milligrams of the substance, ie hydrocortisone, is in the tube,<br>
		which has a mass of %d g?"
    );
    
    function __construct()
    {
        $this->makeQuestion();
        $this->template = $this->templates[array_rand($this->templates, 1)];
    }
    
    protected function makeQuestion()
    {
        $start = 1 + mt_rand(0, 4) * 0.5;
        $amount = 20 + mt_rand(0, 3) * 20;
        $answer = $start / 100 * $amount * 1000;
        
        $alt = $answer + mt_rand(-5, 5) * 25;
        while ($alt == $answer) {
            $alt = $answer + mt_rand(-5, 5) * 25;
        }
        $alt2 = $answer + mt_rand(-5, 5) * 25;
        while ($alt2 == $answer || $alt2 == $alt) {
            $alt2 = $answer + mt_rand(-5, 5) * 25;
        }
        
        array_push($this->choices, $answer);
        array_push($this->choices, $alt);
        array_push($this->choices, $alt2);
        shuffle($this->choices);
        
        $_SESSION['correct_answer'] = $answer;
        array_push($this->data, $start);
        array_push($this->data, $amount);
    }
    
    public function printQuestion()
    {
        printf_array($this->template, $this->data);
        echo "<form method=POST>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio id={$choice} name=ans value={$choice}><label for={$choice}>{$choice} mg</label><br>";
        }
        // echo "<input type=number name=ans><br>";
        echo '<input type=submit name=next value=Next class="btn btn-primary">';
        echo "</form>";
    }
}


class UnitConversion {
    
    function __construct()
    {
        // Choose a random question type.
        switch (mt_rand(1, 2)) {
            case 1:
                $this->question = new UCQuestion1();
                break;
            case 2:
                $this->question = new UCQuestion2();
                break;
        }
    }
    
    public function printQuestion()
    {
        $this->question->printQuestion();
    }
}


// Question type for UnitConversions.
class UCQuestion1 {
    
    private $data = array();
    private $choices = array();
    private $templates = array(
        "The doctor has prescribed a certain drug for the patient %d micrograms. The strength of one tablet is %.2f milligrams.<br>
         How many tablets are given to the patient? "

        "The medicine should be administered %d micrograms. How many tablets do you give to the patient, the strength of one tablet is %.2f milligrams?"
    );
    
    function __construct()
    {
        $this->makeQuestion();
        $this->template = $this->templates[array_rand($this->templates, 1)];
    }
    
    protected function makeQuestion()
    {
        // Calculate answer.
        $tablettia = mt_rand(1, 8) * 0.25;
        $concentration = mt_rand(1, 4) / 10;
        $startunit = ($concentration * 1000) * $tablettia;
        $this->answer = $tablettia;
        
        // Generate wrong answers.
        $alt = $tablettia + mt_rand(-1, 3) * 0.25;
        while ($alt == $tablettia) {
            $alt = $tablettia + mt_rand(-1, 3) * 0.25;
        }
        $alt2 = $tablettia + mt_rand(-1, 3) * 0.25;
        while ($alt2 == $tablettia || $alt2 == $alt) {
            $alt2 = $tablettia + mt_rand(-1, 3) * 0.25;
        }
        
        array_push($this->choices, $tablettia);
        array_push($this->choices, $alt);
        array_push($this->choices, $alt2);
        shuffle($this->choices);
        
        $_SESSION['correct_answer'] = $this->answer;
        array_push($this->data, $startunit);
        array_push($this->data, $concentration);
    }
    
    public function printQuestion()
    {
        printf_array($this->template, $this->data);
        echo "<form method=POST>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio id={$choice} name=ans value={$choice}><label for={$choice}>{$choice}</label><br>";
        }
        echo '<input type=submit name=next value=Next class="btn btn-primary">';
        echo "</form>";
    }
}


// Question type for UnitConversions.
class UCQuestion2 {
    
    private $data = array();
    private $choices = array();
    private $templates = array(
        "The patient has been prescribed for %d drops of solution in the ear %d times a day.<br>
         Each ml of drops contain %.2f mg of the substance.<br>
         If 1 ml is equivalent to 20 drops, how much of the substance the patient receives in a day?<br>
         Give your answer in micrograms.",
        
        "The patient has been prescribed to use ear drops %d drops %d times a day. How much of the active substance<br>
         the patient receives a day, when one drop constains %.2f milligrams of active ingredient? 1ml = 20 drops.",
        
        "Alice has been prescribed to use Locacorten-vioform medicine to treat her ear. Guideline is %d drops<br>
         %d times a day. The treatment lasts for 10 days. One (1) milliliter of ear drops contains<br>
         flumethasone pivalate %.2f mg. If 1ml is equivalent to 20 drops, how much<br>
         flumethasone pivalate Alice gets a day? Give your answer in micrograms."
    );
    
    function __construct()
    {
        $this->makeQuestion();
        $this->template = $this->templates[array_rand($this->templates, 1)];
    }
    
    protected function makeQuestion()
    {
        // Calculate answer.
        $tippaa = mt_rand(2, 4);
        $kertaa = mt_rand(2 ,4);
        $vahvuus = mt_rand(1, 4) / 10;
        $annos = $tippaa * $kertaa;
        $ml = $annos / 20;
        $laake = $vahvuus * 1000;
        $vast = $laake * $ml;
        $this->answer = $vast;
        
        // Generate wrong answers.
        $alt = $this->answer + mt_rand(-5, 5) * 2;
        while ($alt == $vast) {
            $alt = $this->answer + mt_rand(-5, 5) * 2;
        }
        $alt2 = $this->answer + mt_rand(-5, 5) * 2;
        while ($alt2 == $vast || $alt2 == $alt) {
            $alt2 = $this->answer + mt_rand(-5, 5) * 2;
        }
        
        array_push($this->choices, $this->answer);
        array_push($this->choices, $alt);
        array_push($this->choices, $alt2);
        shuffle($this->choices);
        
        $_SESSION['correct_answer'] = $vast;
        array_push($this->data, $tippaa);
        array_push($this->data, $kertaa);
        array_push($this->data, $vahvuus);
    }
    
    public function printQuestion()
    {
        printf_array($this->template, $this->data);
        echo "<form method=POST>";
        foreach ($this->choices as $choice) {
            echo "<input type=radio id={$choice} name=ans value={$choice}><label for={$choice}>{$choice} mg</label><br>";
        }
        echo '<input type=submit name=next value=Next class="btn btn-primary">';
        echo "</form>";
    }
}


// Exam quiz. Has questions from every category.
class ExamQuiz {

    function __construct($db)
    {
        // Choose a random question type.
        switch (mt_rand(1, 3)) {
            case 1:
                $this->question = new DrugIdentification($db);
                break;
            case 2:
                $this->question = new DrugCalculation();
                break;
            case 3:
                $this->question = new UnitConversion();
                break;
        }
    }
    
    public function printQuestion()
    {
        $this->question->printQuestion();
    }
}