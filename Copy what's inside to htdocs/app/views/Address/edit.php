<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Edit address</title>
</head>
<body>
<div class="container">
	<h1 style="color: #326496">Edit an address</h1>
	<form method='post'>
		<label>Description<input type='text' name='description' value=<?php echo $model->description; ?> /></label><br>
		<label>Street address<input type='text' name='street_address' value=<?php echo $model->street_address; ?> /></label><br>
		<label>City<input type='text' name='city' value=<?php echo $model->city; ?> /></label><br>
		<label>Province<input type='text' name='province' value=<?php echo $model->province; ?> /></label><br>
		<label>Postal code<input type='text' name='postal_code' value=<?php echo $model->postal_code; ?> /></label><br>
		<label>Country<input type='number' name='country_id' value=<?php echo $model->country_id; ?> /></label><br>
		<input type='submit' name='action' value='Update' />
		<a href="/address/index">Cancel</a>
	</form>
</div>
</body>
</html>