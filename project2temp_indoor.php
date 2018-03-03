
<?php
	session_start();
?>

<?php
	include ('header.php');
?>

<div class="container" style="border: 1px double black;" >
	<div class="row">
		<div class="col-xs-12">
			<div class= "breadcrumbs">
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"> home </a><a href="project2temp_activity.php"> 
				> attractions &amp; activities</a> > indoor&nbsp;&nbsp;
			</div>
			
			
			<div style="padding:10px;">
				
				<h2 style="text-align:center;"> Indoor activities  </h2>
				
				<div style="padding-left:20px; padding-right:20px; text-align:justify;">
					<p> At Nirvana Spa and Resort, we provide a variety of fun physical ﬁtness classes for all levels.  
						We encourage our guests to focus on healthful activities to balance the mind and body, as well as 
						socially connect with other like minded individuals. We offer yoga, Pilates, dance and weight training 
						classes, facilitated by our staff of professional personal trainers.  We also offer nutrition and 
						cooking classes by our expert nutritionist instructors for those who want to learn how to incorporate 
					clean, healthy eating and cooking practices in their daily life.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row" align="center">
		<div class="col-xs-4">
			<h4>Yoga practice</h4>
			<img src="images/yoga.jpg" height="180px"  alt= "yoga practice"/>
		</div>
		<div class="col-xs-4">
			<h4>Pilates</h4>
		    <img src="images/pilates.jpg" height="180px" alt= " pilates activities "/>
		</div>
		<div class="col-xs-4">
			<h4>Dance Classes</h4>
			<img src="images/dance.jpg" height="180px" alt= " dancing skills"/>
		</div>
	</div>
	<br/>
	<div class="row" align="center">
		<div class="col-xs-6">
			<h4>Weight Lifting</h4>
			<img src="images/weights.jpg" height="180px" alt= " weight lifting"/>
		</div>
		<div class="col-xs-6">
			<h4>Cooking Classes</h4>
		<img src="images/cooking.jpg" height="180px" alt= " weight lifting"/></p>
	</div>
	<br/>
</div>





<?php
	include ('footer.html');
?>


