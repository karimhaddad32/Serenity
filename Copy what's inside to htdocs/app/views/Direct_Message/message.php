<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
		<style>
		td, th {
			/*border: 1px solid black;*/
			padding: 10px;
			margin-top: 3px;
		}
	</style>
	<title>Messages</title>
</head>
<body>

	<a href="/direct_message/index">Back to Messages</a>

	<div class="container">
	<h1 style="text-align: center">Chat</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<div class="container" style="display: grid; grid-template-columns: auto;">
<div class="container">
	<form method='post'>
		<input type='text' name='message' />
		<input type='submit' name='action' value='Send' />
	</form>
</div>

<table style="border: 1px solid black; background-color:#bfe2ff;">
	<tr>
		<th style="text-align: center">Chat</th><!-- 
		<th>receiver</th>
		<th>message text</th>
		<th>time</th> -->
	</tr>

<?php

foreach ($model as $direct_message) {
	// echo "<pre>";
	// 	var_dump($direct_message);
	// echo "</pre>";

	if ($direct_message->sender_id == $_SESSION['user_id']) {
		echo "<tr>
				<td style=float:right;color:FFFFFF;background-color:#0000FF;>$direct_message->message_content</td>";
	} else {
		echo "<tr>
		<td style=float:left;background-color:#CCCCCC>$direct_message->message_content</td>";
	}

	echo "</tr>";
}

?>

</table>
</div>
</body>
</html>	