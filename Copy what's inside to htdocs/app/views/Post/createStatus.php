<html>
<head>

	<title>Create a Status</title>
</head>
<body style="text-align: center">
	<?php $this->view('/Shared/top_nav_bar_main'); ?>
<div class="container">
	<h1 style="text-align: center; background-color: #B0E0E6">Create a New Status</h1>
	<form method='post' style="background-color: pink; border-bottom-right-radius: 30px; border-top-right-radius: 30px; border-bottom-left-radius: 30px; border-top-left-radius: 30px; padding-top: 10px; padding-bottom: 10px">
		<label style="font-size: 16px">Category of status: </label><br>
		<select name="test" style="background-color: #D8BFD8; font-weight: bold">
			<?php
				foreach ($model as $category) 
				{
					echo "<option value='$category->category_id'>$category->category_type</option>";
				}
			?>
		</select>
		<br>
		<br>
		<label style="font-size: 16px; text-align: center">What do you want to say?<br>
		<input type='text' name='post_content' style="height: 40px; width: 500px" /></label>
		<br>
		<br>
		<input type='submit' name='action' value='Post' style="background-color: #D8BFD8; border-radius: 20px; padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 5px" />
		<a href="/profile/friends_wall">Cancel</a>
	</form>
</div>
</body>
</html>