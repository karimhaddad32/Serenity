<html>
<head>
	<title>New Diary Entry</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
	<h1 style="color: #326496">New diary entry</h1>
	<form method='post'>
		<label>Entry Title<input type='text' name='entry_title' /></label><br>
		<label>Entry<input type='text' name='entry' /></label><br>

		<input type='submit' name='action' value='Create' />
		<a href="/diary/index">Cancel</a>
	</form>
</div>
</body>
</html>