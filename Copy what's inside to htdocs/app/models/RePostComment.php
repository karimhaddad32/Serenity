<?php

class Re_postComment extends Model {
	public $comment_id;
	public $profile_id;
    public $re_post_id;
    public $comment_content;
    public $timestamp;
  
    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Re_postComment WHERE re_post_id = :re_post_id");
        $stmt->execute('re_post_id'=>$re_post_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Re_postComment');
		return $stmt->fetchAll();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Re_postComment(profile_id, re_post_id,comment_content ,timestamp ) VALUES(:profile_id,:re_post_id,:comment_content ,:timestamp)");
        $stmt->execute(['profile_id'=>$this->profile_id,
         're_post_id'=>$this->re_post_id, 'comment_content'=>$this->comment_content , 'timestamp'=>$this->timestamp ]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Re_postComment WHERE comment_id = :comment_id AND profile_id = :profile_id");
        $stmt->execute(['comment_id'=>$this->comment_id, 'profile_id'=>$this->profile_id]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Re_postComment SET comment_content = :comment_content WHERE comment_id = :comment_id");
        $stmt->execute(['comment_content'=>$this->comment_content,
         'comment_id'=>$this->comment_id]);
    }
}

?>