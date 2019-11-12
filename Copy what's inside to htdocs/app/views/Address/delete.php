<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Address</title>
</head>
<body>
<div class="container">
	<h1>Delete this address?</h1>
	<form method='post'>
		<label>Description</label><?php echo $model->description; ?><br>
		<label>Street address</label><?php echo $model->street_address; ?><br>
		<label>City</label><?php echo $model->city; ?><br>
		<label>Province</label><?php echo $model->province; ?><br>
		<label>Postal code</label><?php echo $model->postal_code; ?><br>
		<label>Country</label><?php echo $model->country_id; ?><br>
		<input type='submit' name='action' value='Delete' />
		<a href="/address/index">Cancel</a>
	</form>
</div>
</body>
</html>