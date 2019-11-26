<?php

class PostController extends Controller 
{
	public function index() 
	{
		$post = $this->model('Post');
		$post->profile_id = $_SESSION['user_id'];
		$posts = $post->getAllPosts();

		$this->view('Post/index', $posts);
	}
	public function create() 
	{
		if (!isset($_POST['action'])) 
		{
			$this->view('Post/create');
		} 
		else 
		{
			$newPost = $this->model('Post');
			$newPost->profile_id = $_SESSION['user_id'];
			$newPost->type = $_POST['type'];
			$newPost->reference_link = $_POST['reference_link'];
			$newPost->category_id = $_POST['category_id'];
			$newPost->timestamp = $_POST['timestamp'];
			$newPost->post_content = $_POST['post_content'];
			$newPost->picture_id = $_POST['picture_id'];
			$newPost->createPost();
			//redirecttoaction
			header('location:/Post/index');
		}
	}
	public function edit($post_id) 
	{
		$thePost = $this->model('Post')->find($post_id);
		if (!isset($_POST['action'])) 
		{
			$this->view('Post/edit', $thePost);
		} 
		else 
		{
			$thePost->type = $_POST['type'];
			$thePost->reference_link = $_POST['reference_link'];
			$thePost->category_id = $_POST['category_id'];
			$thePost->timestamp = $_POST['timestamp'];
			$thePost->post_content = $_POST['post_content'];
			$thePost->picture_id = $_POST['picture_id'];
			$thePost->editPost();
			//redirecttoaction
			header('location:/Post/index');
		}
	}
	public function delete($post_id) 
	{
		$thePost = $this->model('Post')->find($post_id);
		if (!isset($_POST['action'])) 
		{
			$this->view('Post/delete', $thePost);
		} 
		else 
		{
			$thePost->deletePost();
			//redirecttoaction
			header('location:/Post/index');
		}
	}
}
?>