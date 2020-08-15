<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }

    // function Index () {
        
    //     $loggedIn = $_SESSION["isLoggedIn"];
        
    //     if ($_SERVER["REQUEST_METHOD"] == "GET" && $loggedIn) {
    //         $this->view("template/header");
    //         $this->view("user/loggedIn");
    //         $this->view("template/menu");
    //         $this->view("template/footer");
            
    //     } else if ($_SERVER["REQUEST_METHOD"] == "GET" && !$loggedIn) {
    //         $this->view("template/bsHeader");
    //         $this->view("user/signin");
    //         $this->view("template/bsFooter");

    //     } 
        
    // }

    function Index () {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && (empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"])) {
            // $verify = password_hash("password", PASSWORD_DEFAULT);
            $password = htmlentities($_POST["password"]);
            $email = htmlentities($_POST["email"]);

            // Query password based on email.
                
                $this->model("usermodel");
                $auth = $this->usermodel->userAuth($email, $password);
                echo($auth);

                if ($auth) {
                    $data = Array("header" => "Success");
                    $this->view("template/header", $data);
                    $this->view("user/success");
                    $this->view("template/menu");
                    $this->view("template/footer");
                    
                    $isVerified = $auth;
                    $_SESSION["isLoggedIn"] = $isVerified;
                    
                    //header("Location: /");
                } else {
                    echo("Not Authenticated");
                    echo("<br>");
                    echo("Auth: " . $auth);
                    echo("<br>");
                    echo("Email: " . $email);
                    echo("<br>");
                    echo("Password: " . $password);
                    echo("<br>");
                    echo("isVerified: " . $isVerified);

                }
            
        } else {
            // display form
            if (empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"]) {
                    $this->view("template/bsHeader");
                    $this->view("user/signin");
                    $this->view("template/bsFooter");
            } else {
                header("Location: /");
            }
            
        }
    }

    function Logout () {
        $_SESSION["isLoggedIn"] = false;
        unset($_SESSION["isLoggedIn"]);
        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie("PHPSESSID", '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        header("Location: /");
    }
    

    

}

?>