<?php

class Reaction_type extends Model {
	public $reation_type_id;
	public $reaction_description;
    public $reaction_shortcut;
    public $reaction_path;

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Reaction_type");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Reaction_type');
		return $stmt->fetchAll();
    }
}

?>