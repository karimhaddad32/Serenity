<?php
	class Direct_MessageController extends Controller 
	{
		public function index() 
		{
			$friend = $this->model('Friend_Link');
			$friends = $friend->getAllFriends($_SESSION['user_id']);
			$this->view('Direct_Message/index', $friends);
		}

		public function message() 
		{
			$theMessage = $this->model('Direct_Message');
			$theMessage->sender_id = $_SESSION['user_id'];
			$theMessages = $theMessage->getAllConversations();

			$this->view('Direct_Message/message', $theMessages);
		}

		public function create()
		{

		}
	}
?>