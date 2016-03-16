
<?php

class User {

    function __construct($db)
    {
        $this->db = $db;
    }

    public function login($username, $password)
    {
        $stmt = pg_query($db, "select password from users where name = " . $username);
        $row = pg_fetch_row($stmt);
        if ($row['password'] == $password) {
            $_SESSION['login_user'] = $username;
            return true;
        } else {
            return false;
        }
    }

}

?>