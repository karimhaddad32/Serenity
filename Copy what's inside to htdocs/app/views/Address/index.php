<html>

<head>
	<title>Addresses</title>
</head>
<body>
<?php $this->view('/Shared/top_nav_bar_main'); ?>

	<a href="/address/create">Add an address</a> | 
	<a href="/profile/index">Back to profile</a>

	<div class="container">
	<h1 style="text-align: center">Address List</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<table class="table table-striped">
	<tr>
		
		<th>Address</th>
		<th>City</th>
		<th>Province</th>
		<th>Postal Code</th>
		<th>Country</th>
		<th>Description</th>
		<th>Controls</th>
	</tr>

<?php

foreach ($model as $address) {
	echo "<tr>
	
		<td>$address->street_address</td>
		<td>$address->city</td>
		<td>$address->province</td>
		<td>$address->postal_code</td>
		<td>$address->country_name</td>
		<td>$address->description</td>

		<td>
			<a href='/address/delete/$address->address_id'>Delete</a> |
			<a href='/address/edit/$address->address_id'>Edit</a>
		</td>
	</tr>";
}

?>

</table>
</body>
</html>	