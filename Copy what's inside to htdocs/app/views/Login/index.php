<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<title>Login</title>
</head>
<body>
<div class="container">

	
	<h1 style="color: purple; text-align: center">Welcome to Serenity!</h1>
	<form action="/Login/index" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="username">Username:</label>
		<input type="text" class="form-control" name="username" id="username" />
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" class="form-control" name="password" id="password" />
	</div>
	<?php if(isset($model['error']))
			echo "<div class='alert alert-danger' role='alert'>$model[error]</div>";
	?>
	<div class="form-group">
		<input type="submit" name="action" value="Login" class="btn btn-success"/>
	</div>
	
	Don't have an account? <a href= '/Login/register' class="btn btn-primary">Register</a>
	</form>
</div>
</body></html>