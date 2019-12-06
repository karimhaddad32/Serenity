<html>

<head>
	<title>Chat Rooms</title>
</head>
<body>
<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
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
<table class="table table-striped" style="table-layout: fixed;">
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
		<td style=word-break:break-all;><img class='circle' style='max-width:25px; max-height:25px; min-width:25px; min-height:25x' src='/$Chat_Room->path'>$Chat_Room->username: $Chat_Room->message</td>
		<td style=text-align:right>$Chat_Room->timestamp</td>
	</tr>";
}

?>

</table>
</div>
</body>
</html>	