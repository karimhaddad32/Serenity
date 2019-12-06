<html>
<head>

	<title>Address</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); ?>

<div class="container">
	<h1 style="color: #326496">Add an address</h1>
	<form method='post' class="form-horizontal">
		<label>Description
			<input type='text' name='description' class="form-control" />
		</label><br>
		<label>Street address
			<input type='text' name='street_address' class="form-control" />
		</label><br>
		<label>City
			<input type='text' name='city' class="form-control" />
		</label><br>
		<label>Province
			<input type='text' name='province' class="form-control" />
		</label><br>
		<label>Postal code
			<input type='text' name='postal_code' class="form-control" />
		</label><br>
		<label>Country
			
			<select name="country_id" style="background-color: #D8BFD8; font-weight: bold" class="form-control" >
			<?php
				foreach ($model as $country) 
				{
					echo "<option value='$country->country_id'>$country->country_name</option>";
				}
			?>
		</select>
		</label><br>
		<input type='submit' name='action' value='Create'  class="btn btn-success" />
		<a href="/address/index" class="btn btn-danger" >Cancel</a>
	</form>
</div>
</body>
</html>