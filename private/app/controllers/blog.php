<?php

class Blog extends Controller {
    
    function Read($slug) {
        // create blogModel
        $this->model("blogmodel");
        // lookup blog id
        // get blog details
        $post = $this->blogmodel->readArticle($slug);
        // fill in template with record
        $this->view("template/header", $post);
        $this->view("blog/item/index", $post);
        $this->view("template/menu");
        $this->view("template/footer");
    }

    function CreateBlogPosting($title, $content, $user_email) {
        $sql = "INSERT INTO `blogPost` (`title`, `content`, `user_email`) VALUES (:title, :content, :author);";
        $stmt = $this->db->prepare($sql);
        $params = array("title" -> $title, "content" -> $content, "user_email" -> $user_email);

        $res = $stmt->execute($params);
        if (!$res) {
            echo("");
        } 
        return $res;
    }
}


?>