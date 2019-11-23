<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<title>Create Profile</title>
</head>
<body>
<div class="container">

	<h2>Create Profile</h2>
	<form action="/Profile/create" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="first_name">First Name:</label>
		<input type="text" class="form-control" name="first_name" id="first_name" />
	</div>
	<div class="form-group">
		<label for="last_name">Last Name:</label>
		<input type="text" class="form-control" name="last_name" id="last_name" />
	</div>
	<div class="form-group">
		<label for="username">User Name:</label>
		<input type="text" class="form-control" name="username" id="username" />
	</div>

	<div class="form-group">
		<label for="gender">Gender:</label>
		<input type="text" class="form-control" name="gender" id="gender" />
	</div>
	<div class="form-group">
		<label for="phone_number">Phone Number: format [ 555-555-5555 ] </label>
		<input type="tel" class="form-control" name="phone_number" id="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
	</div>
	<div class="form-group">
		<input  style="margin: 5px" type="submit" class="btn btn-primary" name="action" value="Create" />
	</div>

	<?php if(isset($model['error']))
			echo "<div class='alert alert-danger' role='alert'>$model[error]</div>";
	?>
	</form>
</div>
</body></html>