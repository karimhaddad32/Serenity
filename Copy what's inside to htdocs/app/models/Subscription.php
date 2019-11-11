<?php
class Subscription extends Model{

	public $subscription_id;
	public $profile_id;
	public $target_id;
	public $target_type;
	public $timestamp;


 	public function __construct() {
		parent::__construct();
	}

	public function getAllSubs() {
		$stmt = self::$_connection->prepare("SELECT * FROM Subscription WHERE profile_id = :profile_id");
		$stmt->execute(['profile_id' => $this->profile_id]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'DirectMessage');
		return $stmt->fetchAll(); 
	}

	public function insert(){

	    $stmt = self::$_connection->prepare("INSERT INTO Subscription(profile_id, target_id,target_type,timestamp) VALUES(:profile_id,:target_id,:target_type,:timestamp)");

        $stmt->execute(['profile_id'=>$this->profile_id,
         'target_id'=>$this->target_id,'target_type'=>$this->target_type,'timestamp'=>$this->timestamp);
    }

    public function delete(){
        $stmt = self::$_connection->prepare("DELETE FROM Subscription WHERE subscription_id = :subscription_id");
        $stmt->execute(['subscription_id'=>$this->subscription_id]);
    }


}

?>