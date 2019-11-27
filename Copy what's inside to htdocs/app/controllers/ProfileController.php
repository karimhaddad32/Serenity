<?php

class ProfileController extends Controller {

	
	
	public function index() {

		$profile_id = $_SESSION['user_id'];
		$profile = $this->model('Profile');
		$profile = $profile->find($profile_id);

		return $this->view('Profile/index', $profile);
			
	}

	public function search_friends(){

			$profile_id = $_SESSION['user_id'];
			$profile = $this->model('Profile')->find($profile_id);
		

		
			 if(!isset($_POST['username']) || $_POST['username'] == ''){

				$profile = $profile->find($profile_id);

				$profiles = $profile->getAll();

				$profile->other_profiles = $profiles;
		
			return $this->view('Profile/search_friends', $profile);
			 }else{
	
				$profiles = $profile->search($_POST['username']);

				$profile->other_profiles = $profiles;
			
				return $this->view('Profile/search_friends', $profile);
			 }
		
		//$friends = $profile->getAllFriends();

	}

	public function wall() {	

		$profile_id = $_SESSION['user_id'];
		$profile = $this->model('Profile');
		$profile = $profile->find($profile_id);

		if($profile != null){
				$_SESSION['profile_id'] = $profile->profile_id;
				return $this->view('Profile/wall');
			}
			else{
				$_SESSION['profile_id'] = null;
				header('location:/Profile/create');
			}	
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
		$profile_id = $_SESSION['user_id'];
		$profile = $this->model('Profile')->find($profile_id);

		if (!isset($_POST['action'])) {
			return $this->view('Profile/edit', $profile);
		} else {

			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->username = $_POST['username'];
			$profile->gender = $_POST['gender'];
			$profile->phone_number = $_POST['phone_number'];

			$profile->update();
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