<?php
include("dbconnect.php");
session_start();
if(isset($_SESSION["uid"]))
{
	header("Location: Login.php");
}


$qry = "SELECT * FROM `notice` order by id desc limit 5 ";
$result = mysqli_query($connect, $qry);
$row = mysqli_num_rows($result);



  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<style>
		.card-body {
			padding-left: 0;
		}
		ul li {
			line-height: 40px;
			font-size: 24px;
		}
	</style>
</head>
<body>
<h2>Welcome  User </h2>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header bg-dark text-light"> Notice </div>
				<div class="card-body">
					<ul>
						
						<?php
						if($row>0)
						{
								while($data =
								mysqli_fetch_assoc($result))
								{ ?>
									<marquee direction="left" behavior="scroll" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start();"> <li> <?php echo $data["notice"]; ?> </li></marquee>
								<?php }
								}



						else
						{  ?>
								<li> No Notice Found</li>
						<?php } ?>
						</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<a href="Logout.php"> Logout </a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>