<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

function set_stats($username, $exercise, $value){
    require_once("dbinit.php");
    $date = date('Y-m-d H:i:s');
    $sql = <<<SQL
    INSERT INTO exercise_user(points, "User_id", "Exercise_id", solve_date) VALUES($value,(select id from users where name = '$username'), (select id from exercise where info = '$exercise'), '$date');        
SQL;
    $result = pg_query($db, $sql);  
}



function printstatistics($username)
{
    include ("dbinit.php");
    $query = <<<QUERY
select name, points, solve_date, info from exercise_user join users on ("User_id" = users.id) join exercise on ("Exercise_id" = exercise.id) where name = '$username' order by solve_date desc limit 10;
QUERY;
    $stmt = pg_query($db, $query);
    echo "<table class='table'>\n";
    echo "<tr>";
    echo "<th>Exercise</th>";
    echo "<th>Points</th>";
    echo "<th>Date</th>";
    echo "</tr>";
    while ($row = pg_fetch_row($stmt)) {
        $date = date_create_from_format('Y-m-d H:i:s', $row[2]);
        $datestr = $date->format("d.m.Y / H:i");
        
        echo "<tr>";
        echo "<td>$row[3]</td><td>$row[1]</td><td>$datestr</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function printgraph($quiztype)
{
    include ("dbinit.php");
    $username = $_SESSION['login_user'];
    $query = <<<QUERY
select name, points, solve_date, info from exercise_user join users on ("User_id" = users.id) join exercise on ("Exercise_id" = exercise.id) where name = '$username' and info = '$quiztype' order by solve_date asc limit 10;
QUERY;
    $stmt = pg_query($db, $query);
    if (pg_num_rows($stmt) == 0) return;

    echo "var data = google.visualization.arrayToDataTable([";
    echo "['Date', '$quiztype'],";
    while ($row = pg_fetch_row($stmt)) {
        echo "['$row[2]',  $row[1]],";
    }
    echo "]);";

    echo "var options = {";
    echo "title: '$quiztype',";
    echo "curveType: 'function',";
    echo "legend: { position: 'bottom' }};";

    echo "var chart = new google.visualization.LineChart(document.getElementById('curve_chart_" . $quiztype . "'));";

    echo "chart.draw(data, options);";
}




function get_stats($username, $number){ 
include("dbinit.php");
    echo "<table class='table'>\n"; 
    echo '<thead>
            <tr>
            <th>Exercise</th>
            <th>Points</th>
            <th>Date</th>
            </tr>
            </thead>
            <tbody>';
    $sql = <<<SQL
    select points,solve_date,"Exercise_id" from exercise_user where "User_id" = (select id from users where name = '$username');
SQL;

    
    $stmt = pg_query($db, $sql);
    $cnt = pg_num_rows($stmt)-1;
    $cnt2 = pg_num_rows($stmt)-5;
    $apu = pg_num_rows($stmt)-1;
    $apu2;
    $stack = array();
    $aarray = array();
    
    while(($arr = pg_fetch_array($stmt,$apu,PGSQL_ASSOC)) ) {
        $apu2 = get_exercise($arr['Exercise_id']);
        $date = date_create_from_format('Y-m-d H:i:s', $arr['solve_date']);
        echo "<tr><td>".$apu2."</td><td>".$arr['points']."</td><td>" . $date->format("d.m.Y / H:i") . "</td></tr>\n";
        $apu--; 
        //STATISTICS PALKKI
        if($number == 0){
            if ($cnt == 0 || $cnt == $cnt2)  { 
                break; 
        } 
        }
        //STATISTIC SIVU
        if($number == 1){
    
        array_push($stack, $apu2, $arr['points']);          
        array_push($aarray, $stack);
        unset($stack);
        $stack = array();       
            if ($cnt == 0)  { 
            return $aarray;
        break; 
        }   
        }
        $cnt--; 
    }
    echo "</tbody></table>";
}
function get_exercise($arr){
        $apu3 ="";
        if($arr == 1){
            $apu3 = "Drugcalculations";
        }
        elseif($arr == 2){
            $apu3 = "Agents";
        }
        elseif($arr == 3){
            $apu3 = "Unit conversions";
        }
        else{
            $apu3   = "unkown";
        }
        return $apu3;
}

?>