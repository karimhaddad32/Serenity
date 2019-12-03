<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Posts</title>
</head>
<body>
	<div class="container">
		<h1 style="text-align: center">Your Posts</h1>
	</div>
	<a href ='/post/createStatus' style="padding-left: 10px; padding-right: 10px">Create New Status</a> |
	<a href ='/post/createPublicBlog' style="padding-left: 10px; padding-right: 10px">Create Public Blog Post</a> |
	<a href ='/post/createPrivateBlog' style="padding-left: 10px; padding-right: 10px">Create Private Blog Post</a> |
	<a href ='/post/createQuote' style="padding-left: 10px; padding-right: 10px">Create Quote Post</a>
	
	<table>
	<tr>
		<th style="padding-right: 10px">category_id</th>
		<th style="padding-right: 10px">post_content</th>
		<th>timestamp</th>
	</tr>
	<?php
	foreach ($model as $post) 
	{
		echo 
		"<tr>
			<td>$post->category_id</td> 
			<td>$post->post_content</td>
			<td>$post->timestamp</td>
			<td> | <a href = '/post/delete/$post->post_id'>Delete</a></td>
			<td><button onclick='myFunction($post->post_id)''>Delete</button></td>
		</tr>";
	}
	?>
</table>
</body>
</html>
<script>
function myFunction(post_id) {
  if(confirm("Are you sure you want to delete his post?"))
  {
  	location.href='/Post/delete/'+ post_id;
  }
}
</script>