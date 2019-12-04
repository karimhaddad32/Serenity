<?php

class Recommendation extends Model {
	public $recommendation_id;
	public $recommender_id;
    public $recommended_id;
    public $post_id;
    public $recommendation_type;
    public $recommendation_link;

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll($user_id) {
        $stmt = self::$_connection->prepare("SELECT * FROM Recommendation Where recommended_id = :recommended_id");
        $stmt->execute(['recommended_id'=>$user_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Recommendation');
		return $stmt->fetchAll();
    }


    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Recommendation(recommender_id, recommended_id, post_id, recommendation_type, recommendation_link) VALUES(:recommender_id,:recommended_id, :post_id,:recommendation_type,:recommendation_link)");

        $stmt->execute(['recommender_id'=>$this->recommender_id,
         'recommended_id'=>$this->recommended_id,'post_id'=>$this->post_id,'recommendation_type'=>$this->recommendation_type,'recommendation_link'=>$this->recommendation_link]);

    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Recommendation WHERE recommendation_id = :recommendation_id AND (recommender_id = :recommender_id OR recommended_id = :recommended_id)");
        $stmt->execute(['recommendation_id'=>$this->recommendation_id,'recommender_id'=>$this->recommender_id,'recommended_id'=>$this->recommended_id]);
    }
}
?>