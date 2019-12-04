<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<style>
		td, th {
			border: 1px solid black;
			padding: 10px;
		}
	</style>
	<title>Addresses</title>
</head>
<body>

	<a href="/address/create">Add an address</a> | 
	<a href="/profile/index">Back to profile</a>

	<div class="container">
	<h1 style="text-align: center">Address List</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<table class="table table-striped">
	<tr>
		<th>address_id</th>
		<th>profile_id</th>
		<th>description</th>
		<th>street_address</th>
		<th>city</th>
		<th>province</th>
		<th>postal_code</th>
		<th>country_id</th>
	</tr>

<?php

foreach ($model as $address) {
	echo "<tr>
		<td>$address->address_id</td>
		<td>$address->profile_id</td>
		<td>$address->description</td>
		<td>$address->street_address</td>
		<td>$address->city</td>
		<td>$address->province</td>
		<td>$address->postal_code</td>
		<td>$address->country_id</td>

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