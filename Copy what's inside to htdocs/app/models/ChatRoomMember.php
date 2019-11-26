<?php

class Chat_Room_Member extends Model {
	public $chat_room_member_id;
    public $chat_room_id;
    public $profile_id;
    public $timestamp;

    public function __construct()
    {   
        parent::__construct();
    }

    public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Chat_Room_Member");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Chat_Room_Member');
        return $stmt->fetchAll();
    }

    public function getAllChatRoomMembersInChatRoom() {
        $stmt = self::$_connection->prepare("SELECT * FROM Chat_Room_Member WHERE chat_room_id = :chat_room_id");
        $stmt->execute(['chat_room_id'=>$chat_room_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Chat_Room_Member');
        return $stmt->fetchAll();
    }

    public function find($chat_room_member_id) {
        $stmt = self::$_connection->prepare("SELECT * FROM Chat_Room_Member WHERE chat_room_member_id = :chat_room_member_id");
        $stmt->execute(['chat_room_member_id'=>$chat_room_member_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Chat_Room_Member');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Chat_Room_Member(chat_room_id, profile_id, timestamp) VALUES(:chat_room_id, :profile_id, :timestamp)");
        $stmt->execute(['chat_room_id'=>$this->chat_room_id,
                        'profile_id'=>$this->profile_id,
                        'timestamp'=>$this->timestamp]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Chat_Room_Member WHERE chat_room_member_id = :chat_room_member_id");
        $stmt->execute(['chat_room_member_id'=>$this->chat_room_member_id]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Chat_Room_Member SET chat_room_id = :chat_room_id, profile_id = :profile_id WHERE chat_room_member_id = :chat_room_member_id");
        $stmt->execute(['chat_room_id'=>$this->chat_room_id,
                        'profile_id'=>$this->profile_id]);
    }

}

?>