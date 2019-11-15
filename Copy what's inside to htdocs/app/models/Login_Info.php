<?php

class Login_Info extends Model {
    public $user_id;
	public $username;
	public $email_address;
    public $password;

    public function __construct()
    {   
        parent::__construct();
    }

	public function find_user() {
        $stmt = self::$_connection->prepare("SELECT * FROM Login_Info where username = :username OR email_address = :email_address");
        $stmt->execute(['username'=>$this->username,'email_address'=>$this->email_address]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Login_Info');
		return $stmt->fetch();
    }

    public function find_user_id($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Login_Info WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Login_Info');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Login_Info(username, email_address,password) VALUES(:username,:email_address,:password)");
        $stmt->execute(['username'=>$this->username,
         'email_address'=>$this->email_address, 'password'=>password_hash($this->password, PASSWORD_DEFAULT)]);
    }

    public function update_password() {
        $stmt = self::$_connection->prepare("UPDATE Login_Info SET password = :password WHERE user_id = :user_id");
        $stmt->execute(['password'=>password_hash($this->password, PASSWORD_DEFAULT), 'user_id'=>$this->user_id]);
    }


    public function update_email() {
        $stmt = self::$_connection->prepare("UPDATE Login_Info SET email_address = :email_address WHERE user_id = :user_id");
        $stmt->execute(['email_address'=>$this->email_address, 'user_id'=>$this->user_id]);
    }

}

?>