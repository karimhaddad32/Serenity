<?php
class Notification_Type extends Model 
{
	public $notification_type_id;
	public $type;
	public $message; 

	public function __construct()
	{
		parent::__construct();
	}
	public function getAllNotificationTypes() 
	{
		$stmt = self::$_connection->prepare("SELECT * FROM Notification_Type");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification_Type');
		return $stmt->fetchAll();
	}
	public function findNotificationType($notification_type_id) 
	{
		$stmt = self::$_connection->prepare("SELECT * FROM Notification_Type 
											WHERE notification_type_id = :notification_type_id");
		$stmt->execute(['notification_type_id' => $notification_type_id]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification_Type');
		return $stmt->fetch();
	}
}
?>