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

	<a href="/Chat_Room/index">Back to Chat Rooms</a>

	<div class="container">
	<h1 style="text-align: center">Chat Messages</h1>
</div>

<div class="container">
	<form method='post'>
		<input type='text' name='message' />
		<input type='submit' name='action' value='Send' />
	</form>
</div>

<table>
	<tr>
		<th>chat_room_message_id</th>
		<th>chat_room_id</th>
		<th>sender_id</th>
		<th>message</th>
		<th>timestamp</th>
	</tr>

<?php

foreach ($model as $Chat_Room) {
	echo "<tr>
		<td>$Chat_Room->chat_room_message_id</td>
		<td>$Chat_Room->chat_room_id</td>
		<td>$Chat_Room->sender_id</td>
		<td>$Chat_Room->message</td>
		<td>$Chat_Room->timestamp</td>
	</tr>";
}

?>

</table>
</body>
</html>	