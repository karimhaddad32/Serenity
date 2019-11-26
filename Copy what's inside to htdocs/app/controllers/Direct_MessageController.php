<?php
class Direct_MessageController extends Controller 
{
	public function index() 
	{
		$theMessage = $this->model('Direct_Message');
		$theMessages->profile_id = $_SESSION['user_id'];
		$theMessages = $theMessage->getAllConversations();

		$this->view('DirectMessage/index', $theMessages);
	} 
	public function create() 
	{
		
	}
}
?>