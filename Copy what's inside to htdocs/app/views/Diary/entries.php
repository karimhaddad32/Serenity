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

	<?php echo "<a href=/diary/entry_create/$model->diary_id>Create a new Diary Entry</a> |"; ?>
	<?php echo "<a href=/diary/index/$model->diary_id>Back to Diaries</a>"; ?>

	<div class="container">
	<h1 style="text-align: center">Diary Entries</h1>
</div>

<table>
	<tr>
		<th>diary_entry_id</th>
		<th>diary_id</th>
		<th>entry_title</th>
		<th>entry</th>
		<th>timestamp</th>
	</tr>

<?php

foreach ($model->DiaryEntries as $diary_entry) {
	echo "<pre>";
	var_dump($diary_entry);
	echo "</pre>";
	// echo "<tr>
	// 	<td>$diary_entry->diary_entry_id</td>
	// 	<td>$diary_entry->diary_id</td>
	// 	<td>$diary_entry->entry_title</td>
	// 	<td>$diary_entry->entry</td>
	// 	<td>$diary_entry->timestamp</td>

	// 	<td>
	// 		<a href='/diary_entry/edit/$diary_entry->diary_id'>Edit</a> |
	// 		<a href='/diary_entry/delete/$diary_entry->diary_id'>Delete</a>
	// 	</td>
	// </tr>";
}

?>

</table>
</body>
</html>	