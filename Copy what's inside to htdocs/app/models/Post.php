<?php

class Post extends Model 
{
	public $post_id;
	public $profile_id;
    public $type;
    public $reference_link;
    public $category_id;
    public $timestamp; 
    public $post_content;
    public $picture_id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getAllPosts() 
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Post WHERE profile_id = :profile_id");
        $stmt->execute(['profile_id' => $this->profile_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post'); 
        return $stmt->fetchAll(); 
    }
    public function findPost($post_id) 
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Post WHERE post_id = :post_id");
        $stmt->execute(['post_id' => $post_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
        return $stmt->fetch(); 
    }
    public function createPost() 
    {
        $stmt = self::$_connection->prepare("INSERT INTO Post
                                                        (post_id, profile_id, type, reference_link, category_id, timestamp, post_content, picture_id) 
                                                    VALUES 
                                                    (:post_id, :profile_id, :type, :reference_link, :category_id, :timestamp, :post_content, :picture_id)");
        $stmt->execute(['post_id'=>$this->post_id, 'profile_id'=>$this->profile_id, 'type'=>$this->type, 'reference_link'=>$this->reference_link, 'category_id'=>$this->category_id, 'timestamp'=>$this->timestamp, 'post_content'=>$this->post_content, 'picture_id'=>$this->picture_id]);
    }
    public function editPost() 
    {
        if ($profile_id = $_SESSION['user_id'])
        {
            $stmt = self::$_connection->prepare("UPDATE Post 
                                                SET type = :type, reference_link = :reference_link, category_id = :category_id, timestamp = :timestamp, post_content = :post_content, picture_id = :picture_id 
                                                WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id' => $this->profile_id,
             'type' => $this->type,
             'reference_link' => $this->reference_link,
             'category_id' => $this->category_id,
             'timestamp' => $this->timestamp,
             'post_content' => $this->post_content,
             'picture_id' => $this->picture_id]);
        }
    }
    public function deletePost() 
    {
        if ($profile_id = $_SESSION['user_id']) 
        {
           $stmt = self::$_connection->prepare("DELETE FROM Post WHERE post_id = :post_id");
            $stmt->execute(['post_id'=>$post_id]); 
        }
    }
}
?>