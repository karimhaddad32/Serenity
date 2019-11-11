<?php
class Tag extends Model{

	public $comment_id;
	public $comment_type;
	public $tagged_id;
	public $tagger_id;
	public $tag_id;
	public $timestamp;

	public function __construct()
    {   
        parent::__construct();
    }

    public function getCommentTags(){
        $stmt = self::$_connection->prepare("SELECT * FROM Tag WHERE comment_id = :comment_id");
        $stmt->execute(['comment_id' => $this->comment_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Tag');
		return $stmt->fetchAll();
    }

    public function insert(){

	    $stmt = self::$_connection->prepare("INSERT INTO Tag(comment_id, comment_type,tagged_id,tagger_id,timestamp) VALUES(:comment_id,:comment_type,:tagged_id,:tagger_id,:timestamp)");

        $stmt->execute(['comment_id'=>$this->comment_id,
         'comment_type'=>$this->comment_type,'tagged_id'=>$this->tagged_id,'tagger_id'=>$this->tagger_id,'timestamp'=>$this->timestamp]);
    }

    public function deleteCommentTags(){
        $stmt = self::$_connection->prepare("DELETE FROM Tag WHERE comment_id = :comment_id");
        $stmt->execute(['comment_id'=>$this->comment_id]);
    }
}
?>