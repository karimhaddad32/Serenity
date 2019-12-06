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

	public function getReaction($reation_type_id) {
        $stmt = self::$_connection->prepare("SELECT reaction_description FROM Reaction_type WHERE reation_type_id = :reation_type_id");
        $stmt->execute(['reation_type_id' => $reation_type_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Reaction_type');
		return $stmt->fetch();
    }
}

?>