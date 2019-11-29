<?php
class Picture extends Model 
{
	public $picture_id;
    public $path;
    public $timestamp;

    public function __construct()
    {   
        parent::__construct();
    }

    public function find($picture_id)
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Picture WHERE picture_id = :picture_id");
        $stmt->execute(['picture_id'=>$picture_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Picture');
        return $stmt->fetch();
    }
    public function insert() 
    {
	    $stmt = self::$_connection->prepare("INSERT INTO Picture(path) VALUES (:path)");
        $stmt->execute(['path'=>$this->path]);
    }

      public function update() 
    {
        $stmt = self::$_connection->prepare("UPDATE Picture Set path = :path Where picture_id = :picture_id") ;
        $stmt->execute(['picture_id'=>$this->picture_id,
          'path'=>$this->path]);
    }

    public function delete() 
    {      
            $stmt = self::$_connection->prepare("DELETE FROM Picture WHERE picture_id = :picture_id");
            $stmt->execute(['picture_id'=>$this->picture_id]);   
    }

    public function getInsertedPicture(){
        $stmt = self::$_connection->prepare("SELECT * FROM Picture WHERE path = :path");
        $stmt->execute(['path'=>$this->path]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Picture');
        return $stmt->fetch();
    }
    // public function editPicture() 
    // {
    //     if ($profile_id = $_SESSION['user_id']) 
    //     {
    //         $stmt = self::$_connection->prepare("UPDATE Picture SET caption = :caption, location = :location WHERE picture_id = :picture_id");
    //         $stmt->execute(['caption'=>$this->caption,
    //         
    //     }
    // }
}
?>