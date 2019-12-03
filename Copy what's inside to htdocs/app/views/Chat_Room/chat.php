<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
		<style>
		td, th {
			border: 1px solid black;
			padding: 10px;
		}
	</style>
	<title>Chat Rooms</title>
</head>
<body>

	<a href="/Chat_Room/create">Create a Chat Room</a> | 
	<a href="/profile/index">Back to profile</a>

	<div class="container">
	<h1 style="text-align: center">Chat</h1>
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