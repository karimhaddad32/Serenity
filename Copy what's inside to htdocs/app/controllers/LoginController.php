<?php

class LoginController extends Controller {

	public function index() {
		
		if (!isset($_POST['action'])) {
			$this->view('Login/index');
		} else {
			$user = $this->model('Login_Info');
			$user->username = $_POST['username'];
			$user = $user->find_username();

			if($user != null && password_verify($_POST['password'], $user->password))
			{
				$_SESSION['user_id'] = $user->user_id;
				//redirecttoaction
				header('location:/Profile/index');
			}else{
	
				return $this->view('Login/index', $data = ['error' => 'invalid username or password']);
			}	
		}
	}

	public function register() {
		if (!isset($_POST['action'])) {
			$this->view('Login/register');
		} else {
			$user = $this->model('Login_Info');
			$user->username = $_POST['username'];
			$user->email_address = $_POST['email_address'];
			$user->password = $_POST['password'];	

			if($user->find_username() != null || $user->find_emailaddress() != null){
				return $this->view('Login/register', 'account taken');
			}else{
				$user->insert();
				//redirecttoaction
				header('location:/Login/index', true);
			}
		}
	}

}

?>