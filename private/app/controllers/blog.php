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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = htmlentities($_POST["title"]);
            $slug = htmlentities((str_replace(" ", "-",strtolower($title)) . random_int(1000, 999999)));
            $content = htmlentities($_POST["content"]);
            $user_email = "lois.lane@dailyplanet.com";

            $this->model("blogmodel");
            $wasCreated = $this->blogmodel->createPost($slug, $title, $content, $user_email);

            //Check if post was created 
            if ($wasCreated) {
                //if successful redirect to blog listings page
                echo("Successfully created post.");
            } else {
                //if unsuccessful redirect to homepage
                echo("Failed.");
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $key = htmlentities($_POST['key']);
            $title = htmlentities($_POST['title']);
            $content = htmlentities($_POST['content']);

            $this->model("blogmodel");
            $wasUpdated = $this->blogmodel->updatePost($key, $title, $content);
            
            //Check if post was updated 
            if ($wasUpdated) {
                //if successful redirect to read article
                echo("Successfully created post.");
            } else {
                //if unsuccessful redirect to homepage
                echo("Failed.");
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


    

    // function createBlog() {

    //     $isAuthenticated = isset($_SESSION['email']);




    //     $method = $_SERVER['REQUEST_METHOD'];
    //     if ($method == 'GET') {

    //         $data = Array("heading" => "Create a New Post");

    //         $this->view("template/header", $data);
    //         $this->view("blog/create/index", $data);
    //         $this->view("template/menu");
    //         $this->view("template/footer");
            
    //     } else if ($method == 'POST') {
    //         //process the new blog post
            
    //         $title = htmlentities($_POST["title"]);
    //         $content = htmlentities($_POST["content"]);
            
    //         echo("New post created.");
    //     }
    // }

    // function CreateBlogPosting($title, $content, $user_email) {
    //     $sql = "INSERT INTO `blogPost` (`title`, `content`, `user_email`) VALUES (:title, :content, :author);";
    //     $stmt = $this->db->prepare($sql);
    //     $params = array("title" -> $title, "content" -> $content, "user_email" -> $user_email);

    //     $res = $stmt->execute($params);
    //     if (!$res) {
    //         echo("");
    //     } 
    //     return $res;
    // }
}


?>