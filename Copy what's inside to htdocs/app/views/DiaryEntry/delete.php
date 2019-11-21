<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Address</title>
</head>
<body>
<div class="container">
	<h1>Delete this diary?</h1>
	<form method='post'>
		<label>Diary Name: </label><?php echo $model->diary_title; ?><br>
		<label>Category: </label><?php echo $model->category_id; ?><br>
		<input type='submit' name='action' value='Delete' />
		<a href="/diary/index">Cancel</a>
	</form>
</div>
</body>
</html>