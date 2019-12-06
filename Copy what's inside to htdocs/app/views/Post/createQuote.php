
<?php $this->view('/Shared/top_nav_bar_main'); ?>

   

<form  action="/Post/createQuote" method="post" enctype="multipart/form-data">
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
	 Select image to upload:
	<input type="file" name="path" id="path">   	
	<br>
	<input type='submit' name='action' value='Submit Post' />
	<a href="/Profile/wall">Cancel</a>
</form>