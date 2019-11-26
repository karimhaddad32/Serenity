<?php

class Chat_Room extends Model {
	public $chat_room_id;
    public $category_id;
    public $owner_id;
    public $room_title;
    public $maximum_space;

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Chat_Room");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Chat_Room');
		return $stmt->fetchAll();
    }

    public function find($chat_room_id) {
        $stmt = self::$_connection->prepare("SELECT * FROM Chat_Room WHERE chat_room_id = :chat_room_id");
        $stmt->execute(['chat_room_id'=>$chat_room_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Chat_Room');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Chat_Room(category_id, owner_id, room_title, maximum_space, timestamp) VALUES(:category_id, :owner_id, :room_title, :maximum_space, :timestamp)");
        $stmt->execute(['category_id'=>$this->category_id,
                        'owner_id'=>$this->owner_id,
                        'room_title'=>$this->room_title,
                        'maximum_space'=>$this->maximum_space,
                        'timestamp'=>$this->timestamp]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Chat_Room WHERE chat_room_id = :chat_room_id");
        $stmt->execute(['chat_room_id'=>$this->chat_room_id]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Chat_Room SET category_id = :category_id, owner_id = :owner_id, room_title = :room_title, maximum_space = :maximum_space WHERE chat_room_id = :chat_room_id");
        $stmt->execute(['category_id'=>$this->category_id,
                        'owner_id'=>$this->owner_id,
                        'room_title'=>$this->room_title,
                        'maximum_space'=>$this->maximum_space]);
    }

}

?>