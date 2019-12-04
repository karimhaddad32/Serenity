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
	<title>Messages</title>
</head>
<body>

	<a href="/direct_message/index">Back to Messages</a>

	<div class="container">
	<h1 style="text-align: center">Messages</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<div class="container">
	<form method='post'>
		<input type='text' name='message' />
		<input type='submit' name='action' value='Send' />
	</form>
</div>

<div>
<table>
	<tr>
		<th>sender</th>
		<th>receiver</th>
		<th>message text</th>
		<th>time</th>
	</tr>

<?php

foreach ($model as $direct_message) {
	// echo "<pre>";
	// 	var_dump($direct_message);
	// echo "</pre>";

	if ($direct_message->sender_id == $_SESSION['user_id']) {
		echo "<tr style=color:FFFFFF;background-color:#0000FF>";
	} else {
		echo "<tr style=background-color:#CCCCCC>";
	}

	echo "<td>$direct_message->sender_id</td>
		<td>$direct_message->receiver_id</td>
		<td>$direct_message->message_content</td>
		<td>$direct_message->timestamp</td>
	</tr>";
}

?>

</table>
</div>
</body>
</html>	