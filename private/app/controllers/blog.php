<?php

class Blog extends Controller {
    function Index () {
        $this->model("blogmodel");

        $posts = $this->blogmodel->listBlogArticles();
        $input = Array("posts" => $posts);

        $data = Array("header" => "Blog Listings", "heading" => "Blog Listing");
        $this->view("template/header", $data);
        $this->view("blog/list/index", $input);
        $this->view("template/menu");
        $this->view("template/footer");
    }
    
    function ListBlogs () {
        $this->model("blogmodel");

        $posts = $this->blogmodel->listBlogArticles();
        $input = Array("posts" => $posts);

        $data = Array("header" => "Blog Listings", "heading" => "Blog Listing");
        $this->view("template/header", $data);
        $this->view("blog/list/index", $input);
        $this->view("template/menu");
        $this->view("template/footer");
     
    }

    function ReadBlog ($slug = null) {
        $this->model("blogmodel");

        $article = $this->blogmodel->readArticle($slug);
        
        $data = Array("slug" => $slug, "header"=> "Read A Post");
        $this->view("template/header", $data);
        if ($slug !== null) {
			$this->view("blog/item/index", $article);
		}
        $this->view("template/menu");
        $this->view("template/footer");
    }

    function CreateBlog() {

        //check is logged in
        $isLoggedIn = isset($_SESSION["isLoggedIn"]);

        if (!$isLoggedIn) {
            // header("Location: /blog/listblogs");
            $this->view("template/header");
            $this->view("user/pleaseLogIn");
            $this->view("template/menu");
            $this->view("template/footer");
            
        } 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = htmlentities($_POST["title"]);
            // $slug = htmlentities((str_replace(" ", "-",strtolower($title)) . random_int(1000, 999999)));
            $content = htmlentities($_POST["content"]);
            // $user_email = $_SESSION["email"];

            $this->model("blogmodel");
            $wasCreated = $this->blogmodel->createPost($title, $content);

            //Check if post was created 
            if ($wasCreated) {
                //if successful redirect to blog listings page
                $data = Array("header" => "Blog Listings", "heading" => "Blog Listing");
                $this->view("template/header", $data);
                $this->view("blog/listblogs", $data);
                $this->view("template/menu");
                $this->view("template/footer");
            } else {
                //if unsuccessful redirect to homepage
                $data = Array("title" => "Home");
                $this->view("template/header", $data);
                $this->view("main/index", $data);
                $this->view("template/menu");
                $this->view("template/footer");
                
            }

        } else {
            $data = Array("header" => "Create New Post", "heading" => "Create a New Post");
            $this->view("template/header", $data);
            $this->view("blog/create/index", $data);
            $this->view("template/menu");
            $this->view("template/footer");
        }
    }

    function UpdateBlog() {

        //check is logged in
        $isLoggedIn = isset($_SESSION["isLoggedIn"]);

        if (!$isLoggedIn) {
            $this->view("template/header");
            $this->view("user/pleaseLogIn");
            $this->view("template/menu");
            $this->view("template/footer");
            
        } 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $key = htmlentities($_POST['key']);
            $title = htmlentities($_POST['title']);
            $content = htmlentities($_POST['content']);

            $this->model("blogmodel");
            $wasUpdated = $this->blogmodel->updatePost($key, $title, $content);
            
            //Check if post was updated 
            if ($wasUpdated) {
                //if successful redirect to read article
                $data = Array("header" => "Blog Listings", "heading" => "Blog Listing");
                $this->view("template/header", $data);
                $this->view("blog/listblogs", $data);
                $this->view("template/menu");
                $this->view("template/footer");
            } else {
                //if unsuccessful redirect to homepage
                $data = Array("title" => "Home");
                $this->view("template/header", $data);
                $this->view("main/index", $data);
                $this->view("template/menu");
                $this->view("template/footer");
            }

        } else {
            $this->model("blogmodel");
            $post = $this->blogmodel->getLastPost();

            $data = Array("header" => "Update Post", "heading" => "Update a Post");
            $this->view("template/header", $data);
            $this->view("blog/create/index", $data, $post);
            $this->view("template/menu");
            $this->view("template/footer");
        }
    }

}


?>