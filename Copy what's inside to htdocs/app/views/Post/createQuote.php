
<?php $this->view('/Shared/top_nav_bar_main'); ?>

   

<form  action="/Post/createQuote" method="post" enctype="multipart/form-data" class="form-horizontal container">
	<label>Category of post: </label>
	<select name="category_id" class="form-control">
		<?php
			foreach ($model as $category) 
			{
				echo "<option value='$category->category_id'>$category->category_type</option>";
			}
		?>
	</select>

	<br>	
	 Select image to upload:
	<input style="margin: 15px" type="file" name="path" id="path" >   	
	<br >
	<input type='submit' name='action' value='Submit Post' class="btn btn-success"  />
	<a href="/Profile/wall" class="btn btn-danger">Cancel</a>
</form>