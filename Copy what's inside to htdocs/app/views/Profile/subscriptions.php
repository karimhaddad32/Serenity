
<head>

	<title>Subscription Feed</title>
</head>

		<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
		
	<h1  style="text-align: center">Subscription Feed</h1>

	</div>

	<div style="display: grid; grid-template-columns: 10% 80% 10%">
			<div>
			

			</div>
			<div class="container">
				
					
					<?php
					if (!isset($model->posts)) {
						echo "<p style=text-align:center;>The people you're subscribed to have not posted anything yet!</p>
							  <p style=text-align:center;><a href=/profile/search_friends>Click here</a> to get more subscriptions!</p>";
						return;
					}
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