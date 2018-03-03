<?php # Script 12.2 - login_functions.	inc.php
	// This page defines two functions used	by the login/logout process.
	
	/* This function determines an absolute
		URL and redirects the user there.
		5 * The function takes one argument: the
		page to be redirected to.
		6 * The argument defaults to index.php.
	*/
	function redirect_user ($page = 'http://cs.neiu.edu/~fsef17g6/Lab_John/header.php') {
		
		
		// Redirect the user:
		header("Location: $page");
		exit( ); // Quit the script.
		
	} // End of redirect_user( ) function.
	
	function check_login($dbc, $email = '',$pass = '') {
		
		$errors = array( ); // Initializ
		// Validate the email address:
		if (empty($email)) {
			$errors[ ] = 'You forgot to enter
			your email address.';
			} else {
			$e = mysqli_real_escape_string($dbc, trim($email));
		}
		
		// Validate the password:
		if (empty($pass)) {
			$errors[ ] = 'You forgot to enter
			your password.';
			} else {	
			$p = mysqli_real_escape_string($dbc, trim($pass));
		}
		
		if (empty($errors)) {
			if($e == 'admin'){
				$q = "SELECT username
				FROM admin WHERE username='$e' AND
				password='$p'";
				$r = @mysqli_query ($dbc, $q);
				// Run the query.
				
				// Check the result:
				if (mysqli_num_rows($r) == 1) {
					
					// Fetch the record:
					$row = mysqli_fetch_array ($r,MYSQLI_ASSOC);
					
					// Return true and the record:
					return array(true, $row);
					
					} else { 
					$errors[ ] = 'The email address
					and password entered do not
					match those on file.';
				}
				
				
			}
			else{
				$q = "SELECT first_name
				FROM users WHERE email='$e' AND
				pass=SHA1('$p')";
				$r = @mysqli_query ($dbc, $q);
				// Run the query.
				
				// Check the result:
				if (mysqli_num_rows($r) == 1) {
					
					// Fetch the record:
					$row = mysqli_fetch_array ($r,MYSQLI_ASSOC);
					
					// Return true and the record:
					return array(true, $row);
					
					} else { 
					$errors[ ] = 'The email address
					and password entered do not
					match those on file.';
				}
			}
			
		}
		
		// Return false and the errors:
		return array(false, $errors);
		
	} // End of check_login( ) function.												