<?php

class ProfileController extends Controller {
	
	public function index() {
		if ($_SESSION['user_id'] == null) {
			header('location:/Login/index');
		}

		echo "<pre>";
		var_dump($_SESSION);
		echo "</pre>";
		

		$profile = $this->model('Profile');
		$profiles = $profile->getAll();
		return $this->view('Profile/index', $profiles);
	}
	public function wall()
	{
		return $this->view('Profile/wall');
	}

	public function create() {
		if (!isset($_POST['action'])) {
			$this->view('Default/create');
		} else {
			$person = $this->model('Profile');
			$person->first_name = $_POST['first_name'];
			$person->last_name = $_POST['last_name'];
			$person->insert();
			//redirecttoaction
			header('location:/Default/index');
		}
	}

	public function edit($person_id) {
		$thePerson = $this->model('Profile')->find($person_id);
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
		$thePerson = $this->model('Profile')->find($person_id);
		if (!isset($_POST['action'])) {
			$this->view('Default/delete', $thePerson);
		} else {
			$thePerson->delete();
			//redirecttoaction
			header('location:/Default/index');
		}

	}

}

?>