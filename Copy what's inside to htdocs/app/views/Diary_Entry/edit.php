<html>
<head>
	<title>Edit diary</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
	<h1 style="color: #326496">Edit Diary Entry</h1>
	<form method='post'>

		<?php  
			echo "<label>New title: <input type='text' name='entry_title' value='$model->entry_title' /></label><br>
					<label>New Text: <input type='text' name='entry' value='$model->entry' /></label><br>"

		?>
		
		<input type='submit' name='action' value='Update' />
		<a href="/diary/index">Cancel</a>
	</form>
</div>
</body>
</html>