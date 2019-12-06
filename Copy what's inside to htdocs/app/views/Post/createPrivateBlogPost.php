<html>
<head>
	<title>Create a Blog Post</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); ?>
<div class="container">
	<h1>Create a New Private Blog Post</h1>
	<form method='post' class="form-horizontal">
		<label>Category of post: </label>
		<select name="category_id" class="form-control" >
			<?php
				foreach ($model as $category) 
				{
					echo "<option value='$category->category_id'>$category->category_type</option>";
				}
			?>
		</select>
		<br>
		<label>What do you want to say?<br>
		<textarea type='text' name='post_content' style="height: 400px; width: 500px"> </textarea>
		<br>
		<input type='submit' name='action' value='Submit Post' class="btn btn-success" />
		<a href="/profile/friends_wall">Cancel</a>
	</form>
</div>
</body>
</html>