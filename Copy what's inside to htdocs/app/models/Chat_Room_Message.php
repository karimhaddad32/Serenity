<?php

class Chat_Room_Message extends Model {
	public $chat_room_id;
	public $sender_id;
    public $message;
    public $timestamp;

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Chat_Room_Message");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Chat_Room_Message');
		return $stmt->fetchAll();
    }

    public function getAllChatRoomMessagesInChatRoom($chat_room_id) {
        $stmt = self::$_connection->prepare("SELECT * FROM Chat_Room_Message LEFT JOIN Profile On (sender_id = profile_id)  LEFT JOIN Picture On (profile_picture = picture_id) WHERE chat_room_id = :chat_room_id");
        $stmt->execute(['chat_room_id'=>$chat_room_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Chat_Room_Message');
        return $stmt->fetchAll();
    }

    public function find($chat_room_message_id) {
        $stmt = self::$_connection->prepare("SELECT * FROM Chat_Room_Message WHERE chat_room_message_id = :chat_room_message_id");
        $stmt->execute(['chat_room_message_id'=>$chat_room_message_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Chat_Room_Message');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Chat_Room_Message(chat_room_id, sender_id, message) VALUES(:chat_room_id, :sender_id, :message)");
        $stmt->execute(['chat_room_id'=>$this->chat_room_id, 'sender_id'=>$this->sender_id, 'message'=>$this->message]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Chat_Room_Message WHERE chat_room_message_id = :chat_room_message_id");
        $stmt->execute(['chat_room_message_id'=>$this->chat_room_message_id]);
    }

/*
    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Chat_Room_Message SET first_name = :first_name, last_name = :last_name WHERE chat_room_message_id = :chat_room_message_id");
        $stmt->execute(['first_name'=>$this->first_name,
         'last_name'=>$this->last_name, 'chat_room_message_id'=>$this->chat_room_message_id]);
    }
*/
}

?>