<?php

class PostController extends Controller 
{
	public function index() 
	{
		$post = $this->model('Post');
		$posts = $post->getAllPosts();
		$this->view('Post/index', $people);
	}
	public function createPost() 
	{
		if (!isset($_POST['action'])) 
		{
			$this->view('Post/create');
		} 
		else 
		{
			$post = $this->model('Post');
			$post->post_id = $_POST['post_id'];
			$post->profile_id = $_POST['profile_id'];
			$post->type = $_POST['type'];
			$post->reference_link = $_POST['reference_link'];
			$post->category_id = $_POST['category_id'];
			$post->timestamp = $_POST['timestamp'];
			$post->post_content = $_POST['post_content'];
			$post->picture_id = $_POST['picture_id'];
			$post->createPost();
			//redirecttoaction
			header('location:/Post/createPost');
		}
	}
	// public function edit($person_id) 
	// {
	// 	$thePerson = $this->model('_Person')->find($person_id);
	// 	if (!isset($_POST['action'])) 
	// 	{
	// 		$this->view('Default/edit', $thePerson);
	// 	} 
	// 	else 
	// 	{
	// 		$thePerson->first_name = $_POST['first_name'];
	// 		$thePerson->last_name = $_POST['last_name'];
	// 		$thePerson->update();
	// 		//redirecttoaction
	// 		header('location:/Default/index');
	// 	}
	// }
	// public function delete($person_id) 
	// {
	// 	$thePerson = $this->model('_Person')->find($person_id);
	// 	if (!isset($_POST['action'])) 
	// 	{
	// 		$this->view('Default/delete', $thePerson);
	// 	} 
	// 	else 
	// 	{
	// 		$thePerson->delete();
	// 		//redirecttoaction
	// 		header('location:/Default/index');
	// 	}
	// }
}
?>