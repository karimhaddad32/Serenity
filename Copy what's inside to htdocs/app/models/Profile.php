<?php

class Profile extends Model {
    public $profile_id; 
	public $first_name;
	public $last_name;
    public $username;
    public $phone_number;
    public $gender;
    public $profile_style_id;
    public $profile_picture; 

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Profile");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Profile');
		return $stmt->fetchAll();
    }

    public function find() {
        $stmt = self::$_connection->prepare("SELECT * FROM Profile WHERE profile_id = :profile_id");
        $stmt->execute(['profile_id'=>$this->profile_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Profile');
        return $stmt->fetch();
    }

    public function search() {
        $stmt = self::$_connection->prepare("SELECT * FROM Profile WHERE first_name = :first_name OR last_name = :last_name OR username = :username");
        $stmt->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name,'username'=>$this->username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Profile');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Profile
            (profile_id, first_name, last_name, username, phone_number, gender, profile_style_id, profile_picture) 
             VALUES
            (:profile_id, :first_name, :last_name, :username, :phone_number,:gender,:profile_style_id,:profile_picture)");

        $stmt->execute(['profile_id'=>$this->profile_id, 'first_name'=>$this->first_name, 'last_name'=>$this->last_name, 
            'username'=>$this->username, 'phone_number'=>$this->phone_number, 'gender'=>$this->gender, 
                'profile_style_id'=>$this->profile_style_id, 
                'profile_picture'=>$this->profile_picture]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Profile SET first_name = :first_name, last_name = :last_name, username = :username, phone_number = :phone_number, gender = :gender, profile_style_id = :profile_style_id, profile_picture = :profile_picture WHERE profile_id = :profile_id");
        $stmt->execute(['first_name'=>$this->first_name,
         'last_name'=>$this->last_name, 'username'=>$this->username,'phone_number'=>$this->phone_number,'gender'=>$this->gender,'profile_style_id'=>$this->profile_style_id,'profile_picture'=>$this->profile_picture,'profile_id'=>$this->profile_id ]);
    }
}

?>