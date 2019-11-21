<?php

class CommentController extends Controller {

	public function create($post_id) {
		if (!isset($_POST['action'])) {
			$this->view('Comment/create');
		} else {
			$comment = $this->model('Comment');
			$comment->profile_id = $_SESSION['user_id'];
			$comment->post_id = $post_id;
			$comment->comment_content = $_POST['comment_content'];
			$comment->timestamp = 0;
			$comment->insert();
			header('location:/Profile/index');
		}
	}

	public function edit($comment_id) {
		$comment = $this->model('Comment')->find($comment_id);
		if (!isset($_POST['action'])) {
			$this->view('Comment/edit', $comment);
		} else {
			$comment->comment_content = $_POST['comment_content'];
			$comment->update();
			header('location:/Default/index');
		}
	}

	public function delete($comment_id) {
		$comment = $this->model('_Person')->find($comment_id);
		if (!isset($_POST['action'])) {
			$this->view('Comment/delete', $comment);
		} else {
			$comment->delete();
			header('location:/Default/index');
		}
	}
}

?>