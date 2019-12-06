<?php

class DiaryController extends Controller {

	public function index() {
		$diary = $this->model('Diary');
		$diary->profile_id = $_SESSION['user_id'];
		$diaries = $diary->getAll();
		
		foreach ($diaries as $d) {
			$d->category_type = $this->model('Category')->getCategory($d->category_id)->category_type;
		}

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

		$categories = $this->model('Category')->getAll();

		if(!isset($_POST['action'])) {
			$diary->categories = $categories;
			$this->view('diary/edit', $diary);

		} else {

        	$diary->diary_title = $_POST['diary_title'];
        	$diary->category_id = $_POST['category'];
      


			$diary->update();

			header('location:/diary/index');
		}
	}




	public function delete($diary_id) {
		$diary = $this->model('Diary')->find($diary_id);
				$diary->delete();
			header('location:/diary/index');
		
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

			$this->view('/diary/entry_create');

		} else {
			$newDiaryEntry = $this->model('Diary_Entry');
			$newDiaryEntry->diary_id = $diary_id;
			$newDiaryEntry->entry_title = $_POST['entry_title'];
			$newDiaryEntry->entry = $_POST['entry'];
			$newDiaryEntry->insert();
			header('location:/diary/index');
		}
	}

	public function entry_edit($diary_entry_id) {

		$diaryEntry = $this->model('Diary_Entry')->find($diary_entry_id);

		if (!isset($_POST['action'])) {


			$this->view('/diary_entry/edit', $diaryEntry);

		} else {

		
			$diaryEntry->diary_id = $diaryEntry->diary_id;
			$diaryEntry->entry_title = $_POST['entry_title'];
			$diaryEntry->entry = $_POST['entry'];
			$diaryEntry->update();
		
			header('location:/Diary/entries/' . $diaryEntry->diary_id);
		}
	}

	public function entry_delete($diary_entry_id) {

		$diaryEntry = $this->model('Diary_Entry')->find($diary_entry_id);

		$diaryEntry->delete();
		
		header('location:/Diary/entries/' . $diaryEntry->diary_id);
		
	}

}

?>