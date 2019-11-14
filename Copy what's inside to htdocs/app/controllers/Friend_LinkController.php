<?php

class Friend_LinkController extends Controller
{ 

	public function index() 
	{
		$theFriend = $this->model('Friend_Link');
		$theFriend->profile_id = 1;// this should be session
		$theFriends = $theFriend->getAllFriends();

		// return a view here once we decide how we want it to look
	}
	public function acceptFriend() 
	{

	}
}
?>