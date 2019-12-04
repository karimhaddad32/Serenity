<?php

class ProfileController extends Controller {

	
	
	public function index() {

		$profile_id = $_SESSION['user_id'];
		$profile = $this->model('Profile');
		$profile = $profile->find($profile_id);


		if($profile->profile_picture != null){
		$picture = $this->model('Picture')->find($profile->profile_picture);
		$profile->picture_path = $picture->path;	
		}else{
			$profile->picture_path = "images/default.png";
		}



		

		return $this->view('Profile/index', $profile);
			
	}

	public function upload_picture(){
			$profile_id = $_SESSION['user_id'];
			$profile = $this->model('Profile')->find($profile_id);

			if (!isset($_POST['action'])) {
					return $this->view('/Profile/upload_picture');
			} else {

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

				
				if($profile->profile_picture == null){

					$picture->path = $target_path;
					var_dump($picture);
					$picture->insert();
					$picture = $picture->getInsertedPicture();
					

					$profile->profile_picture = $picture->picture_id;
					$profile->update();

				}else{

					$picture = $this->model('Picture')->find($profile->profile_picture);
					unlink($picture->path);
					$picture->path = $target_path;
					$picture->update();

				}

				header('location:/Profile/index');

			}
	



	}

	public function search_friends(){

			$profile_id = $_SESSION['user_id'];

			$profile = $this->model('Profile')->find($profile_id);
			
			 if(!isset($_POST['username']) || $_POST['username'] == ''){	


				$profiles = $profile->getAll();

			 }else{
	
				$profiles = $profile->search($_POST['username']);

			 }
			 	foreach ($profiles as $p ) {

			 		$friend_link = $this->model('friend_link')->find($_SESSION['user_id'], $p->profile_id);			 
			 		$p->friend_link = $friend_link;
			 		$picture = $this->model('Picture')->find($p->profile_picture);
			 		

			 		if($picture != null){
			 			$p->picture_path = $picture->path;
			 		}else{
			 			$p->picture_path = "images/default.png";
			 		}



			 	}

			 		
			 	foreach ($profiles as $friend) {
					
					}



					// var_dump($profiles);	
				$profile->other_profiles = $profiles;



			
				return $this->view('Profile/search_friends', $profile);
	

	}

	public function wall() {	

		$profile_id = $_SESSION['user_id'];
		$profile = $this->model('Profile');
		$profile = $profile->find($profile_id);

		if($profile != null){
				$_SESSION['profile_id'] = $profile->profile_id;
				return $this->view('Profile/wall');
			}
			else{
				$_SESSION['profile_id'] = null;
				header('location:/Profile/create');
			}	
	}

	public function create() {
		if (!isset($_POST['action'])) {
			$this->view('Profile/create');
		} else {
			
			$profile = $this->model('Profile');
			$profile->profile_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->username = $_POST['username'];
			$profile->gender = $_POST['gender'];
			$profile->phone_number = $_POST['phone_number'];

			$profile->insert();


			//redirecttoaction
			header('location:/Profile/index');

		}
	}

	public function edit(){
		$profile_id = $_SESSION['user_id'];
		$profile = $this->model('Profile')->find($profile_id);

		if (!isset($_POST['action'])) {
			return $this->view('Profile/edit', $profile);
		} else {

			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->username = $_POST['username'];
			$profile->gender = $_POST['gender'];
			$profile->phone_number = $_POST['phone_number'];

			$profile->update();
			//redirecttoaction
			header('location:/Profile/index');
		}
	}


	public function delete($profile_id) {
		$thePerson = $this->model('Profile')->find($profile_id);
		if (!isset($_POST['action'])) {
			$this->view('Profile/delete', $thePerson);
		} else {
			$thePerson->delete();
			//redirecttoaction
			header('location:/Profile/index');
		}
	}
}
?>