<html>

<head>
	<title>Chat Rooms</title>
</head>
<body>
<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
	<a class="" href="/Chat_Room/create">Create a Chat Room</a> | 
	<a href="/profile/index">Back to profile</a>

	<div class="container">
	<h1 style="text-align: center">Chat Rooms</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<div class="container" style="display: grid; grid-template-columns: auto;">
<table class="table table-striped">
	<tr>
	
		<th>Category</th>
		<th>Owner</th>
		<th>Title</th>
		<th>Created on</th>
		<th>Enter Chat</th>
	</tr>

<?php

foreach ($model as $Chat_Room) {
	echo "<tr>
		<td>$Chat_Room->category_type</td>
		<td>$Chat_Room->username</td>
		<td>$Chat_Room->room_title</td>
	
		<td>$Chat_Room->timestamp</td>

		<td>
			<a href='/Chat_Room/chat/$Chat_Room->chat_room_id'>Enter</a>
		</td>
	</tr>";
}

?>

</table>
</div>
</body>
</html>	