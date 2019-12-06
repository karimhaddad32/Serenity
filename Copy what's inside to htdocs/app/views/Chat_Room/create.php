<html>
<head>
	<title>Create a Chat Room</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
	<h1 style="color: #326496">Create a Chat Room</h1>
	<form method='post'>
		<label>category_id<input type='text' name='category_id' /></label><br>
		<label>room_title<input type='text' name='room_title' /></label><br>
		<label>maximum_space<input type='text' name='maximum_space' /></label><br>
		<input type='submit' name='action' value='Create' />
		<a href="/Chat_Room/index">Cancel</a>
	</form>
</div>
</body>
</html>