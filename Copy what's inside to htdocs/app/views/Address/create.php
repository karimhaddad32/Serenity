<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Address</title>
</head>
<body>
<div class="container">
	<h1 style="color: #326496">Add an address</h1>
	<form method='post'>
		<label>Description<input type='text' name='description' /></label><br>
		<label>Street address<input type='text' name='street_address' /></label><br>
		<label>City<input type='text' name='city' /></label><br>
		<label>Province<input type='text' name='province' /></label><br>
		<label>Postal code<input type='text' name='postal_code' /></label><br>
		<label>Country<input type='number' name='country_id' /></label><br>
		<input type='submit' name='action' value='Create' />
		<a href="/address/index">Cancel</a>
	</form>
</div>
</body>
</html>