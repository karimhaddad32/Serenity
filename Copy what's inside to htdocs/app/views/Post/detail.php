<head>

	<title>Friends Feed</title>
</head>

		<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
<div class="container">
<h1  style="text-align: center">Post Details</h1>

<?php 

 	$this->view('/Profile/post', $model ); 
 ?>
	</div>
