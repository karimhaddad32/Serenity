<?php

class Country extends Model {
	

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Country");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Country');
		return $stmt->fetchAll();
    }

    
}

?>