
<head>

	<title>Friends Feed</title>
</head>

		<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
		
	<h1  style="text-align: center">Friends Feed</h1>

	<a href ='/post/createStatus' style="padding-left: 10px; padding-right: 10px">Create New Status</a> 

	<a href ='/post/createPrivateBlog' style="padding-left: 10px; padding-right: 10px">Create Private Blog Post</a> 

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

<script>
function myFunction(post_id) {
  if(confirm("Are you sure you want to delete his post?"))
  {
  	location.href='/Post/delete/'+ post_id;
  }
}
</script>