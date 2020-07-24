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
        $sql = 'SELECT * FROM blogPost ORDER BY publication_date DESC';
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


}
?>