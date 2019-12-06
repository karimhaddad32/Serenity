<?php
	class Direct_MessageController extends Controller 
	{
		public function index() 
		{
			$friend = $this->model('Friend_Link');
			$friends = $friend->getAllFriends($_SESSION['user_id']);

			foreach ($friends as $f) {
				if($f->sender_id == $_SESSION['user_id']){

					$friend_profile = $this->model('Profile')->find($f->receiver_id);
					$f->friend_name = $friend_profile->username;
					$f->friend_id = $friend_profile->profile_id;

					$picture = $this->model('Picture')->find($friend_profile->profile_picture);
					if($picture != null){
						$f->picture_path = $picture->path;
					}else{
						$f->picture_path = "images/default.png";
					}

				}else{
					
					$friend_profile = $this->model('Profile')->find($f->sender_id);
					$f->friend_name = $friend_profile->username;
					$f->friend_id = $friend_profile->profile_id;

					$picture = $this->model('Picture')->find($friend_profile->profile_picture);
					if($picture != null){
						$f->picture_path = $picture->path;
					}else{
						$f->picture_path = "images/default";
					}
					

				}

			}


			$this->view('Direct_Message/index', $friends);

		}

		public function message($conversation_partner) 
		{
			if (!isset($_POST['action'])) {
				$conversation = $this->model('Direct_Message');
				$conversation->sender_id = $_SESSION['user_id'];

				$theMessages =$conversation->getAllMessagesWithUser($conversation_partner);

				$conversation->messages = $theMessages;
				$conversation->other_profile = ($theMessages[0]->sender_id == $_SESSION['user_id'] ? $theMessages[0]->receiver_id : $theMessages[0]->sender_id);


				$this->view('Direct_Message/message', $conversation);
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