<html>

<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/bootstrap.js"></script>
	<title>Addresses</title>
</head>
<body>
<a href="/address/create">Add an address</a>

<table>
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

foreach($model as $address) {
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