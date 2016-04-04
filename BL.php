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
			<th>userid</th>
			<th>points</th>
			<th>Date</th>
			</tr>
			</thead>
			<tbody>';
	$sql = <<<SQL
	select points,solve_date from exercise_user where "User_id" = (select id from users where name = '$username');
SQL;
	
	$stmt = pg_query($db, $sql);
	$cnt = pg_num_rows($stmt)-1;
	$apu = 0;
	while(($arr = pg_fetch_array($stmt,$apu,PGSQL_ASSOC)) ) {
    	echo "<tr><td>admin</td><td>".$arr['points']."</td><td>".$arr['user_date']."</td></tr>\n";
		$apu++;	
		if ($cnt == 0)  { 
                break; 
        } 
		$cnt--; 
	}
	echo "</tbody></table>";
}

?>