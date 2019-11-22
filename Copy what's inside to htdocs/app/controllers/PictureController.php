<?php

class PictureController extends Controller {
	public function index() {
		$picture = $this->model('Picture');
		$pictures = $picture->getAllPictures();
		$this->view('Picture/index', $pictures);
	}
	public function create() {
		if (!isset($_POST['action'])) {
			$this->view('Picture/create');
		} else {
			$picture = $this->model('Picture');
			$pictures->uploadPicture();
			//redirecttoaction
			header('location:/Picture/index');
		}
	}
	// public function edit($person_id) {
	// 	$thePerson = $this->model('_Person')->find($person_id);
	// 	if (!isset($_POST['action'])) {
	// 		$this->view('Default/edit', $thePerson);
	// 	} else {
	// 		$thePerson->first_name = $_POST['first_name'];
	// 		$thePerson->last_name = $_POST['last_name'];
	// 		$thePerson->update();
	// 		//redirecttoaction
	// 		header('location:/Default/index');
	// 	}
	// }
	public function delete($picture_id) {
		$thePicture = $this->model('Picture')->find($picture_id);
		if (!isset($_POST['action'])) {
			$this->view('Picture/delete', $thePicture);
		} else {
			$thePicture->deletePicture();
			//redirecttoaction
			header('location:/Picture/index');
		}
	}
}
?>