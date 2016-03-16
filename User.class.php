
<?php

class User {

    function __construct($db)
    {
        $this->db = $db;
    }

    function __construct() {}

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

    public function logout()
    {
        unset($_SESSION['login_user']);
    }

    public function register($username, $password)
    {
        $result = pg_query($this->db, "INSERT INTO users(name, password) VALUES('" . $username . "', '" . $password . "')");

        if ($result) {
            return true;
        }
        else {
            return false;
        }
    }

}

?>