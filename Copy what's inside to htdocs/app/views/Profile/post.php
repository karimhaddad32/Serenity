<div>

<dl align="center" style="overflow: auto; max-height: 800px">	
<?php


if($model->profile_id == $_SESSION['user_id']){
	echo 
	"
	<dd>Category: $model->category_type</dd> 
	<dd>$model->post_content</dd>
	<dd>$model->timestamp</dd>
	<dd><button onclick='myFunction($model->post_id)'>Delete</button></dd>
	";
}else{
	echo 
	"
	<dd>Category: $model->category_type</dd> 
	<dd>$model->post_content</dd>
	<dd>$model->timestamp</dd>
	<dd></dd>
	";

	}

	echo "<dd><button onclick='favorite($model->post_id)'>Favorite</button></dd>";
	echo "<dd><a href='/Recommendation/create/$model->post_id'>Recommend</a></dd>";

?>
	<?php foreach ($model->comments as $comment) {
	 $this->view('/Profile/comment', $comment ); 
	} 	
	?>
  </dl>


					<div>
						
					</div>
					



</div>

