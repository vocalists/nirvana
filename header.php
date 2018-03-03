<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML
	1.0 Transitional//EN" "http://www.w3.org/
TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/
xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type"
		content="text/html; charset=utf-8" />
		<title>Nirvana Spa And Resort</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/finaltemp1.css"/>
	<script src="jquery-3.2.1.js"</script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		.footer-bottom {
        padding-left: 0;
        padding-right: 0;
        background-color: #6ab3ac;
        height: 100%;
        line-height: 50px;
        color: #fff;
		}
		
		input[type=text]{
		padding: 6px;
		margin-top: 8px;
		font-size: 17px;
		}
		
		.navbar-nav > li{
		margin-left:5px;
		margin-right:5px;
		}
		.navbar-nav{
		margin:0;}
		
		.jumbotron{
		height: 400px;
		margin: 0 auto;
		background-image: url("images/background.jpg");
		text-align:center;
		color:#5c5869;
		background-size: 100% 100%;
		
	</style>
</head>
<body style="background-color:#c8ebe5;">
	<div class="container">	
		<div class="row">
			<div class="col-xs-12">
			
				<nav class="navbar navbar-inverse" style="margin:0;">
					<div class="container-fluid">
						<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true): ?>
						<ul class="nav navbar-nav">	
							<li><h4 style="color:white; padding-top: 15px;" > Welcome, <?php echo $_SESSION['first_name'] ?> </h4></li>
							<?php if(isset($_SESSION['first_name']) && $_SESSION['first_name'] !='admin'): ?>
							<li><a href="./myprofile.php" role="button" class="btn navbar-btn btn-primary" name="profile" id="profile" >My Profile</a></li>
							<?php else:?>
							<li><a style="background-color: #4CAF50;" href="./admin.php" role="button" class="btn navbar-btn btn-primary" name="profile" id="profile" >Admin's Page</a></li>
							<?php endif; ?>	
						</ul>				
						<?php endif; ?>	
						<ul class="nav navbar-nav navbar-right">
							<li>	
								<form class="navbar-form" role="search">
									<form  action="./index.php" method="post">
										<div class="form-group">
											
											<div class="input-group">
												<input class="form-control" type="text" name="deleteuser" size="20" maxlength="20" placeholder="search" /> 
												<span class="input-group-btn">
													<a href="./construction.php" type="submit" role="button" class="btn navbar-btn btn-primary" name="profile" id="profile" ><i class="glyphicon glyphicon-search"></i></a>
												</span>
												
											</div>			
										</div>									
									</form>
								</form>
							</li>
							<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true): ?>
							<input type="submit" style="display: none;">
							<?php else:?>					
							<li><a href="./register.php" style="background-color: #f44336;" role="button" class="btn navbar-btn btn-danger" name="register" id="register" >Register</a></li>
							<?php endif; ?>	
							
							<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true): ?>
							<li><a href="./logout.php" role="button" class="btn navbar-btn btn-danger" name="logout" id="logout" >Log Out</a></li>
							<?php else: ?>
							<li><a href="./login.php" class="btn navbar-btn btn-primary" name="login" id="login" role="button">Log in</a></li>
							<?php endif; ?>	
						</ul>
					</div>
				</nav>
				
				<div class = "jumbotron">
				
				</div>	
				
				<nav class="navbar navbar-default">
					<div class="container-fluid">	
						<ul class="nav navbar-nav">
							<li><a href="index.php" class= "active">Home</a></li>
							<li><a href="project2temp_resort.php">Resort</a></li>
							<li><a href="project2temp_spaservices.php">Spa Services</a></li>
							<li><a href="project2temp_activity.php">Attractions &amp; Activities</a></li>
							<li><a href="project2temp_food.php">Food</a></li>
							<li><a href="project2temp_reservations.php">Reservations &amp; Packages</a></li>
							<li><a href="project2temp_contact.php">Contact</a></li>				
						</ul>				
					</div>
				</nav>
				
			</div>
		</div>
	</div>
	
	
	
