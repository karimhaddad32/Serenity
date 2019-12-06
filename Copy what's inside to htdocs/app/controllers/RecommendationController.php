<?php 

class RecommendationController extends Controller
{ 

	public function index() 
	{
		$recommendtions = $this->model('Recommendation')->getAll($_SESSION['user_id']);

		foreach ($recommendtions as $recom) {
			if($recom->recommender_id == $_SESSION['user_id']){
				$recom->current_profile = $this->model('Profile')->find($recom->recommender_id);
 				$recom->other_profile = $this->model('Profile')->find($recom->recommended_id);	
			}else{
				$recom->current_profile = $this->model('Profile')->find($recom->recommended_id);
 				$recom->other_profile = $this->model('Profile')->find($recom->recommender_id);	
			}
			
			$recom->category = $this->model('Category')->getCategory($recom->category_id);
			
		}




		return $this->view('Recommendation/index', $recommendtions);
	}

	public function create($post_id){

		$recom_post = $this->model('Post')->find($post_id);
		if($recom_post != null){

		$profile = $this->model('Profile')->find($_SESSION['user_id']);

		if(!isset($_POST['action'])){

			$friends = $this->model('Friend_Link')->getAllFriends($profile->profile_id);

			foreach ($friends as $friend) {

				$recommended_profile = $this->model('Profile')->find(($friend->sender_id == $_SESSION['user_id'] ? $friend->receiver_id : $friend->sender_id));

				$friend->username = $recommended_profile->username;
				$friend->profile_id = $recommended_profile->profile_id;
			}

			$recom_post->friends = $friends;

			

		

			return $this->view('Recommendation/create', $recom_post);
		}else{



			$recomm = $this->model('Recommendation');
			$recomm->recommender_id = $profile->profile_id;
			$recomm->recommended_id = $_POST['recommended_id'];
			$recomm->post_id = $post_id ;

			$recomm->insert();

			header('location:/Recommendation/index');
			// $recomm->recommendation_type = $_POST['recommendation_type'];
			// $recomm->recommendation_link =  $_POST['recommendation_link'];

			}

		}else{
	
			header('location:/Recommendation/index');
		}




	}



}
 ?>