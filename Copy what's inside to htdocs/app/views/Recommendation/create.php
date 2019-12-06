	<?php $this->view('/Shared/top_nav_bar_main'); ?>
<?php
		echo 
		"<tr>
			<td>$model->category_id</td> 
			<td>$model->post_content</td>
			<td>$model->timestamp</td>		
		</tr>";
	
	?>

	<form method='post' action='/Recommendation/create/<?php echo "$model->post_id" ?>'>
		Who do you want to recommend?</br>

		<select name="recommended_id">
			<?php
				foreach ($model->friends as $friend) 
				{	
					echo "<option value='$friend->profile_id'>$friend->username</option>";
				}
			?>
		</select>

		<input type='submit' name='action' value='Submit' />
	
	</form>



