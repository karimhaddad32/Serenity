<?php

class Friend_LinkController extends Controller
{ 

	public function index() 
	{
		$friends = $this->model('Friend_Link')->getAllFriends($_SESSION['user_id']);

		return var_dump($friends);


		// return a view here once we decide how we want it to look
	}

	public function add($receiver_id) 
	{

		$request = $this->model('Friend_Link')->find($_SESSION['user_id'], $receiver_id );

		if($request != null && $request->relationship == 'Followed'){
			$request->relationship = 'Friends';
			$request->update();
		}else{
			$request = $this->model('Friend_Link');
			$request->sender_id = $_SESSION['user_id'];
			$request->receiver_id = $receiver_id;

			$request->relationship = 'Friends';
			$request->accepted = false;
			$request->insert();
		}

		return header('Location:/Profile/search_friends');

	}

	public function subscribe($receiver_id) 
	{
		$request = $this->model('Friend_Link')->find($_SESSION['user_id'], $receiver_id );

		if($request != null){
			$request->relationship = 'Followed';
			$request->update();
		}else{
			$request = $this->model('Friend_Link');
			$request->sender_id = $_SESSION['user_id'];
			$request->receiver_id = $receiver_id;
			$request->relationship = 'Followed';
			$request->accepted = false;
			$request->insert();
		}
		

		return header('Location:/Profile/search_friends');
	}

	public function accept_friendship($other) 
	{

		$request = $this->model('Friend_Link')->find($_SESSION['user_id'], $other );

		if($request != null && $request->relationship == 'Friends'){
			$request->accepted = true;
			$request->update();
		}

		return header('Location:/Profile/search_friends');

	}


	public function remove_friend($receiver_id) 
	{

		$request = $this->model('Friend_Link')->find($_SESSION['user_id'], $receiver_id );

		if($request != null){
			$request->delete();
		}

		return header('Location:/Profile/search_friends');

	}



}
?>