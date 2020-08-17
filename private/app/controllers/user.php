<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }

    function Index () {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && (empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"])) {

            $form_csrf = htmlentities($_POST["csrf"]);
            $cookie_csrf = htmlentities($_COOKIE["csrf"]);
            $csrf = $_SESSION["csrf"];

            if ($csrf == $form_csrf && $csrf == $cookie_csrf) {

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
                echo("Bad csrf token.");
                // echo("<br>");
                // echo($csrf);
                // echo("<br>");
                // echo($cookie_csrf);
                // echo("<br>");
                // echo($form_csrf);
            }
            
            
        } else {
            // display form
            if (empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"]) {
                    $csrf = random_int(10000, 100000000);
                    $_SESSION['csrf'] = $csrf;
                    setcookie("csrf", $csrf);
                    
                    $this->view("template/bsHeader");
                    $this->view("user/signin", array("csrf" => $csrf));
                    $this->view("template/bsFooter");
            } else {
                header("Location: /");
            }
            
        }
    }

    //no model version
    //     function Index () {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST" && (empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"])) {

    //         $form_csrf = htmlentities($_POST["csrf"]);
    //         $cookie_csrf = htmlentities($_COOKIE["csrf"]);
    //         $csrf = $_SESSION["csrf"];

    //         if ($csrf == $form_csrf && $csrf == $cookie_csrf) {
    //             $verify = password_hash("iHeartClark", PASSWORD_DEFAULT);
    //             $password = htmlentities($_POST["password"]);
    //             $email = htmlentities($_POST["email"]);

    //             // Query password based on email.
                    
    //                 $this->model("usermodel");
    //                 $auth = $this->usermodel->userAuth($email, $password);
    //                 echo($auth);

    //                 if ($verify) {
    //                     $data = Array("header" => "Success");
    //                     $this->view("template/header", $data);
    //                     $this->view("user/success");
    //                     $this->view("template/menu");
    //                     $this->view("template/footer");
                        
    //                     $isVerified = $verify;
    //                     $_SESSION["isLoggedIn"] = $verify;
                        
    //                     //header("Location: /");
    //                 } else {
    //                     echo("Not Authenticated");
    //                     echo("<br>");
    //                     echo("Auth: " . $auth);
    //                     echo("<br>");
    //                     echo("Email: " . $email);
    //                     echo("<br>");
    //                     echo("Password: " . $password);
    //                     echo("<br>");
    //                     echo("isVerified: " . $isVerified);

    //                 }
    //         } else {
    //             echo("Bad csrf token.");
    //             // echo("<br>");
    //             // echo($csrf);
    //             // echo("<br>");
    //             // echo($cookie_csrf);
    //             // echo("<br>");
    //             // echo($form_csrf);
    //         }
            
    //     } else {
    //         // display form
    //         if (empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"]) {
    //                 $csrf = random_int(10000, 100000000);
    //                 // echo($csrf);
    //                 $_SESSION['csrf'] = $csrf;
    //                 setcookie("csrf", $csrf);
                    
    //                 $this->view("template/bsHeader");
    //                 $this->view("user/signin", array("csrf" => $csrf));
    //                 $this->view("template/bsFooter");
    //         } else {
    //             header("Location: /");
    //         }
            
    //     }
    // }

    function Logout () {
        $_SESSION["isLoggedIn"] = false;
        unset($_SESSION["isLoggedIn"]);
        
        // Unset all of the session variables.
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie("PHPSESSID", '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        //header("Location: /");
        $data = Array("header" => "Successfully Logged Out");
        $this->view("template/header", $data);
        $this->view("user/loggedOut");
        $this->view("template/menu");
        $this->view("template/footer");
    }
    

    

}

?>