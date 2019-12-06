<html>
<head>

	<title>Edit address</title>
</head>
<body>
	<?php $this->view('/Shared/top_nav_bar_main'); ?>
<div class='container'>
	<h1 style='color: #326496'>Edit an address</h1>
	<form method='post' class='form-horizontal'>
		<label>Description
			<?php echo "<input type='text' name='description' class='form-control' value='$model->description' />"; ?>
		</label><br>
		<label>Street address
			<?php echo "<input type='text' name='street_address' class='form-control' value='$model->street_address'/>"?>
		</label><br>
		<label>City
			<input type='text' name='city' class='form-control' value='<?php echo "$model->city";?>'/>
		</label><br>
		<label>Province
			<input type='text' name='province' class='form-control' value='<?php echo "$model->province";?>'/>
		</label><br>
		<label>Postal code
			<input type='text' name='postal_code' class='form-control' value='<?php echo "$model->postal_code";?>'/>
		</label><br>
		<label>Country: <?php echo "$model->country_name"  ?>
			
			<select name='country_id' style='background-color: #D8BFD8; font-weight: bold' class='form-control' value='' >
			<?php
				foreach ($model->countries as $country) 
				{
					echo "<option salue='$country->country_id'>$country->country_name</option>";
				}
			?>
		</select>
		</label><br>
		<input type='submit' name='action' value='Update' class="btn btn-primary" />
		<a href='/address/index' class="btn btn-danger">Cancel</a>
	</form>
</div>
</body>
</html>