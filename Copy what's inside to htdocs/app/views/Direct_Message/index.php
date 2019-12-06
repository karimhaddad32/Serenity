<html>

<head>

	<title>Messages</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
	<a href="/profile/index">Back to profile</a>

	<div class="container">
	<h1 style="text-align: center">Messages</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<div class="container" style="display: grid; grid-template-columns: auto;">
<table class="table table-striped">
	<tr>
		<th>Profile Picture</th>
		<th>Friend Name</th>

		<th>Message</th>
	</tr>

<?php

foreach ($model as $friend_link) {
		
	echo "<tr>
		<td><img class='img-circle' style='max-width:100px; max-height:100px; min-width:100px; min-height:100px' src='/$friend_link->picture_path'></td>
		<td>$friend_link->friend_name</td>

		<td>
			<a href='/Direct_Message/message/$friend_link->friend_id'>Send a Message</a>
		</td>
	</tr>";
}

?>

</table>
</div>
</body>
</html>	