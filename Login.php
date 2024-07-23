<?php
session_start();
if(isset($_SESSION['uid']))
{
	header("Location: user.php");
}


 
include("dbconnect.php");
if(isset($_POST["login_btn"]))
{
	$eid = $_POST["email"];
	$pwd = $_POST["password"];

	if($eid == "admin" && $pwd == "admin")	
	{
		header("Location: admin.php");
		
	}	

	$qry = "SELECT * FROM `register` WHERE email = '$eid' AND password = '$pwd'";
	$result = mysqli_query($connect, $qry); 
	$row = mysqli_num_rows($result);
	if($row > 0)
	{
		$data = mysqli_fetch_assoc($result);
		session_start();
		$SESSION["uid"] = $data["id"];
		$_SESSION['email'] = $eid;
		header("Location:user.php");
	}
	else
	{
		echo "Invalid Email or Password";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<div class="container" method="post">
		<div class="row">
			<div class="col-md-5 mx-auto">
				<div class="card">
					<div class="card-header bg-secondary text-light ">
						Login Form
				</div>
				<div class="card-body" >
					<form method="post">
					<div class="form-group">
						<label>email</label>
						<input type="text" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>password </label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-secondary" type="submit" name="login_btn">Login</button>
					</div>
					<p>Don't have an Account?<a href="Register.php"> Sign Up</a></p>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> 