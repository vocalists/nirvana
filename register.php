<?php # Script 9.3 - register.php
	$page_title = 'Register';
	include ('header.php');
	
	
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="alert alert-warning alert-dismissable fade in"> 
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php
					if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
						
						$errors = array( );
						
						if (empty($_POST['first_name'])) {
							$errors[ ] = 'You forgot to enter your first name.';
						}
						
						else {
							$fn = trim($_POST['first_name']);
						}
						
						if (empty($_POST['last_name'])) {
							$errors[ ] = 'You forgot to enter your last name.';
							} else {
							$ln = trim($_POST['last_name']);
						}
						
						if (empty($_POST['email'])) {
							$errors[ ] = 'You forgot to enter your email address.';
							} else {
							$e = trim($_POST['email']);
						}
						
						if (!empty($_POST['pass1'])) {
							if ($_POST['pass1'] != $_POST['pass2']) {
								$errors[ ] = 'Your password did not match the confirmed password.';
								} else {
								$p = trim($_POST['pass1']);
							}
						}
						else {
							$errors[ ] = 'You forgot to enter your password.';
						}
						
						if (empty($errors)) {
							
							require ('./mysqli_connect.php');
							
							$q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES
							('$fn', '$ln', '$e', SHA1('$p'), NOW( ) )";
							
							$r = @mysqli_query ($dbc, $q);
							
							if ($r) {
								// Print a message:
								header('Location: http://cs.neiu.edu/~fsef17g6/Lab_John/registrationsuccess.php');
								
								} else { // If it did not run OK.
								
								// Public message:
								echo '<h1>System Error</h1>
								<p class="error">You could not be registered due to a system error. We apologize for
								any inconvenience.</p>';
								
								// Debugging message:
								echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
								
							} // End of if ($r) IF.
							
							mysqli_close($dbc); // Close the database connection.
							
							// Include the footer and quit the script:
							
							exit( );
							
							
							
						} // End of if (empty($errors)) IF.\
						else { // Report the errors.
							
							echo '<h1>Error!</h1>
							<p class="error">The following error(s) occurred:<br />';
							foreach ($errors as $msg) { // Print each error.
								echo " - $msg<br />\n";
							}
							echo '</p><p>Please try again.</p><p><br /></p>';
							
						} 
						mysqli_close($dbc);
					}// End of the main Submit conditional. 
					
				?>	
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-primary">						
				<div class="panel-heading"><h1>Register</h1>
					<div class="panel-body">
						<form action="register.php" method="post">
							<p>First Name: <input placeholder="name"  class="form-control" type="text" name="first_name" size="15" maxlength="20" value="<?php if
							(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
							<p>Last Name: <input placeholder="last name"  class="form-control" type="text" name="last_name" size="15" maxlength="40" value="<?php if
							(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
							<p>Email Address: <input placeholder="123@yahoo.com" class="form-control" type="text" name="email" size="20" maxlength="60" value="<?php if
							(isset($_POST['email'])) echo $_POST['email']; ?>" /> </p>
							<p>Password: <input placeholder="password"  class="form-control" type="password" name="pass1" size="10" maxlength="20" value="<?php if
							(isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></p>
							<p>Confirm Password: <input placeholder="re-enter password"  class="form-control" type="password" name="pass2" size="10" maxlength="20"
							value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></p>
							<br/><p><input  class="form-control" type="submit" name="submit" value="Register" /></p>
						</form>
					</div>
				</div>
			</div>
		</div>				
	</div>
</div>




<?php include ('footer.html'); ?>		
