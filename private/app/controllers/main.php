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
        $this->model("blogmodel");

        $listings = $this->blogmodel->listBlogArticles();
        $entry = Array("listings" => $listings);

        $data = Array("heading" => "Blog Listing");
        $this->view("template/header", $data);
        $this->view("blog/list/index", $entry);
        $this->view("template/menu");
        $this->view("template/footer");
     
    }

    function ReadBlog ($slug = null) {
        $this->model("blogmodel");

        $article = $this->blogmodel->readArticle($slug);
        
        $data = Array("slug" => $slug);
        $this->view("template/header", $article);
        if ($slug !== null) {
			$this->view("article/index", $article);
		}
        $this->view("template/menu");
        $this->view("template/footer");
    }

}

?>