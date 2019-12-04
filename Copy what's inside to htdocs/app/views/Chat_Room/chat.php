<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
		<style>
		td, th {
			/*border: 1px solid black;*/
			padding: 10px;
		}
	</style>
	<title>Chat Rooms</title>
</head>
<body>

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

<div class="container" style="display: grid; grid-template-columns: auto;">
<table class="table" style="table-layout: fixed;">
	<tr>
<!-- 		<th>chat_room_message_id</th>
		<th>chat_room_id</th>
		<th>sender_id</th> -->
		<th colspan="2" style="text-align: center">Chat</th>
<!-- 		<th>timestamp</th> -->
	</tr>

<?php

foreach ($model as $Chat_Room) {
	echo "<tr>
		<td style=word-break:break-all;>$Chat_Room->sender_id: $Chat_Room->message</td>
		<td style=text-align:right>$Chat_Room->timestamp</td>
	</tr>";
}

?>

</table>
</div>
</body>
</html>	