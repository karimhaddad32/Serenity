<html>
<head>
	<title>My Profile</title>

</head>
<body>

<?php $this->view('/Shared/top_nav_bar_main')?>
<div class="container" style="display: grid; grid-template-columns: auto;">
	
	<div style="display: grid;">

		<form  action="/Profile/search_friends" method="post" class="form-horizontal">		
				<div style="display: inline-flex; float: right; margin: 15px">
			  		<input name="username"  style="margin: 5px;" type="text" placeholder="Search" class="form-control sm" />
			  		<button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
			  	</div>
		</form>	
		<h1 style="text-align: center">Profiles</h1>
	</div>
	<div>
		
		<table>
	<tr>
		<th>Name</th>
		<th>Username</th>
		<th>Gender</th>
		<th>Phone Number</th>
	</tr>

<?php

foreach ($model->other_profiles as $profile) {
	echo "<tr>
		<td>$profile->first_name $profile->last_name</td>
		<td>$profile->username</td>
		<td>$profile->gender</td>
		<td>$profile->phone_number</td>
		<td>
			<a href='/profile/add/$profile->profile_id'>Add</a>
			<a href='/profile/subscribe/$profile->profile_id'>Subscribe</a>
		</td>
	</tr>";
}

?>

</table>



	</div>
	
</div>



</body>
</html>