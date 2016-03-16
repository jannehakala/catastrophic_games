
<?php

class User {

    function __construct($db)
    {
        $this->db = $db;
    }

    public function login($username, $password)
    {
        $stmt = pg_query($this->db, "select password from users where name = '" . $username ."'");
        $row = pg_fetch_row($stmt);
        if ($row[0] == $password) {
            $_SESSION['login_user'] = $username;
            return true;
        } else {
            return false;
        }
    }

    public function register($username, $password)
    {
        $query = "INSERT INTO users(name, password) VALUES('" . $username . "', '" . $password . "')"; 
        $result = pg_query($this->db, $query);

        if (!$result) {
            $errormessage = pg_last_error();
            return false;
        }
        else {
            return true;
        }
    }

}

?>