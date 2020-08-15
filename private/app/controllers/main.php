<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    /*
     * http://localhost/
     */
    function Index () {
        $data = Array("title" => "Home");
        $this->view("template/header", $data);
        $this->view("main/index");
        $this->view("template/menu");
        $this->view("template/footer"); 
    }

    function Logoff () {

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header("Location: /");

    }

}

?>