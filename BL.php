<?php

function set_stats(){
	$username= 'Teemu';
	$exercise = 'drugcalculations';
	$value = 2;
	$sql = <<<SQL
	INSERT INTO exercise_user(points, "User_id", "Exercise_id") VALUES($value,(select id from users where name = '$username'), (select id from exercise where info = '$exercise'));		
SQL;

	$result = pg_query($this->db, $sql);	
}
function get_stats($username){ 
 //pohhjaaaa
 /*echo "<table>\n"; 
	echo '<thead>
		<tr>
		<th>USERID</th>
		</tr>
		</thead>
		<tbody>';
	$stmt = pg_query($this->db, "select id from users where name = '" . $username ."'");
	$row = pg_fetch_row($stmt);
	$stmt = pg_query($this->db, "select* from exercise_user where name = '" . $row[0] ."'");
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    	echo "<tr><td>{$row['User_id']}</td><td>{$row['points']}</td></tr>\n";
	}
	echo "</tbody></table>";*/
}

?>