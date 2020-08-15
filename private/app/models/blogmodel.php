<?php

class BlogModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function DbVersion() {
        $sql = 'SELECT VERSION()';
        $stmt = $this->db->query($sql);
        $res = $stmt->fetch();

        return $res[0];
    }

    function listBlogArticles() {
        $sql = 'SELECT * FROM `blogPost` ORDER BY publication_date DESC';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function readArticle($slug) {
        $sql = 'SELECT * FROM blogPost WHERE slug = ?';
        $stmt = $this->db->prepare($sql);
        $stmt ->execute(Array($slug));
        $res = $stmt->fetch();

        return $res;
    }

    function createPost($slug, $title, $content, $user_email) {
        // $slug = (str_replace(" ", "-",strtolower($title)) . random_int(1000, 999999));
        // $user_email = $_SESSION["email"];
        
        $sql = "INSERT INTO `blogPost` (slug, title, content, user_email) VALUES (:slug, :title, :content, :user_email)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array("slug"=>$slug, "title"=>$title, "content"=>$content, "user_email"=>$user_email));

        //return $slug;
    }

    function getLastPost() {
        $sql = "SELECT * FROM `blogPost` LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt ->execute();
        $res = $stmt->fetch();

        return $res;
    }

    function updatePost($key, $title, $content) {
        $sql = "UPDATE `blogPost` SET title = :title, content = :content WHERE title = :pk";
        $stmt = $this->db->prepare($sql);
        return $stmt ->execute(array("title"=>$title, "content"=>$content, "pk"=>$key));

    }

}
?>