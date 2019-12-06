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

    public function getCategory($category_id){
        $stmt = self::$_connection->prepare("SELECT category_type FROM Category where category_id = :category_id");
        $stmt->execute(['category_id' => $category_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category'); 
        return $stmt->fetch(); 
    }
}
?>