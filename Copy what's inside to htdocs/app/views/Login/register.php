<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<title>Login</title>
</head>
<body>
<div class="container">

	
	<h1>Log in</h1>
	<?php if(isset($model['error']))
			echo "<div class='alert alert-danger' role='alert'>$model[error]</div>";
	?>
	<form action="/Login/register" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="username">UserName:</label>
		<input type="text" class="form-control" name="username" id="username" />
	</div>
	<div class="form-group">
		<label for="emai_address">Email Address:</label>
		<input type="Email" class="form-control" name="email_address" id="email_address" />
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" class="form-control" name="password" id="password" />
	</div>
	<div class="form-group">
		<label for="password">Confirm Password:</label>
		<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
	</div>
	<div class="form-group">
		<input type="submit" name="action" value="Login" />
	</div>
	</form>
</div>
</body></html>