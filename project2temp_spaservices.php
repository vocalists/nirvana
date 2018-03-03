<?php
	session_start();
?>

<?php
	include ('header.php');
?>


<div class="container" style="border: 1px double black;">
	<div class="row">
		<div class="col-xs-12">
			<div class="breadcrumbs">
				<a href="index.html"> home </a> > spa services
			</div>
		</div>
	</div>
	<div class="row" align="center">
		<br/>
		<div class="col-md-4">
			<a href="project2temp_massages.php"> Massages </a><br/>
			<a href ="project2temp_massages.php"><img src="images/massages.jpg" alt="rolled up white towel next to a candle on bamboo table" style="border:0;" width="310" height="181"/></a>
		</div>
		
		<div class="col-md-4">
			<a href ="project2temp_bathtreatments.php"> Bath Treatments </a> <br/>
			<a href ="project2temp_bathtreatments.php"><img src="images/bathtreatment.jpg" alt="picture of a hollow bamboo stick with water pouring into a clear pond" style ="border:0;" width="310" height="181"/></a>
			
		</div>
		
		<div class="col-md-4">
			<a href ="project2temp_facials.php"> Facials </a><br/>
			<a href ="project2temp_facials.php"><img src="images/bathfacial.jpg" alt="lady laying with cucumbers on eyes" style="border:0;" width="315" height="181"/></a>
		</div>
		
		
		
	</div>
	<br/>
</div>



<?php
	include ('footer.html');
?>
