<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

function set_stats($username, $exercise, $value){
require_once("dbinit.php");
	$sql = <<<SQL
	INSERT INTO exercise_user(points, "User_id", "Exercise_id") VALUES($value,(select id from users where name = '$username'), (select id from exercise where info = '$exercise'));		
SQL;
	$result = pg_query($db, $sql);	
}
function get_stats($username){ 
require_once("dbinit.php");
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
	$apu = 0;
	$apu2;
	while(($arr = pg_fetch_array($stmt,$apu,PGSQL_ASSOC)) ) {
	//$apu2 =	get_exercise($arr['Exercise_id']);
    	echo "<tr><td>".$arr['Exercise_id']."</td><td>".$arr['points']."</td><td>".$arr['solve_date']."</td></tr>\n";
		$apu++;	
		if ($cnt == 0)  { 
                break; 
        } 
		$cnt--; 
	}
	echo "</tbody></table>";
}
function get_exercise($arr){
		$apu2 ="";
		if($arr = 1){
			$apu2 = "Drugcalculations";
		}
		if($arr = 2){
			$apu2 = "Agents";
		}
		if($arr = 3){
			$apu2 = "Unit conversions";
		}
		else{
			$apu2	= "unkown";
		}
		return $apu2;
}

?>