<?php
// Connecting, selecting database
$db = pg_connect(":host=>EVL['HOST_KEY], :dbname=>EVL['DB_KEY'], :user=>EVL['USER_KEY'], :password=>EVL['PASSWORD_KEY'")
    or die('Could not connect: ' . pg_last_error());


echo "toimii";


pg_close($dbconn);

?>