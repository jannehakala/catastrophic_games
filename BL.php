<?php

function set_sats($value, $username){
	$result = pg_query($this->db, "INSERT INTO exercise_user(points) VALUES('" . $value . "') WHERE User_id = (select id from users where name = '" . $username ."')");	
}
function get_stats(){
 /*  
 //pohhjaaaa
 echo "<table>\n"; 
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