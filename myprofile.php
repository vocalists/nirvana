
<?php session_start() ?>

<?php include ('header.php'); ?>

<div class="container" style="margin-top: 70px; margin-bottom: 100px; width: 50%;">
	<div class="row">
		<div class= "col-xs-12" align="center">	
			
			<h1> My Profile </h1>
			<br/>
			<?php
				require ('./mysqli_connect.php'); // Connect to the db.
				
				// Make the query:
				$q = "SELECT * FROM users WHERE first_name = '".$_SESSION['first_name']."'";
				
				$r = @mysqli_query ($dbc, $q); // Run the query.
				
				if ($r) { // If it ran OK, display the records.
					
					
					
					// Fetch and print all the records:
					while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
						echo '<div class="panel panel-info">
						<div class="panel-heading">'. $row['first_name'] .'&nbsp;' . $row['last_name'] . '</div>
						<div class="panel-body"><p>Email Address: ' . $row['email'] . '</p> <hr><p>Registered account since: ' . $row['registration_date'] . '</p><hr><p>Reservations: ' . $row['res_status'] . '</p><hr><p>Spa appointment: ' . $row['spa_status'] . '</p></div>
						</div>';
					}
					
					
					
					mysqli_free_result ($r); // Free up the resources.
					
					} else { // If it did not run OK.
					
					// Public message:
					echo '<p class="error">The current users could not be retrieved. We apologize for any
					inconvenience.</p>';
					
					// Debugging message:
					echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
					
				} // End of if ($r) IF.
				
		mysqli_close($dbc); // Close the database connection.?>		
		
		<a href="./logout.php" role="button" class="btn navbar-btn btn-danger" name="logout" id="logout" >Log Out</a>
	</div>
</div>	
</div>


<?php 
	
	include ('footer.html');
	?>													