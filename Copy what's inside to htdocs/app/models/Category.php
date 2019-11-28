<?php
class Category extends Model 
{
    public function __construct()
    {   
        parent::__construct();
    }
	public function getAll() 
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Category");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category'); 
        return $stmt->fetchAll(); 
    }
}
?>