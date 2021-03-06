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
			header('location:/Profile/friends_wall');
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
			header('location:/Profile/wall');
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
			header('location:/Profile/friends_wall');
		}
	}
	public function createQuote() 
	{
		if (!isset($_POST['action'])) 
		{
			$list = $this->model('Category')->getAll();
			$this->view('Post/createQuote',$list );
		} 
		else 
		{
			$target_dir = "images/";	//the folder where files will be saved
				$allowedTypes = array("jpg", "png", "jpeg", "gif", "bmp");// Allow certain file formats
				$max_upload_bytes = 5000000;

				foreach($_FILES as $key=>$theFile){
					$uploadOk = 1;
					if(isset($theFile)) {
						//Check if image file is a actual image or fake image
						//this is not a guarantee that malicious code may be passed in disguise
						$check = getimagesize($theFile["tmp_name"]);
						if($check !== false) {
							echo "File is an image - " . $check["mime"] . ".";
							$uploadOk = 1;
						} else {
							echo "File is not an image.";
							$uploadOk = 0;
						}
						$extension = strtolower(pathinfo(basename($theFile["name"]),PATHINFO_EXTENSION));
						//give a name to the file such that it should never collide with an existing file name.
						$target_file_name = uniqid().'.'.$extension;	
						$target_path = $target_dir . $target_file_name;
						//NOTE: that this file path probably should be saved to the database for later retrieval

						//It is very unlikely given the naming scheme that another file of the same name will exist... 
						// Check if file already exists
						/*if (file_exists($target_path)) {
							echo "Sorry, file already exists.";
							$uploadOk = 0;
						}*/

						//You may limit the size of the incoming file... Check file size
						if ($theFile["size"] > $max_upload_bytes) {
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}

						// Allow certain file formats
						if(!in_array($extension, $allowedTypes)) {
							echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							$uploadOk = 0;
						}

						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						} else {// if everything is ok, try to upload file - to move it from the temp folder to a permanent folder
							if (move_uploaded_file($theFile["tmp_name"], $target_path)) {
								echo "The file ". basename( $theFile["name"]). " has been uploaded as <a href='$target_path'>$target_path</a>.";
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}
					}
				}

				$picture = $this->model('Picture');

				$picture->path = $target_path;
				
				$picture->insert();

				$picture = $picture->getInsertedPicture();


				$newPost = $this->model('Post');
				$newPost->profile_id = $_SESSION['user_id'];
				$newPost->type = 'Quote Post';
				$newPost->category_id = $_POST['category_id'];
				$newPost->post_content = '';
				$newPost->picture_id = $picture->picture_id;
				$newPost->createQuotePost();
			//redirecttoaction
			header('location:/Profile/wall');
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
			header('location:/Profile/wall');
		}
	}
	public function delete($post_id) 
	{
		$thePost = $this->model('Post')->find($post_id);

			$thePost->deletePost();
			// //redirecttoaction

			
				if($thePost->type == 'Quote Post' ||$thePost->type == 'Public Blog'){
				header('location:/Profile/wall');
			}else{
				header('location:/Profile/friends_wall');
			}
	}

	public function detail($post_id) 
	{
		
		$thePost = $this->getAllPostsDetails($post_id);
		
		$this->view('/Post/detail', $thePost ); 
	}

		public function getAllPostsDetails($post_id) 
		{
		
			$thePost = $this->model('Post')->find($post_id);

			$thePost->post_reactions = $this->model('Post_Reaction')->getAllPostReactions($post_id);


			foreach ($thePost->post_reactions as $post_reaction) {
				$reaction = $this->model('Reaction_type')->getReaction($post_reaction->reaction_type_id)->reaction_description;
				$post_reaction->reaction_description = $reaction;
			}

			$thePost->category_type = $this->model('Category')->getCategory($thePost->category_id)->category_type;

			$comments = $this->model('Comment')->getAll($post_id);

			foreach ($comments as $comment) {
 							
				$comment_reactions = $this->model('Comment_Reaction')->getAll($comment->comment_id);

				$comment->reactions = $comment_reactions ;

				foreach ($comment->reactions as $r) {
					$reaction = $this->model('Reaction_type')->getReaction($r->reaction_type_id)->reaction_description;
					$r->reaction_description = $reaction;
				}
 			}

 			$thePost->comments =  $comments;


			return $thePost;
		}

		public function preFunction($object){

		echo "<pre>";
			var_dump($object);
		echo "</pre>";

		}
}
?>