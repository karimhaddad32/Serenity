<?php

class DiaryController extends Controller {

	public function index() {
		$diary = $this->model('Diary');
		$diary->profile_id = $_SESSION['user_id'];
		$diaries = $diary->getAll();

		return $this->view('diary/index', $diaries);
	}

	public function create() {
		if (!isset($_POST['action'])) {

			$list = $this->model('Category')->getAll();
			$this->view('diary/create', $list);

		} else {
			$newDiary = $this->model('Diary');
			$newDiary->profile_id = $_SESSION['user_id'];
			//$newDiary->last_modified = 0;
			$newDiary->created_in = date("Y-m-d");
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

	public function entries($diary_id) {
		$diary = $this->model('Diary')->find($diary_id);
		$diary->DiaryEntries = $diary->getAllEntries();
		//var_dump($diary->getAllEntries());
		//$diaryEntry = $this->model('Diary_Entry');
		//$diaryEntry->diary_id = $diary_id;
		//$diaryEntries = $diaryEntry->getAll();
		return $this->view('diary/entries', $diary);
	}

	public function entry_create($diary_id) {
		if (!isset($_POST['action'])) {

			$this->view('diary/entry_create');

		} else {
			$newDiaryEntry = $this->model('Diary_Entry');
			$newDiaryEntry->diary_id = $diary_id;
			$newDiaryEntry->entry_title = $_POST['entry_title'];
			$newDiaryEntry->entry = $_POST['entry'];
			$newDiaryEntry->insert();
			//header('location:/diary/entries', $diary_id);
			header('location:/diary/index');
		}
	}

}

?>