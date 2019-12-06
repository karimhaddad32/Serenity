<html>

<head>
	<title>Diaries</title>
</head>
<body>
<?php $this->view('/Shared/top_nav_bar_main'); ?>
	<a href="/diary/create">Create a new Diary</a> | 
	<a href="/profile/index">Back to profile</a>

	<div class="container" style="text-align:center;">
	<h1 style="text-align: center">Diaries</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->

<?php

foreach ($model as $diary) {
	echo "<div style=margin-top:5%>$diary->diary_title</div>
		<div>$diary->category_type</div>
		<div style=margin-top:1%>Last modified: $diary->last_modified</div>
		<a href='/diary/entries/$diary->diary_id'>View Entries</a> 
			<a href='/diary/edit/$diary->diary_id'>Edit</a> 
			<a href='/diary/delete/$diary->diary_id'>Delete</a>";
}

?>

</div>
</body>
</html>	