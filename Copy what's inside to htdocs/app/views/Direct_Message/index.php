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

	<a href="/profile/index">Back to profile</a>

	<div class="container">
	<h1 style="text-align: center">Messages</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<table>
	<tr>
		<th>message_id</th>
		<th>sender_id</th>
		<th>receiver_id</th>
		<th>message_content</th>
		<th>timestamp</th>
	</tr>

<?php

foreach ($model as $direct_message) {
	echo "<tr>
		<td>$direct_message->message_id</td>
		<td>$direct_message->sender_id</td>
		<td>$direct_message->receiver_id</td>
		<td>$direct_message->message_content</td>
		<td>$direct_message->timestamp</td>

		<td>
			<a href='/direct_message/view/$direct_message->message_id'>View</a> |
			<a href='/direct_message/edit/$direct_message->message_id'>Edit</a> |
			<a href='/direct_message/delete/$direct_message->message_id'>Delete</a>
		</td>
	</tr>";
}

?>

</table>
</body>
</html>	