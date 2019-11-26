<?php

class DiaryController extends Controller {

	public function index() {
		$diary = $this->model('Diary');
		$diary->profile_id = $_SESSION['user_id'];
		$diaries = $diary->getAll();

		$this->view('diary/index', $diaries);
	}

	public function create() {
		if (!isset($_POST['action'])) {
			$this->view('diary/create');
		} else {
			$newDiary = $this->model('Diary');
			$newDiary->profile_id = $_SESSION['user_id'];
			$newDiary->last_modified = 0;
			$newDiary->created_in = 0;
			$newDiary->diary_title = $_POST['diary_title'];
			$newDiary->category_id = $_POST['category_id'];
			$newDiary->insert();
			header('location:/diary/index');
		}
	}

	public function edit($diary_id) {

		$diary = $this->model('Diary')->find($diary_id);

		if(!isset($_POST['action'])) {

			$this->view('diary/edit', $diary);

		} else {

        	$diary->diary_title = $_POST['diary_title'];
        	$diary->category_id = $_POST['category_id'];

			$diary->update();

			header('location:/diary/index');
		}
	}




	public function delete($diary_id) {
		$diary = $this->model('Diary')->find($diary_id);
		if (!isset($_POST['action'])) {
			$this->view('diary/delete', $diary);
		} else {
			$diary->delete();
			header('location:/diary/index');
		}

	}
/*
	public function view($diary_id) {
		$diary = $this->model('Diary');
		$diary->diary_id = $diary_id;
		$diaryEntries = $diary->getAllEntries();

		$this->view('diary/view/$diary_id', $diaryEntries);
	}
*/
}

?>