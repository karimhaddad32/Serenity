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
        $stmt = self::$_connection->prepare("SELECT * FROM Post WHERE profile_id = :profile_id Order By timestamp Desc");
        $stmt->execute(['profile_id' => $this->profile_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post'); 
        return $stmt->fetchAll(); 
    }
    public function find($post_id) 
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Post WHERE post_id = :post_id");
        $stmt->execute(['post_id' => $post_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
        return $stmt->fetch(); 
    }
    public function createStatusPost() 
    {
        $stmt = self::$_connection->prepare("INSERT INTO Post
                                                        (post_id, profile_id, type, category_id, timestamp, post_content) 
                                                    VALUES 
                                                    (:post_id, :profile_id, :type, :category_id, :timestamp, :post_content)");
        $stmt->execute(['post_id'=>$this->post_id, 'profile_id'=>$this->profile_id, 'type'=>$this->type, 'category_id'=>$this->category_id, 'timestamp'=>$this->timestamp, 'post_content'=>$this->post_content]);
    }
    public function createPublicPost() 
    {
        $stmt = self::$_connection->prepare("INSERT INTO Post
                                                        (post_id, profile_id, type, reference_link, category_id, timestamp, post_content) 
                                                    VALUES 
                                                    (:post_id, :profile_id, :type, :reference_link, :category_id, :timestamp, :post_content)");
        $stmt->execute(['post_id'=>$this->post_id, 'profile_id'=>$this->profile_id, 'type'=>$this->type, 'reference_link'=>$this->reference_link, 'category_id'=>$this->category_id, 'timestamp'=>$this->timestamp, 'post_content'=>$this->post_content]);
    }
    public function createPrivatePost() 
    {
        $stmt = self::$_connection->prepare("INSERT INTO Post
                                                        (post_id, profile_id, type, reference_link, category_id, timestamp, post_content) 
                                                    VALUES 
                                                    (:post_id, :profile_id, :type, :reference_link, :category_id, :timestamp, :post_content)");
        $stmt->execute(['post_id'=>$this->post_id, 'profile_id'=>$this->profile_id, 'type'=>$this->type, 'reference_link'=>$this->reference_link, 'category_id'=>$this->category_id, 'timestamp'=>$this->timestamp, 'post_content'=>$this->post_content]);
    }
    public function createQuotePost() 
    {
        $stmt = self::$_connection->prepare("INSERT INTO Post
                                                        (post_id, profile_id, type, category_id, timestamp, post_content, picture_id) 
                                                    VALUES 
                                                    (:post_id, :profile_id, :type, :category_id, :timestamp, :post_content, :picture_id)");
        $stmt->execute(['post_id'=>$this->post_id, 'profile_id'=>$this->profile_id, 'type'=>$this->type, 'category_id'=>$this->category_id, 'timestamp'=>$this->timestamp, 'post_content'=>$this->post_content, 'picture_id'=>$this->picture_id]);
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
        $stmt = self::$_connection->prepare("DELETE FROM Post WHERE post_id = :post_id");
        $stmt->execute(['post_id'=>$this->post_id]); 
    }
     public function getCategories() 
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Category");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category'); 
        return $stmt->fetchAll(); 
    }

     public function getPublicPosts() 
    {
        $stmt = self::$_connection->prepare("SELECT * FROM Post WHERE type = :type1 or type = :type2 Order By timestamp Desc");
        $stmt->execute(['type1' => 'Quote Post', 'type2' => 'Public Blog']);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post'); 
        return $stmt->fetchAll(); 
    }

      public function getPrivatePosts($profile_id) 
    {
        $sql = "SELECT * FROM Post WHERE profile_id IN (SELECT sender_id FROM Friend_Link Where (sender_id = :sender_id OR receiver_id = :sender_id) AND accepted = :accepted) OR profile_id IN (SELECT receiver_id FROM Friend_Link Where (sender_id = :sender_id OR receiver_id = :sender_id) AND accepted = :accepted) Order By timestamp Desc";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['sender_id' => $profile_id, 'accepted' => 1 ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post'); 
        return $stmt->fetchAll(); 
    }


}
?>