<html>

<head>

		<style>
		td, th {
			border: 1px solid black;
			padding: 10px;
		}
	</style>
	<title>Chat Rooms</title>
</head>
<body>
<?php $this->view('/Shared/top_nav_bar_main'); ?>

	<a href="/Chat_Room/create">Create a Chat Room</a> | 
	<a href="/profile/index">Back to profile</a>

	<div class="container">
	<h1 style="text-align: center">Chat Rooms</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<table>
	<tr>
		<th>chat_room_id</th>
		<th>category_id</th>
		<th>owner_id</th>
		<th>room_title</th>
		<th>maximum_space</th>
		<th>timestamp</th>
	</tr>

<?php

foreach ($model as $Chat_Room) {
	echo "<tr>
		<td>$Chat_Room->chat_room_id</td>
		<td>$Chat_Room->category_id</td>
		<td>$Chat_Room->owner_id</td>
		<td>$Chat_Room->room_title</td>
		<td>$Chat_Room->maximum_space</td>
		<td>$Chat_Room->timestamp</td>

		<td>
			<a href='/Chat_Room/chat/$Chat_Room->chat_room_id'>Enter</a>
		</td>
	</tr>";
}

?>

</table>
</body>
</html>	