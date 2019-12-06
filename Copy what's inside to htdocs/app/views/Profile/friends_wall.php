
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
					<div class="container">
						<h1 style="text-align: center"></h1>
					</div>
					
					
					<table>
		
					<?php
					if(isset($model->posts)){
					foreach ($model->posts as $post) 
					{
						if($post->profile_id == $_SESSION['user_id']){

							echo 
						"<tr>
							<td>$post->category_type</td> 
							<td>$post->post_content</td>
							<td>$post->timestamp</td>
							<td><button onclick='myFunction($post->post_id)'>Delete</button></td>
						</tr>";
						}else{
							echo 
						"<tr>
							<td>$post->category_type</td> 
							<td>$post->post_content</td>
							<td>$post->timestamp</td>
					
						</tr>";
						}
						
					}
					}
					?>
				</table>
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