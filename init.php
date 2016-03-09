<?php
// Connecting, selecting database
$db = pg_connect("host=ec2-54-83-56-31.compute-1.amazonaws.com dbname=d9m4a5line7roh user=aghezwnhlovcgi password=G1Rqb8FklwiOiwI4an8AoNOj86")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query



   $sql =<<<EOF
      CREATE TABLE EXECATEGORY
      (ID INT PRIMARY KEY     NOT NULL,
      CODE           TEXT    NOT NULL,
      NAME       	 TEXT	NOT NULL);

EOF;

$ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "taulu luotiin jes\n";
   }


pg_close($dbconn);

?>