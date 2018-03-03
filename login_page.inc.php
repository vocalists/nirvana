<?php # Script 12.1 - login_page.inc.php
	// This page prints any errors
	//associated with logging in
	// and it creates the entire login page,
	//including the form.
	
	// Include the header:
	$page_title = 'Login';
	include ('header.php');
?>

<div class="container" style="margin-top:50px;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="alert alert-warning alert-dismissable fade in"> 	
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php
					// Print any error messages, if they exist:
					if (isset($errors) && !empty($errors)) {
						echo '<h1>Error!</h1>
						<p class="error">The following
						error(s) occurred:<br />';
						foreach ($errors as $msg) {
							echo " - $msg<br />\n";
						}
						echo '<p>Please try again.</p>';
					}
					
					// Display the form:
				?>
			</div>
		</div>
	</div>
</div>
<div class="container" style="margin-bottom:50px;">
	<div class="row">
		<div class="col-sm-2">	
		</div>
		<div class="col-sm-4">	
			<div class="panel panel-primary">
				<div class="panel-heading"><h1>Login as User</h1></div>
				<div class="panel-body"><form action="login.php" method="post">
					<p>Email Address: <input type="text" class="form-control"
						name="email" size="20" maxlength="60" placeholder="email" />
					</p>
					<p>Password: <input type="password" class="form-control"
						name="pass" size="20" maxlength="20" placeholder="password" />
					</p>
					<p><input class="form-control" type="submit" name="submit" value="Login" style="display: block; margin: 0 auto;"/></p>
				</form></div>
			</div>
		</div>
		<div class="col-sm-4">	
			<div class="panel panel-info">
				<div class="panel-heading"><h1>Login as Admin</h1></div>
				<div class="panel-body"><form action="login.php" method="post">
					<p>Email Address: <input class="form-control" type="text"
						name="email" size="20" maxlength="60" placeholder="email" />
					</p>
					<p>Password: <input class="form-control" type="password"
						name="pass" size="20" maxlength="20" placeholder="password" />
					</p>
					<p><input class="form-control" type="submit" name="submit" value="Login" style="display: block; margin: 0 auto;"/></p>
				</form></div>
			</div>		
		</div>
		<div class="col-sm-2">	
		</div>
	</div>
</div>

<?php include ('footer.html'); ?>

