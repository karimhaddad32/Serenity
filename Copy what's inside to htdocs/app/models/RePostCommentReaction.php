<?php
class Re_post_comment_reaction extends Model{
	
	public $profile_id;
	public $reaction_type_id;
	public $re_post_comment_id;
	public $Re_post_comment_reaction_id;
	public $timestamp;

	public function __construct()
    {   
        parent::__construct();
    }

    public function getRepostCommentReactions(){
        $stmt = self::$_connection->prepare("SELECT * FROM Re_post_comment_reaction WHERE re_post_comment_id = :re_post_comment_id");
        $stmt->execute(['re_post_comment_id' => $this->re_post_comment_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Re_post_comment_reaction');
		return $stmt->fetchAll();
    }


    public function insert(){

	    $stmt = self::$_connection->prepare("INSERT INTO Re_post_comment_reaction(profile_id, reaction_type_id,re_post_comment_id,timestamp) VALUES(:profile_id,:reaction_type_id,:re_post_comment_id,:timestamp)");

        $stmt->execute(['profile_id'=>$this->profile_id,
         'reaction_type_id'=>$this->reaction_type_id,'re_post_comment_id'=>$this->re_post_comment_id,'timestamp'=>$this->timestamp]);
    }

    public function deleteRepostCommentReaction(){
        $stmt = self::$_connection->prepare("DELETE FROM Re_post_comment_reaction WHERE Re_post_comment_reaction_id = :Re_post_comment_reaction_id");
        $stmt->execute(['Re_post_comment_reaction_id'=>$this->Re_post_comment_reaction_id]);
    }

    public function deleteRepostCommentReactions(){
        $stmt = self::$_connection->prepare("DELETE FROM Re_post_comment_reaction WHERE re_post_comment_id = :re_post_comment_id");
        $stmt->execute(['re_post_comment_id'=>$this->re_post_comment_id]);
    }


}
?>