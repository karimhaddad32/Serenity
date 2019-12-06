	<?php $this->view('/Shared/top_nav_bar_main'); ?>
<?php


		$this->view('/Profile/post', $model ); 
	
	?>

	<form method='post' class='form-horizontal' action='/Recommendation/create/<?php echo "$model->post_id"?>'>
		Who do you want to recommend?</br>
		<select name="recommended_id" class='form-control'>
			<?php
				foreach ($model->friends as $friend) 
				{	
					echo "<option value='$friend->profile_id'>$friend->username</option>";
				}
			?>
		</select>

		<input type='submit' name='action' value='Submit' class="btn btn-success" />
	
	</form>



