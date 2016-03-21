
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
        if (password_verify($password, $row[0])) {
            $_SESSION['login_user'] = $username;
            return true;
        } else {
            return false;
        }
    }

    public function register($username, $password)
    {
        $pw = password_hash($password, PASSWORD_BCRYPT);
        $result = pg_query($this->db, "INSERT INTO users(name, password) VALUES('" . $username . "', '" . $pw . "')");

        if ($result) {
            return true;
        }
        else {
            return false;
        }
    }

}

?>