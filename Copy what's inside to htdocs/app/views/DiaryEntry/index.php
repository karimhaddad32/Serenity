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
	<title>Diaries</title>
</head>
<body>

	<a href="/diary/create">Create a new Diary</a> | 
	<a href="/profile/index">Back to profile</a>

	<div class="container">
	<h1 style="text-align: center">Diaries</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<table>
	<tr>
		<th>diary_id</th>
		<th>profile_id</th>
		<th>last_modified</th>
		<th>created_in</th>
		<th>diary_title</th>
		<th>category_id</th>
	</tr>

<?php

foreach ($model as $diary) {
	echo "<tr>
		<td>$diary->diary_id</td>
		<td>$diary->profile_id</td>
		<td>$diary->last_modified</td>
		<td>$diary->created_in</td>
		<td>$diary->diary_title</td>
		<td>$diary->category_id</td>

		<td>
			<a href='/diary/view/$diary->diary_id'>View</a> |
			<a href='/diary/edit/$diary->diary_id'>Edit</a> |
			<a href='/diary/delete/$diary->diary_id'>Delete</a>
		</td>
	</tr>";
}

?>

</table>
</body>
</html>	