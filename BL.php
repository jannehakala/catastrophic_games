<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
$aarray = array();
function set_stats($username, $exercise, $value){
require_once("dbinit.php");
	$sql = <<<SQL
	INSERT INTO exercise_user(points, "User_id", "Exercise_id") VALUES($value,(select id from users where name = '$username'), (select id from exercise where info = '$exercise'));		
SQL;
	$result = pg_query($db, $sql);	
}
function get_stats($username, $number){ 
include("dbinit.php");
	echo "<table>\n"; 
	echo '<thead>
			<tr>
			<th>Exercise</th>
			<th>points</th>
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
	
	
	while(($arr = pg_fetch_array($stmt,$apu,PGSQL_ASSOC)) ) {
	$apu2 =	get_exercise($arr['Exercise_id']);
    	echo "<tr><td>".$apu2."</td><td>".$arr['points']."</td><td>".$arr['solve_date']."</td></tr>\n";
		$apu--;	
		//STATISTICS PALKKI
		if($number == 0){
			if ($cnt == 0 || $cnt == $cnt2)  { 
                break; 
        } 
		}
		//STATISTIC SIVU
		if($number == 1){
	
		array_push($stack, "asdasd");			
		array_push($this-> aarray, $stack);
		unset($stack);
		$stack = array();		
			if ($cnt == 0)  { 
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
			$apu3	= "unkown";
		}
		return $apu3;
}
function get_list(){
	return $this->aarray;
}
?>