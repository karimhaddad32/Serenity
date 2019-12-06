<html>
<head>
	<title>Delete Post</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
	<h1>Delete this?</h1>
	<form method='post' action="">
		<label>Category ID: </label><?php echo $model->category_id; ?><br>
		<label>Post content: </label><?php echo $model->post_content; ?><br>
		<label>Timestamp: </label><?php echo $model->timestamp; ?><br>
		<input type='submit' name='action' value='Delete' /><a href="/profile/wall">Cancel</a>
	</form>
</div>
</body>
</html>