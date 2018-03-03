<?php
	session_start();
	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin']==false) {
		header('Location: http://cs.neiu.edu/~fsef17g6/Lab_John/reservationlanding.php');
	}
?>

<?php
	include ('header.php');
?>



<div class="container" style=" border: 1px double black;">	
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<a href="index.php"> home </a> > reservations and packages
			</div>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-6" align="center">	
			<h3><a href ="project2temp_res.php">Reservations</a></h3>
			<a href="project2temp_res.php">
				<img src="images/mountainviewroom.jpg" width="450px" alt= "picture of room with mountain view" style="padding: 0px 7px;"/>
			</a>
		</div>
		
		<div class="col-md-6" align="center">
			<h3><a href="project2temp_packages.php"> Spa Packages </a></h3>	 
			<a href="project2temp_packages.php">
				<img src="images/bathtreatment.jpg" width="450px" alt= "picture of bamboo and lotus flower" style="padding: 0px 6px;"/>
			</a> 
		</div>
	</div> 
	<br/>
	<br/>
</div>



<?php
	include ('footer.html');
?>
