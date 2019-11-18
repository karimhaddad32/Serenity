<?php
class Preferred_Category extends Model 
{
	public $preferred_category_id;
	public $profile_id;
	public $category_id;

	public function __construct() 
	{
		parent::__construct();
	}
	public function getAllPreferredCategories() 
	{
		$stmt = self::$_connection->prepare("SELECT * FROM Preferred_Category WHERE
											profile_id = :profile_id");
		$stmt->execute(['profile_id' => $this->profile_id]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Preferred_Category');
		return $stmt->fetchAll();
	}
	public function findPreferredCategory($preferred_category_id) 
	{
		$stmt = self::$_connection->prepare("SELECT * FROM Preferred_Category WHERE preferred_category_id
											= :preferred_category_id");
		$stmt->execute(['preferred_category_id' => $this->preferred_category_id]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Preferred_Category');
		return $stmt->fetch();
	}
}
?>