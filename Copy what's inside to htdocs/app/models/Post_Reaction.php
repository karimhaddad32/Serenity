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
	
}
?>