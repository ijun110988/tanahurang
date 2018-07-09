<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application - READ Operation</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
	<h2>Read Operation in CRUD applicaiton</h2>
		<table class="table "> 
		<thead> 
			<tr> 
				<th>#</th> 
				<th>Full Name</th> 
				<th>E-Mail</th> 
				<th>Age</th> 
				<th>Gender</th> 
				<th>Extras</th>
			</tr> 
		</thead> 
		<tbody> 
			<tr> 
				<th scope="row">1</th> 
				<td>Vivek Vengala</td> 
				<td>vivek@pixelw3.com</td> 
				<td>Male</td> 
				<td>28</td> 
				<td>
					<a href="update.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
					<a href="delete.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr> 
		</tbody> 
		</table>
	</div>
</div>
</body>
</html>