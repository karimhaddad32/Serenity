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

	public function getAllFriends($user_id) 
	{
		$stmt = self::$_connection->prepare("SELECT * FROM Friend_Link WHERE (sender_id = :sender_id OR receiver_id = :sender_id) AND relationship = :relationship"); 
		$stmt->execute(['sender_id' => $user_id, 'relationship' => 'Friends']);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Friend_Link'); 
		return $stmt->fetchAll();
	}

	public function find($current, $other){
		$stmt = self::$_connection->prepare("SELECT * FROM Friend_Link WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id)"); 
		$stmt->execute(['sender_id' => $current, 'receiver_id' => $other]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Friend_Link'); 
		return $stmt->fetch();
	}

	public function insert() 
	{
		$stmt = self::$_connection->prepare("INSERT INTO Friend_Link(sender_id,receiver_id, accepted ,relationship) VALUES(:sender_id,:receiver_id,:accepted,:relationship)");
        $stmt->execute(['sender_id'=>$this->sender_id,'receiver_id'=>$this->receiver_id,'accepted'=>$this->accepted,'relationship'=>$this->relationship]);
	}


	public function update() 
	{
		 $stmt = self::$_connection->prepare("UPDATE Friend_Link SET accepted = :accepted, relationship = :relationship WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id)");
        $stmt->execute(['accepted'=>$this->accepted,
         'relationship'=>$this->relationship, 'sender_id'=>$this->sender_id,'receiver_id'=>$this->receiver_id]);		
	}

	public function delete() 
	{
		$stmt = self::$_connection->prepare("DELETE FROM Friend_Link WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR sender_id = :receiver_id AND receiver_id = :sender_id"); 
		$stmt->execute(['sender_id'=>$this->sender_id,
         'receiver_id'=>$this->receiver_id]);
	}
}
?>