
<?php

class User {

    function __construct($db)
    {
        $this->db = $db;
    }

    public function login($username, $password)
    {
        try {

            $stmt = pg_query($this->db, "select password from users where name = '" . $username ."'");
            $row = pg_fetch_row($stmt);
            if ($row['password'] == $password) {
                $_SESSION['login_user'] = $username;
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

?>