<?php

class ProfileController extends Controller {
	
	public function index() {
		$profile = $this->model('Profile');
		$profiles = $profile->getAll();
		return $this->view('Profile/index', $profiles);
	}

	public function wall() {
		return $this->view('Profile/wall');
	}

	public function create() {
		if (!isset($_POST['action'])) {
			$this->view('Profile/create');
		} else {
			
			$profile = $this->model('Profile');
			$profile->profile_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->username = $_POST['username'];
			$profile->gender = $_POST['gender'];
			$profile->phone_number = $_POST['phone_number'];

			$profile->insert();
			//redirecttoaction
			header('location:/Profile/index');
		}
	}
	public function edit(){
		$thePerson = $this->model('Profile')->find();
		if (!isset($_POST['action'])) {
			$this->view('Profile/edit', $thePerson);
		} else {
			$thePerson->first_name = $_POST['first_name'];
			$thePerson->last_name = $_POST['last_name'];
			$thePerson->update();
			//redirecttoaction
			header('location:/Profile/index');
		}
	}
	public function delete($profile_id) {
		$thePerson = $this->model('Profile')->find($profile_id);
		if (!isset($_POST['action'])) {
			$this->view('Profile/delete', $thePerson);
		} else {
			$thePerson->delete();
			//redirecttoaction
			header('location:/Profile/index');
		}
	}
}
?>