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

    function ListBlogs () {
        $this->model("BlogModel");

        $listings = $this->BlogModel->listBlogArticles();
        $entry = Array("listings" => $listings);

        $data = Array("title" => "Blog Listing");
        $this->view("template/header", $data);
        $this->view("blog/list/index", $entry);
        $this->view("template/menu");
        $this->view("template/footer");
     
    }

    function ReadBlog ($slug) {
        $this->model("BlogModel");

        $article = $this->blogmodel->readArticle($slug);

        $data = Array("title" => $slug);
        $this->view("template/header", $data);
        $this->view("blog/item/index", $article);
        $this->view("template/menu");
        $this->view("template/footer");
    }

}

?>