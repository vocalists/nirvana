<?php # Script 12.9 - loggedin.php #2
	// The user is redirected here fromlogin.php.
	
	session_start( ); // Start the session.
	
	// If no session value is present,redirect the user:
	
	if (!isset($_SESSION['agent']) OR  ($_SESSION['agent']) != md5($_SERVER['HTTP_USER_AGENT']) ) {
		
		// Need the functions:
		require ('login_functions.inc.php');
		redirect_user();
		
	}
?>


<?php # Script 9.3 - register.php
	
	include ('header.php');
	
	
?>

<div class="container" style="margin-top: 80px; margin-bottom: 150px; width: 50%;">
	<div class="row">
		<div class= "col-xs-12" align="center">	
			<div class="alert alert-success alert-dismissable fade in"> 
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<p><strong>Logged In!</strong> You are now logged in, <?php echo $_SESSION['first_name'] ?>!</p>
				
			</div>		
		</div>
	</div>
</div>



<?php # Script 9.3 - register.php
	
	include ('footer.html');
	
	
?>						