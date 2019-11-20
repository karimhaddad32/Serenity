<?php

class Controller
{

	protected function view($view, $model = []) {
		if ($_SESSION && $_SESSION['user_id'] != null) {
			echo "user_id = " . $_SESSION['user_id'];
		} else {
			echo "user_id is NULL";
		}

		if (file_exists('app/views/' . $view . '.php')) {
			//not sure about _once here...
			require 'app/views/' . $view . '.php';
		} else {
			echo "Can't load view $view: file not found!";
		}
	}

	public static function model($model) {
		if (file_exists('app/models/' . $model . '.php')){
			require_once 'app/models/' . $model . '.php';
			return new $model();
		} else {
			return null;//could also return new stdClass();
		}
	}

}

?>