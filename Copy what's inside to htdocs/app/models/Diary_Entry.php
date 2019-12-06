<?php

class Diary_Entry extends Model {
    public $diary_entry_id;
    public $diary_id;
    public $entry_title;
    public $entry;
    public $timestamp;

    public function __construct()
    {
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Diary_Entry");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Diary_Entry');
		return $stmt->fetchAll();
    }

    public function find($diary_entry_id) {

        $stmt = self::$_connection->prepare("SELECT * FROM Diary_Entry WHERE diary_entry_id = :diary_entry_id");
        $stmt->execute(['diary_entry_id'=>$diary_entry_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Diary_Entry');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Diary_Entry(diary_id, entry_title, entry, timestamp) VALUES(:diary_id, :entry_title, :entry, :timestamp)");
        $stmt->execute(['diary_id'=>$this->diary_id,
                        'entry_title'=>$this->entry_title,
                        'entry'=>$this->entry,
                        'timestamp'=>$this->timestamp]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Diary_Entry WHERE diary_entry_id = :diary_entry_id");
        $stmt->execute(['diary_entry_id'=>$this->diary_entry_id]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Diary_Entry SET entry_title = :entry_title, entry = :entry WHERE diary_entry_id = :diary_entry_id");
        $stmt->execute(['entry_title'=>$this->entry_title,
                        'entry'=>$this->entry, 'diary_entry_id' => $this->diary_entry_id]);
    }

}

?>