<html>
<head>
	<title>New Diary</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
	<h1 style="color: #326496">Create a diary</h1>
	<form method='post'>
		<label>Diary Name<input type='text' name='diary_title' /></label><br>
		<label>Category<input type='text' name='category_id' /></label><br>
		<input type='submit' name='action' value='Create' />
		<a href="/diary/index">Cancel</a>
	</form>
</div>
</body>
</html>