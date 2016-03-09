<?php
// Connecting, selecting database
$db = pg_connect("host=ec2-54-83-56-31.compute-1.amazonaws.com dbname=d9m4a5line7roh user=aghezwnhlovcgi password=G1Rqb8FklwiOiwI4an8AoNOj86")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query


$sql =<<<EOF
CREATE TABLE COMPANY
      (ID INT PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      AGE            INT     NOT NULL,
      ADDRESS        CHAR(50),
      SALARY         REAL);

EOF;

$ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }


pg_close($dbconn);

?>