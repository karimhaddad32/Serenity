<html>
<head>
	<title>Create a Post</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
	<h1>Create a New Post</h1>
	<form method='post'>
		<label>What do you want to say?<input type='text' name='post content' /></label><br>
		<input type='submit' name='action' value='Submit Post' />
		<a href="/profile/wall">Cancel</a>
	</form>
</div>
</body>
</html>