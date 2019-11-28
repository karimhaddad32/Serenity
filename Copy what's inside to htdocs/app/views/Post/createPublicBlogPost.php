<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Create a Blog Post</title>
</head>
<body>
<div class="container">
	<h1>Create a New Public Blog Post</h1>
	<form method='post'>
		<label>Category of post: </label>
		<select name="category_id">
			<?php
				foreach ($model as $category) 
				{
					echo "<option value='$category->category_id'>$category->category_type</option>";
				}
			?>
		</select>
		<br>
		<label>What do you want to say?<br>
		<input type='text' name='post_content' /></label>
		<br>
		<label>Any references? (include links here)<br>
		<input type='text' name='reference_link' /></label>
		<br>
		<input type='submit' name='action' value='Submit Post' />
		<a href="/post/index">Cancel</a>
	</form>
</div>
</body>
</html>