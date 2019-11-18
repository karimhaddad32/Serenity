<?php
class Notification extends Model {
	public $notification_id;
	public $sender_id;
    public $receiver_id;
    public $notification_type_id;
    public $notification_link;
    public $timestamp;
    public $seen;
    public $opened;

    public function __construct()
    {   
        parent::__construct();
    }
	public function getAllNotifications() 
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Notification");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification');
		return $stmt->fetchAll();
    }
    public function createNotification() 
    {
        $stmt = self::$_connection->prepare("INSERT INTO Notification(notification_id, sender_id, 
                                                        receiver_id, notification_type_id, 
                                                        notification_link, timestamp, seen, opened)
                                            VALUES(:notification_id, :sender_id, :receiver_id, 
                                                    :notification_type_id, :notification_link, 
                                                    :timestamp, :seen, :opened)");
        $stmt->execute(['notification_id'=>$this->notification_id, 'sender_id'=>$this->sender_id, 
                        'receiver_id'=>$this->receiver_id, 'notification_type_id'=>$this->notification_type_id, 
                            'notification_link'=>$this->notification_link, 'timestamp'=>$this->timestamp, 
                            'seen'=>$this->seen, 'opened'=>$this->opened]);
    }
}
?>