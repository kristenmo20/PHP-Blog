<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }

    /*
      * http://localhost/
    */

    function Index () {
        echo("This is the user controller");
    }

    function SignIn() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = array('title' => 'PHP Blog');

        //send out the signup form
        $this->view("template/bsHeader", $data);
        $this->view("user/signin");
        $this->view("template/bsFooter");

        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Authenticate
            //echo("You posted the form.");
            $email = htmlentities($_POST["email"]);
            $password = htmlentities($_POST["password"]);
            
            $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
            
            $isValidPass = password_verify($password, $hashed_pass);
            if($isValidPass) {
                echo("Valid.");
                //session_start();
                $_SESSION['LoggedIn'] = true;
            } else {
                echo("Not valid.");
            }
        }
    }
}

?>