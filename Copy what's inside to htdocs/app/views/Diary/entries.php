<html>

<head>
	<title>Diaries</title>
</head>
<body>
<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
	<?php echo "<a href=/diary/entry_create/$model->diary_id>Create a new Diary Entry</a> |"; ?>
	<?php echo "<a href=/diary/index/$model->diary_id>Back to Diaries</a>"; ?>

	<div class="container" style="text-align:center">
	<h1 style="text-align: center">Diary Entries</h1>

<?php

foreach ($model->DiaryEntries as $diary_entry_array) {
	$diary_entry = (object) $diary_entry_array;
	// echo "<pre>";
	// 	var_dump($diary_entry);
	// echo "</pre>";

	echo "
		<div>$diary_entry->entry_title</div>
		<div>$diary_entry->entry</div>
		<div>$diary_entry->timestamp</div>

		<a href='/Diary/entry_edit/$diary_entry->diary_entry_id'>Edit</a> |
		<a href='/Diary/entry_delete/$diary_entry->diary_entry_id'>Delete</a>";
}

?>
</div>
</body>
</html>	