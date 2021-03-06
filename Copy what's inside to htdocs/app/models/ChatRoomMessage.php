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

    public function getAllChatRoomMessagesInChatRoom() {
        $stmt = self::$_connection->prepare("SELECT * FROM Chat_Room_Message WHERE chat_room_id = :chat_room_id");
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
	    $stmt = self::$_connection->prepare("INSERT INTO Chat_Room_Message(first_name, last_name) VALUES(:first_name,:last_name)");
        $stmt->execute(['first_name'=>$this->first_name,
         'last_name'=>$this->last_name]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Chat_Room_Message WHERE chat_room_message_id = :chat_room_message_id");
        $stmt->execute(['chat_room_message_id'=>$this->chat_room_message_id]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Chat_Room_Message SET first_name = :first_name, last_name = :last_name WHERE chat_room_message_id = :chat_room_message_id");
        $stmt->execute(['first_name'=>$this->first_name,
         'last_name'=>$this->last_name, 'chat_room_message_id'=>$this->chat_room_message_id]);
    }

}

?>