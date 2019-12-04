<html>

<head>
	
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
<?php $this->view('/Shared/top_nav_bar_main'); ?>

	<a href="/profile/index">Back to profile</a>

	<div class="container">
	<h1 style="text-align: center">Messages</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<table>
	<tr>
		<th>sender_id</th>
		<th>receiver_id</th>
		<th>accepted</th>
		<th>timestamp</th>
		<th>relationship</th>
	</tr>

<?php

foreach ($model as $friend_link) {
	$urlParam;
	if ($friend_link->sender_id == $_SESSION['user_id'])
	{
		//var_dump('sender');
		$urlParam = $friend_link->receiver_id;
	}
	else if ($friend_link->receiver_id == $_SESSION['user_id'])
	{
		//var_dump('receiver');
		$urlParam = $friend_link->sender_id;
	}
	echo "<tr>
		<td>$friend_link->sender_id</td>
		<td>$friend_link->receiver_id</td>
		<td>$friend_link->accepted</td>
		<td>$friend_link->timestamp</td>
		<td>$friend_link->relationship</td>

		<td>
			<a href='/Direct_Message/message/$urlParam'>Message</a>
		</td>
	</tr>";
}

?>

</table>
</body>
</html>	