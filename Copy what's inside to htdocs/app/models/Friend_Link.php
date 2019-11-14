<?php 
class Friend_Link extends Model
{
	public $sender_id;
	public $receiver_id;
	public $accepted;
	public $timestamp;
	public $relationship;

	public function __construct()
	{
		parent::__construct(); 
	}
	public function getAllFriends() 
	{
		$stmt = self::$_connection->prepare("SELECT * FROM Friend_Link WHERE profile_id = :profile_id"); 
		$stmt->execute(['profile_id' => $this->profile_id]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Friend_Link'); 
		return $stmt->fetchAll(); 
	}
	public function sendFriendRequest() 
	{
		//
	}
	public function acceptFriend() 
	{
		$stmt = self::$_connection->prepare("INSERT INTO Friend_Link(accepted, timestamp, relationship) VALUES (:accepted, :timestamp, :relationship)");
		$stmt->execute(['accepted' => $this->accepted, 'timestamp' => $this->timestamp, 'relationship' => $this->relationship]);
	}
	public function removeFriend() 
	{
		$stmt = self::$_connection->prepare("DELETE FROM Friend_Link WHERE sender_id = $_SESSION['user_id'] OR receiver_id = $_SESSION['user_id']"); 
		//$stmt->execute(['']);
	}
}
?>