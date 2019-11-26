<?php

class Comment extends Model {
    public $comment_id;
    public $profile_id;
    public $post_id;
    public $comment_content;
    public $timestamp;

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Comment");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
        return $stmt->fetchAll();
    }

    public function getPostComments() {
        $stmt = self::$_connection->prepare("SELECT * FROM Comment WHERE post_id = :post_id");
        $stmt->execute(['post_id'=>$this->post_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
        return $stmt->fetchAll();
    }

    public function find($comment_id) {
        $stmt = self::$_connection->prepare("SELECT * FROM Comment WHERE comment_id = :comment_id");
        $stmt->execute(['comment_id'=>$comment_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Comment(profile_id, post_id, comment_content, timestamp)
                                                  VALUES (:profile_id, :post_id, :comment_content, :timestamp)");
        $stmt->execute(['profile_id'=>$this->profile_id, 'post_id'=>$this->post_id,
                        'comment_content'=>$this->comment_content, 'timestamp'=>$this->timestamp]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Comment WHERE comment_id = :comment_id");
        $stmt->execute(['comment_id'=>$this->comment_id]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Comment SET comment_content = :comment_content
                                              WHERE comment_id = :comment_id");
        $stmt->execute(['comment_content'=>$this->comment_content]);
    }
}

?>