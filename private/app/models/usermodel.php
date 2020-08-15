<?php

class UserModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function userAuth($email, $password) {
        $auth_email = $email;
        $auth_pass = $password;

        $sql = "SELECT * FROM `author` WHERE `email` = :email";
        $stmt = $this->db->prepare($sql);
        $count = $stmt->execute(array("email"=>$auth_email));

        $row = $stmt->fetch();

        $password_hash = $row[3];
        $isAuthenticated = false;
        if (isset($password_hash)) {
            $isAuthenticated = password_verify($auth_pass, $password_hash);
            if ($isAuthenticated) {
                
                $_SESSION['first_name'] = $row[1];
                $_SESSION['last_name'] = $row[2];
                $_SESSION['email'] = $auth_email;
                
            }
        }

        return $isAuthenticated;
    }

}

?>