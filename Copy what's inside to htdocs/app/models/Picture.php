<?php
class _Person extends Model 
{
	public $picture_id;
	public $caption;
    public $location;
    public $path;
    public $timestamp;

    public function __construct()
    {   
        parent::__construct();
    }
	public function getAllPictures() 
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Picture WHERE profile_id = :profile_id");
        $stmt->execute(['profile_id' => $this->profile_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Picture');
		return $stmt->fetchAll();
    }
    public function findPicture($picture_id) 
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Picture WHERE picture_id = :picture_id");
        $stmt->execute(['picture_id'=>$picture_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Picture');
        return $stmt->fetch();
    }
    public function uploadPicture() 
    {
	    $stmt = self::$_connection->prepare("INSERT INTO Picture(caption, location, path, timestamp) VALUES (:caption, :location, :path, :timestamp)");
        $stmt->execute(['caption'=>$this->caption,
         'location'=>$this->location, 'path'=>$this->path, 'timestamp'=>$this->timestamp]);
    }
    public function deletePicture() 
    {
        $stmt = self::$_connection->prepare("DELETE FROM Picture WHERE picture_id = :picture_id");
        $stmt->execute(['picture_id'=>$this->picture_id]);
    }
    public function editPicture() 
    {
        $stmt = self::$_connection->prepare("UPDATE Picture SET caption = :caption, location = :location WHERE picture_id = :picture_id");
        $stmt->execute(['caption'=>$this->caption,
         'location'=>$this->location, 'picture_id'=>$this->picture_id]);
    }
}
?>