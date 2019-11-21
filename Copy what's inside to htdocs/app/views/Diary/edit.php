<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Edit diary</title>
</head>
<body>
<div class="container">
	<h1 style="color: #326496">Edit diary</h1>
	<form method='post'>
		<label>New title: <input type='text' name='diary_title' value=<?php echo $model->diary_title; ?> /></label><br>
		<label>New category: <input type='text' name='category_id' value=<?php echo $model->category_id; ?> /></label><br>
		<input type='submit' name='action' value='Update' />
		<a href="/diary/index">Cancel</a>
	</form>
</div>
</body>
</html>