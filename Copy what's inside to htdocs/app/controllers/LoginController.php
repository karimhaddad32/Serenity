<?php

class LoginController extends Controller {

	public function index() {
		
		if (!isset($_POST['action'])) {
			if ($_SESSION && $_SESSION['user_id'] != null) {
				header('location:/Profile/index');
			} else {
				$this->view('Login/index');
			}
		} else {
			$user = $this->model('Login_Info');
			$user->username = $_POST['username'];
			$user->email_address =  $_POST['email_address'];
			$user = $user->find_user();

			if ($user != null && password_verify($_POST['password'], $user->password))
			{
				$_SESSION['user_id'] = $user->user_id;
				//redirecttoaction
				header('location:/Profile/index');
			} else {
				return $this->view('Login/index',  ['error' => 'invalid username or password']);
			}	
		}
	}

	public function register() {
		if (!isset($_POST['action'])) {
			if ($_SESSION['user_id'] != null) {
				header('location:/Profile/index');
			} else {
				$this->view('Login/register');
			}
		} else {

			if($_POST['password'] != $_POST['password_confirmation']) {
				return $this->view('Login/register', ['error' => 'passwords does not match']);
			}

			$user = $this->model('Login_Info');
			$user->username = $_POST['username'];
			$user->email_address = $_POST['email_address'];
			$user->password = $_POST['password'];	
		

			if ($user->find_user() != null) {
				return $this->view('Login/register', ['error' => 'account taken']);
			}
			else
			{
				$user->insert();

				$user = $user->find_user();

				$_SESSION['user_id'] = $user->user_id;

				//redirecttoaction
			
				header('location:/Login/index');

			}
		}
	}

	public function logout() {
		session_destroy();
		header('location:/Login/index'); // redirect the URL to login/index which calls its own view, good
		//return $this->view('Login/index'); // stay in login/logout URL but display the login/index view, not good
	}

	public function update_password() {
		$user = $this->model('Login_Info')->find_user_id($_SESSION['user_id']);
		if (!isset($_POST['action'])) {
			$this->view('Login/update_password');
		} else {
			if($_POST['password'] != $_POST['password_confirmation']){
				return $this->view('Login/update_password', ['error' => 'passwords does not match']);
			} else if(!$password_verify($_POST['password'],$user->password)) {
				return $this->view('Login/update_password', ['error' => 'wrong password']);
			} else {
				$user->password = $_POST['password'];
				$user->update_password();
				return $this->view('Profile/index' , ['Profile/index' ,'result' => 'Password has been updated']); //or wall
			}
		}
	}

	public function update_email() {
		$user = $this->model('Login_Info')->find_user_id($_SESSION['user_id']);
		if (!isset($_POST['action'])) {
			$this->view('Login/update_email');
		} else {
			
			$newUserData = $this->model('Login_Info');
			$newUserData->username = $user->username;
			$newUserData->email_address = $_POST['email_address'];
				
			if ($newUserData.find_user() != null) {
				return $this->view('Login/update_password', ['error' => 'Email address already used']);
			} else {
				$user->email_address =  $_POST['email_address'];
				$user->update_email();
				return $this->view('Profile/index', ['result' => 'Email has been updated']);//or wall
			}

		}
		
	}

}

?>