<?php
	class Direct_MessageController extends Controller 
	{
		public function index() 
		{
			$theMessage = $this->model('Direct_Message');
			$theMessage->sender_id = $_SESSION['user_id'];
			$theMessages = $theMessage->getAllConversations();

			$this->view('Direct_Message/index', $theMessages);
		}

		public function create()
		{

		}
	}
?>