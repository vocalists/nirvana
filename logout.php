<?php # Script 12.11 - logout.php #2
	// This page lets the user logout.
	// This version uses sessions.
	
	session_start( ); // Access theexisting session.
	
	// If no session variable exists,redirect the user:
	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin']==false) {
		// Need the functions:
		require ('login_functions.inc.php');
		redirect_user( );
		
		} else { // Cancel the session:
		
		$_SESSION = array( ); // Clear the	variables.
		session_destroy( ); // Destroy the	session itself.
		setcookie ('PHPSESSID', '', time( )-3600,	'/', '', 0, 0); // Destroy the cookie.
		
	}
?>


<?php
	
	include ('header.php');
?>

<div class="container"  style="margin-top: 80px; margin-bottom: 150px; width: 50%;">
	<div class="row">
		<div class= "col-xs-12" align="center">	
			<div class="alert alert-success alert-dismissable fade in"> 
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<p><strong>Logged Out!</strong> You are now logged out!</p>	
			</div>		
		</div>
	</div>
</div>



<?php
	include ('footer.html');
?>					