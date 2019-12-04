<?php
	class Direct_MessageController extends Controller 
	{
		public function index() 
		{
			$friend = $this->model('Friend_Link');
			$friends = $friend->getAllFriends($_SESSION['user_id']);
			$this->view('Direct_Message/index', $friends);
		}

		public function message($conversation_partner) 
		{
			if (!isset($_POST['action'])) {
				$theMessage = $this->model('Direct_Message');
				$theMessage->sender_id = $_SESSION['user_id'];
				$theMessages = $theMessage->getAllMessagesWithUser($conversation_partner);

				$this->view('Direct_Message/message', $theMessages);
			} else {
				$newMessage = $this->model('Direct_Message');
				$newMessage->sender_id = $_SESSION['user_id'];
				$newMessage->receiver_id = $conversation_partner;
				$newMessage->message_content = $_POST['message'];
				var_dump($newMessage);
				$newMessage->insert();
				//redirecttoaction
				header("Refresh:0");
			}
		}

		public function create()
		{

		}
	}
?>