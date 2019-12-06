<?php

class Chat_RoomController extends Controller {

	public function index() {
		$chatRoom = $this->model('Chat_Room');
		$chatRooms = $chatRoom->getAll();

		$this->view('Chat_Room/index', $chatRooms);
	}

	public function create() {
		if (!isset($_POST['action'])) {
			$this->view('Chat_Room/create');
		} else {
			$chatRoom = $this->model('Chat_Room');
			$chatRoom->category_id = $_POST['category_id'];
			$chatRoom->owner_id = $_SESSION['user_id'];
			$chatRoom->room_title = $_POST['room_title'];
			$chatRoom->maximum_space = $_POST['maximum_space'];
			$chatRoom->insert();
			//redirecttoaction
			header('location:/Chat_Room/index');
		}
	}

		public function chat($chat_room_id) {
			if (!isset($_POST['action'])) {
				$chatRoomMessage = $this->model('Chat_Room_Message');
				$chatRoomMessages = $chatRoomMessage->getAllChatRoomMessagesInChatRoom($chat_room_id);




				$this->view('Chat_Room/chat', $chatRoomMessages);
			} else {
				$chatRoomMessage = $this->model('Chat_Room_Message');
				$chatRoomMessage->chat_room_id = $chat_room_id;
				$chatRoomMessage->sender_id = $_SESSION['user_id'];
				$chatRoomMessage->message = $_POST['message'];
				$chatRoomMessage->insert();
				//redirecttoaction
				header("Refresh:0");
			}
		}
/*
	public function edit($person_id) {
		$thePerson = $this->model('_Person')->find($person_id);
		if (!isset($_POST['action'])) {
			$this->view('Default/edit', $thePerson);
		} else {
			$thePerson->first_name = $_POST['first_name'];
			$thePerson->last_name = $_POST['last_name'];
			$thePerson->update();
			//redirecttoaction
			header('location:/Default/index');
		}
	}




	public function delete($person_id) {
		$thePerson = $this->model('_Person')->find($person_id);
		if (!isset($_POST['action'])) {
			$this->view('Default/delete', $thePerson);
		} else {
			$thePerson->delete();
			//redirecttoaction
			header('location:/Default/index');
		}

	}
*/
}

?>