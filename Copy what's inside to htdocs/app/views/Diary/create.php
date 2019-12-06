<html>
<head>
	<title>New Diary</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
	<h1 style="color: #326496">Create a diary</h1>
	<form method='post'  class="form-horizontal">
		<label>Diary Name<input type='text' name='diary_title' class="form-control" /></label><br>
		
		<select name="category_id" class="form-control" style="width:250px; margin-bottom: 15px "  >
			<?php
				foreach ($model as $category) 
				{
					echo "<option value='$category->category_id'>$category->category_type</option>";
				}
			?>
		</select>

		<input type='submit' name='action' value='Create' class="btn btn-success" />
		<a href="/diary/index" class="btn btn-danger">Cancel</a>
	</form>
</div>
</body>
</html>