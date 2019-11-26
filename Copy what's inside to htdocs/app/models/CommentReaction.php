<?php

class Comment_Reaction extends Model {
	public $comment_id;
    public $profile_id;
    public $reaction_type_id;
    public $timestamp;

    public function __construct()
    {   
        parent::__construct();
    }

    public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Comment_Reaction");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment_Reaction');
        return $stmt->fetchAll();
    }

    public function getAllCommentReactionsForComment() {
        $stmt = self::$_connection->prepare("SELECT * FROM Comment_Reaction WHERE comment_id = :comment_id");
        $stmt->execute(['comment_id'=>$this->comment_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment_Reaction');
        return $stmt->fetchAll();
    }

    public function find($comment_reaction_id) {
        $stmt = self::$_connection->prepare("SELECT * FROM Comment_Reaction WHERE comment_reaction_id = :comment_reaction_id");
        $stmt->execute(['comment_reaction_id'=>$comment_reaction_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment_Reaction');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Comment_Reaction(comment_id, profile_id, reaction_type_id, timestamp) VALUES(:comment_id, :profile_id, :reaction_type_id, :timestamp)");
        $stmt->execute(['comment_id'=>$this->comment_id,
                        'profile_id'=>$this->profile_id,
                        'reaction_type_id'=>$this->reaction_type_id,
                        'timestamp'=>$this->timestamp]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Comment_Reaction WHERE comment_reaction_id = :comment_reaction_id");
        $stmt->execute(['comment_reaction_id'=>$this->comment_reaction_id]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Comment_Reaction SET reaction_type_id = :reaction_type_id WHERE comment_reaction_id = :comment_reaction_id");
        $stmt->execute(['reaction_type_id'=>$this->reaction_type_id]);
    }

}

?>