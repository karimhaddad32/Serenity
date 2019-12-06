<html>
<head>

	<title>Edit diary</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); ?>
<div class="container">
	<h1 style="color: #326496">Edit diary</h1>
	<form method='post'>
		<label>New title: <input type='text' name='diary_title' value='<?php echo $model->diary_title; ?> '/></label><br>
		<select name="category" style="background-color: #D8BFD8; font-weight: bold">
			<?php
				foreach ($model->categories as $category) 
				{
					echo "<option value='$category->category_id'>$category->category_type</option>";
				}
			?>
		</select><br>
		<input type='submit' name='action' value='Update' />
		<a href="/diary/index">Cancel</a>
	</form>
</div>
</body>
</html>