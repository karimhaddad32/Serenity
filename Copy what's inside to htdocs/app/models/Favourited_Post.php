<?php
class Favourited_Post extends Model 
{
	public $favourited_post_id;
	public $post_id;
	public $profile_id;
	public $timestamp;

	public function __construct() 
	{
		parent::__construct();
	}
	public function getAllFavouritedPosts() 
	{
		$stmt = self::$_connection->prepare("SELECT * FROM Favourited_Post WHERE 
											profile_id = :profile_id");
		$stmt->execute(['profile_id' => $this->profile_id]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Favourited_Post');
		return $stmt->fetchAll();
	}
	public function findFavouritedPost($favourited_post_id) 
	{
		$stmt = self::$_connection->prepare("SELECT * FROM Favourited_Post WHERE 
											favourited_post_id = :favourited_post_id");
		$stmt->execute(['favourited_post_id' => $favourited_post_id]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Favourited_Post');
		return $stmt->fetch();
	}
}
?>