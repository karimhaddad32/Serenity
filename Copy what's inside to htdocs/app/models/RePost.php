<?php

class Re_post extends Model {
    public $re_post_id;
    public $post_id;
    public $re_poster_id;
    public $additional_content;
    public $timestamp;
  
    public function __construct()
    {   
        parent::__construct();
    }

    public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Re_post WHERE re_poster_id = :re_poster_id");
        $stmt->execute('re_poster_id'=>$re_poster_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Re_post');
        return $stmt->fetchAll();
    }

    public function find() {
        $stmt = self::$_connection->prepare("SELECT * FROM Re_post WHERE re_poster_id = :re_poster_id AND re_post_id = :re_post_id");
        $stmt->execute(['re_poster_id'=>$re_poster_id, 're_post_id'=>$re_post_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Re_post');
        return $stmt->fetch();

    }

    public function insert() {
        $stmt = self::$_connection->prepare("INSERT INTO Re_post(post_id, re_poster_id,additional_content ,timestamp ) VALUES(:post_id,:re_poster_id,:additional_content ,:timestamp)");
        $stmt->execute(['post_id'=>$this->post_id,
         're_poster_id'=>$this->re_poster_id, 'additional_content'=>$this->additional_content , 'timestamp'=>$this->timestamp ]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Re_post WHERE re_post_id = :re_post_id");
        $stmt->execute(['re_post_id'=>$this->re_post_id]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Re_post SET additional_content = :additional_content WHERE re_post_id = :re_post_id");
        $stmt->execute(['first_name'=>$this->first_name,
         'additional_content'=>$this->additional_content, 
         're_post_id'=>$this->re_post_id]);
    }
}

?>