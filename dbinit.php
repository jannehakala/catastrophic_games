<?php
// Connecting, selecting database
AWS::SCARABEUS::Base.establish_connection!(
  :host   => ENV['HOST_KEY'],
  :dbname => ENV['DB_KEY'],
  :user   => EVL['USER_KEY'],
  :password=>EVL['PASSWORD_KEY']
)
$db = pg_connect("host dbname user password")
    or die('Could not connect: ' . pg_last_error());


echo "toimii";


pg_close($dbconn);

?>