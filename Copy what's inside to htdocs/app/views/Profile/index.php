
	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>

	<?php  $this->view('/Shared/top_nav_bar_profile');?>

	<div class="container" style="display: grid; grid-template-columns: auto;">
		<h1 style="text-align: center">My Profile</h1>
		<div style="display: grid; grid-template-columns: auto auto;">
			<?php echo "<img class='img-circle' style='max-width:100px; max-height:100px; min-width:100px; min-height:100px' src='/$model->picture_path'>" ?>
			<div>
			<?php 
			if($model->profile_id == $_SESSION['user_id']){
			echo "Username : $model->username <br/> First Name: $model->first_name 
			<br/> Last Name: $model->last_name <br/> Phone Number: $model->phone_number <br/> Gender: $model->gender";

			}
			

			?>
				
			</div>	
		</div>
		
		<div style="display: grid; grid-template-columns: 10% 80% 10%">
			<div>
			

			</div>
			<div class="container">
				
			<?php
					foreach ($model->posts as $post) 
					{
							 $this->view('/Profile/post', $post ); 
					}
					?>	

			</div>
			<div></div>
		</div>
	</div>

<script>
function myFunction(post_id) {
  if(confirm("Are you sure you want to delete this post?"))
  {

  	location.href='/Post/delete/'+ post_id + '?isProfile=1';
  }
}
</script>