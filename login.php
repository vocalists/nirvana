<?php # Script 12.8 - login.php #3
	// This page processes the login form
	// The script now uses sessions.
	
	// Check if the form has been submitted:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		// Need two helper files:
		require ('login_functions.inc.php');
		require ('mysqli_connect.php');
		
		// Check the login:
		list ($check, $data) = check_login($dbc,$_POST['email'], $_POST['pass']);
		
		if ($check) { // OK!
			
			// Set the session data:
			session_start( );
			$_SESSION['first_name'] = $data['first_name'];
			$_SESSION['loggedin'] = true;
			$_SESSION['agent'] =  md5($_SERVER['HTTP_USER_AGENT']);
			// Redirect:
			redirect_user('loggedin.php');
			} else { 
			$errors = $data;
			
			
			
		}
		
		mysqli_close($dbc); // Close the
		
		
	} // End of the main submit conditional.
	
	// Create the page:
	include ('login_page.inc.php');
?>