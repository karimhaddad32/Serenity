<html>
<head>

	<title>Address</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); ?>

<div class="container">
	<h1>Delete this address?</h1>
	<form method='post' class='form-horizontal'>
		<label  class='form-control'>Description: <?php echo $model->description; ?></label><br>
		<label class='form-control'>Street: <?php echo $model->street_address; ?></label><br>
		<label class='form-control'>City: <?php echo $model->city; ?></label><br>
		<label class='form-control'>Province: <?php echo $model->province; ?></label><br>
		<label class='form-control'>Postal code: <?php echo $model->postal_code; ?></label><br>
		<label class='form-control'>Country: <?php echo $model->country_name; ?></label><br>
		<input type='submit' name='action' value='Delete' class="btn btn-danger" />
		<a href="/address/index" class="btn btn-primary">Cancel</a>
	</form>
</div>
</body>
</html>