

<div align="center" style="  " class="card text-white bg-dark mb-3">	
<?php
echo "<div class='card-body'><div class='card-header'>Category: $model->category_type</div>";

	if($model->type == 'Quote Post'){
				echo "<div style='margin:15px'><img  style='min-width:400px; min-height:400px' src='/$model->path' ></div>";

	}
	 
	if($model->type != 'Quote Post'){
			echo "<div class='card-text'>$model->post_content</div>";
	}
	echo "<div>$model->timestamp</div>";
	echo "<div>";

	if($model->profile_id == $_SESSION['user_id']){
	echo "<button onclick='myFunction($model->post_id)' class='btn btn-danger'>Delete</button>
	";
	}

	echo "<button class='btn btn-secondary' onclick='favorite($model->post_id)'>Favorite</button><a href='/Recommendation/create/$model->post_id' class='btn btn-secondary' style='margin-left: 5px;'>Recommend</a></div>";
	
?>



<h4>Comments</h4>
<form method='post' class="form-horizontal" action=<?php echo "/Comment/create/$model->post_id";?> >

		<input type='text' name='comment_content' class="form-control"/input>
		<br>
		<input type='submit' name='action' value='Add comment'class="btn btn-success" />
	</form>



	<?php foreach ($model->comments as $comment) {
	 $this->view('/Profile/comment', $comment ); 
	} 	
	?>
	</div>
  </div>



