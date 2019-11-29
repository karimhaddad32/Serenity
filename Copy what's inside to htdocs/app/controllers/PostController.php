<?php
class PostController extends Controller 
{
	public function index() 
	{
		$post = $this->model('Post');
		$post->profile_id = $_SESSION['user_id'];
		$posts = $post->getAllPosts();

		$this->view('Post/index', $posts, $post);
	}
	public function createStatus() 
	{
		if (!isset($_POST['action'])) 
		{
			$list = $this->model('Category')->getAll();
			$this->view('Post/createStatus', $list);
		} 
		else 
		{
			$newPost = $this->model('Post');
			$newPost->profile_id = $_SESSION['user_id'];
			$newPost->type = 'Status Update';
			$newPost->category_id = $_POST['test'];
			$newPost->post_content = $_POST['post_content'];
			$newPost->createStatusPost();
			//redirecttoaction
			header('location:/Post/index');
		}
	}
	public function createPublicBlog() 
	{
		if (!isset($_POST['action'])) 
		{
			$list = $this->model('Category')->getAll();
			$this->view('Post/createPublicBlogPost', $list);
		} 
		else 
		{
			$newPost = $this->model('Post');
			$newPost->profile_id = $_SESSION['user_id'];
			$newPost->type = 'Public Blog';
			$newPost->reference_link = $_POST['reference_link'];
			$newPost->category_id = $_POST['category_id'];
			$newPost->post_content = $_POST['post_content'];
			$newPost->createPublicPost();
			//redirecttoaction
			header('location:/Post/index');
		}
	}
	public function createPrivateBlog() 
	{
		if (!isset($_POST['action'])) 
		{
			$list = $this->model('Category')->getAll();
			$this->view('Post/createPrivateBlogPost', $list);
		} 
		else 
		{
			$newPost = $this->model('Post');
			$newPost->profile_id = $_SESSION['user_id'];
			$newPost->type = 'Private Blog';
			$newPost->reference_link = $_POST['reference_link'];
			$newPost->category_id = $_POST['category_id'];
			$newPost->post_content = $_POST['post_content'];
			$newPost->createPrivatePost();
			//redirecttoaction
			header('location:/Post/index');
		}
	}
	public function createQuote() 
	{
		if (!isset($_POST['action'])) 
		{
			$this->view('Post/createQuote');
		} 
		else 
		{
			$newPost = $this->model('Post');
			$newPost->profile_id = $_SESSION['user_id'];
			$newPost->type = 'Quote Post';
			$newPost->category_id = $_POST['category_id'];
			$newPost->post_content = $_POST['post_content'];
			$newPost->picture_id = $_POST['picture_id'];
			$newPost->createQuotePost();
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