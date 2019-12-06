
<head>
	<title>News Feed</title>
</head>

<div>
	<?php $this->view('/Shared/top_nav_bar_main'); ?>
	<div class="container">
		<a href="/post/createPublicBlog" style="padding-right: 10px">Create Public Blog Post</a> |
		<a href="/post/createQuote" style="padding-left: 10px">Create Quote Post</a>
		<h1 style="text-align: center">News Feed</h1>
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
</div>

<script>
function myFunction(post_id) {
  if(confirm("Are you sure you want to delete this post?"))
  {
  	location.href='/Post/delete/'+ post_id;
  }
}
</script>
