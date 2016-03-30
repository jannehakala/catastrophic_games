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
			<th>USERID</th>
			</tr>
			</thead>
			<tbody>';
	$sql = <<<SQL
	select points from exercise_user where "User_id" = (select id from users where name = '$username');
SQL;
	$stmt = pg_query($db, $sql);
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    	echo "<tr><td>".$row['User_id']."</td><td>".$row['points']."</td></tr>\n";
	}
	echo "</tbody></table>";
}

?>