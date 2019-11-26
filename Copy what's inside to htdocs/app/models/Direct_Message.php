<?php
class Direct_Message extends Model {
	public $message_id; 
	public $sender_id;
	public $receiver_id;
	public $message_content;
	public $timestamp; 

	public function __construct() {
		parent::__construct();
	}

	public function getAllConversations() {
		$stmt = self::$_connection->prepare("SELECT * FROM Direct_Message WHERE sender_id = $_SESSION['user_id'] OR receiver_id = $_SESSION['user_id']");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'DirectMessage');
		return $stmt->fetchAll(); 
	}
	public function getAllMessages($sender_id, $receiver_id) {
		$stmt = self::$_connection->prepare("SELECT * FROM Direct_Message WHERE sender_id = :sender_id AND receiver_id = :receiver_id OR sender_id = :receiver_id AND receiver_id = :sender_id");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Direct_Message');
		return $stmt->fetchAll(); 
	}
	public function createNewMessage() {
		$stmt = self::$_connection->prepare("INSERT INTO Direct_Message (sender_id, receiver_id, message_content, timestamp)
                                                  VALUES (:sender_id, receiver_id:, :message_content, :timestamp)");
        $stmt->execute(
            ['sender_id' => $this->sender_id,
             'receiver_id' => $this->receiver_id,
             'message_content' => $this->message_content,
             'timestamp' => $this->timestamp]);
	}
}
?>