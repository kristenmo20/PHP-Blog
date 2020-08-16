<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    /*
     * http://localhost/
     */
    function Index () {
        $this->model("blogmodel");

        $posts = $this->blogmodel->getLastFivePosts();
        $input = Array("posts" => $posts);

        $data = Array("title" => "Home");
        $this->view("template/header", $data);
        $this->view("main/index", $data, $input);
        $this->view("template/menu");
        $this->view("template/footer"); 
    }

}

?>