<?php

class Post_Reaction extends Model 
{
	public $post_reaction_id;
	public $post_id;
	public $profile_id;
	public $reaction_type_id;
	public $timestamp;

	public function __construct()
	{
		parent::__construct();
	}
	public function getAllPostReactions()
	{
		$stmt = self::$_connection->prepare("SELECT * FROM Post_Reaction WHERE profile_id = :profile_id");
		$stmt->execute(['profile_id' => $this->profile_id]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Post_Reaction');
		return $stmt->fetchAll();
	}
	public function createPostReaction() 
	{
		$stmt = self::$_connection->prepare("INSERT INTO Post_Reaction
														(post_reaction_id, post_id, profile_id, reaction_type_id, timestamp)
													VALUES(:post_reaction_id, :post_id, :profile_id, :reaction_type_id, :timestamp)");
		$stmt->execute(['post_reaction_id'=>$this->post_reaction_id, 'post_id'=>$this->post_id, 'profile_id'=>$this->profile_id, 'reaction_type_id'=>$this->reaction_type_id, 'timestamp'=?$this->timestamp]);
	}
	public function deletePostReaction() 
	{
		if ($profile_id = $_SESSION['user_id']) 
		{
			$stmt = self::$_connection->prepare("DELETE FROM Post_Reaction WHERE post_reaction_id = :post_reaction_id");
			$stmt->execute(['post_reaction_id'=>$post_reaction_id]);
		}
	}
}
?>