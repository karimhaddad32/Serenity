<?php

class Diary extends Model {
	public $diary_id;
	public $profile_id;
    public $last_modified;
    public $created_in;
    public $diary_title;
    public $category_id;

    public $DiaryEntries;

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Diary WHERE profile_id = :profile_id");
        $stmt->execute(['profile_id'=>$this->profile_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Diary');
		return $stmt->fetchAll();
    }

    public function getAllEntries() {
        $stmt = self::$_connection->prepare("SELECT * FROM Diary_Entry WHERE diary_id = :diary_id");
        $stmt->execute(['diary_id'=>$this->diary_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Diary_Entry');
        return $stmt->fetchAll();
    }
    
    public function find($diary_id) {
        $stmt = self::$_connection->prepare("SELECT * FROM Diary WHERE diary_id = :diary_id");
        $stmt->execute(['diary_id'=>$diary_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Diary');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Diary(profile_id, last_modified, created_in, diary_title, category_id) VALUES (:profile_id, :last_modified, :created_in, :diary_title, :category_id)");
        $stmt->execute(['profile_id'=>$this->profile_id, 'last_modified'=>$this->last_modified, 'created_in'=>$this->created_in, 'diary_title'=>$this->diary_title, 'category_id'=>$this->category_id]);
    }

        public function update() {
        $stmt = self::$_connection->prepare("UPDATE Diary

                                                SET diary_title = :diary_title,
                                                    category_id = :category_id

                                              WHERE diary_id    = :diary_id");
        $stmt->execute(
            ['diary_title' => $this->diary_title,
             'category_id' => $this->category_id,
             'diary_id' => $this->diary_id]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Diary WHERE diary_id = :diary_id");
        $stmt->execute(['diary_id'=>$this->diary_id]);
        // must also delete all diary entires inside this diary, will do that later
    }
}

?>