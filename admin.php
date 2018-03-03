<?php 
	
	include ('header.php');
	
	
	session_start();
	
	
	
	if ( $_SESSION['loggedin'] == false && $_SESSION['first_name'] != 'admin') 
	{
		header('Location: http://cs.neiu.edu/~fsef17g6/Lab_John/');
	}
?>

<?php # Script 9.3 - register.php
	
	if ($_SERVER['REQUEST_METHOD'] ==  'POST') {	
		require ('./mysqli_connect.php');
		
		if($_POST['res']=='approve'){
			$z = "UPDATE users SET res_status ='approved' WHERE last_name = '".$_POST['manageres']."' && res_status='pending'";
			$z = @mysqli_query ($dbc, $z);
			$p = "UPDATE users SET res_status ='approved' WHERE last_name = '".$_POST['manageres']."' && spa_status='pending'";
			$p = @mysqli_query ($dbc, $p);
			header('Location: http://cs.neiu.edu/~fsef17g6/Lab_John/admin.php');
			
		}
		else{
			$q = "UPDATE users SET res_status ='declined' WHERE last_name = '".$_POST['manageres']."' && res_status='pending'";
			$q = @mysqli_query ($dbc, $q);
			$k = "UPDATE users SET spa_status ='declined' WHERE last_name = '".$_POST['manageres']."' && spa_status='pending'";
			$k = @mysqli_query ($dbc, $k);
			header('Location: http://cs.neiu.edu/~fsef17g6/Lab_John/admin.php');
		}
		
		$n = "DELETE FROM users WHERE last_name = '".$_POST['deleteuser']."'";
		$n = @mysqli_query ($dbc, $n);
		
		mysqli_close($dbc); // Close the database connection.
		
		// Include the footer and quit the script:
		exit( );
	}
	
	
?>

<div class="container" style="margin-top: 70px; margin-bottom: 100px;">
	<div class="row">
		<h2 style="text-align: center;"> Admin's Page </h2>
		<br>
		<div class= "col-xs-1"></div>
		<div class= "col-xs-10" align="center" style="border-radius: 5px;  border: 1px solid black;">	
			<h3> Registered Users: </h3>
			<?php 
				require ('./mysqli_connect.php'); // Connect to the db.
				
				// Make the query:
				$q = "SELECT * FROM users";
				
				$r = @mysqli_query ($dbc, $q); // Run the query.
				
				if ($r) { // If it ran OK, display the records.
					
					// Table header.
					echo '
					<table class="table" align="center" cellspacing="3" cellpadding="3" width="75%">
					<tr>
					<td align="left"><b>Name</b></td>
					<td align="left"><b>Email</b></td>
					<td align="left"><b>Registration Date</b></td>
					<td align="left"><b>Reservation</b></td>
					<td align="left"><b>Spa appointment</b></td>
					</tr>';
					
					// Fetch and print all the records:
					while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
						echo '<tr>
						<td align="left">' . $row['first_name'] . "&nbsp;"  . $row['last_name'] . '</td>
						<td align="left">' . $row['email'] .'</td>
						<td align="left">' . $row['registration_date'] .'</td>
						<td align="left">' . $row['res_status'] .'</td>
						<td align="left">' . $row['spa_status'] .'</td>
						</tr>';
					}
					
					echo '</table>'; // Close the table.
					
					mysqli_free_result ($r); // Free up the resources.
					
					} else { // If it did not run OK.
					
					// Public message:
					echo '<p class="error">The current users could not be retrieved. We apologize for any
					inconvenience.</p>';
					
					// Debugging message:
					echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
					
				} // End of if ($r) IF.
				
				mysqli_close($dbc); // Close the database connection.
				
			?>
			<br>
			<form  action="" method="post">
				<div class="form-group">
					<p style="text-align: center;">*Type the last name of the user who would you like to delete:</p>
					<div class="col-xs-6">
						<input class="form-control" type="text" name="deleteuser" size="20" maxlength="20" /> 
					</div>	
					<div class="col-xs-4">
						<button class="form-control btn navbar-btn btn-danger"  type="submit" name="profile">Delete</button>
					</div>	
				</div>
			</form>
		</div>
		<div class= "col-xs-1"></div>
	</div>
	<br/>
	<div class="row" align="center">
		<div class= "col-xs-1"></div>
		<div class="col-lg-10" align="center" style="border-radius: 5px;  border: 1px solid black;">	
			<h3> Reservations and Spa Appointments </h3>	
			<?php 
				require ('./mysqli_connect.php'); // Connect to the db.
				
				// Make the query:
				$q = "SELECT * FROM reservations";
				
				$r = @mysqli_query ($dbc, $q); // Run the query.
				
				if ($r) { // If it ran OK, display the records.
					
					// Table header.
					echo '
					<table class="table" align="center" cellspacing="3" cellpadding="3" width="75%">
					<tr>
					<td align="left"><b>Type</b></td>
					<td align="left"><b>Name</b></td>
					<td align="left"><b>Email</b></td>
					<td align="left"><b>Telephone</b></td>
					<td align="left"><b>Start Date</b></td>
					<td align="left"><b>Start End</b></td>
					<td align="left"><b>Day</b></td>
					</tr>';
					
					// Fetch and print all the records:
					while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
						echo '<tr>
						<td align="left">' . $row['type'] .'</td>
						<td align="left">' . $row['first_name'] . "&nbsp;"  . $row['last_name'] . '</td>
						<td align="left">' . $row['email'] .'</td>
						<td align="left">' . $row['telephone'] .'</td>
						<td align="left">' . $row['start_date'] .'</td>
						<td align="left">' . $row['end_date'] .'</td>
						<td align="left">' . $row['date'] .'</td>
						</tr>';
					}
					
					echo '</table>'; // Close the table.
					
					mysqli_free_result ($r); // Free up the resources.
					
					} else { // If it did not run OK.
					
					// Public message:
					echo '<p class="error">The current users could not be retrieved. We apologize for any
					inconvenience.</p>';
					
					// Debugging message:
					echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
					
				} // End of if ($r) IF.
				
				mysqli_close($dbc); // Close the database connection.
				
			?>
			<br>
			<form  action="" method="post">
				<div class="form-group">
					<p style="text-align: center;">*Type the last name of the user who would you like approve or decline the reservations:</p>
					<div class="col-xs-4">
						<input class="form-control" type="text" name="manageres" size="20" maxlength="20" /> 
					</div>
					<div class="col-xs-4">
						<button class="form-control btn navbar-btn btn-success" type="submit" name="res">Approve</button> 
					</div>
					<div class="col-xs-4">
						<button class="form-control btn navbar-btn btn-danger"  type="submit" name="res">Decline</button>
					</div>			
				</form>
			</div>
			<div class="col-xs-12">
				<a style="margin-top: 30px;" href="./logout.php" role="button" class="btn navbar-btn btn-danger" name="logout" id="logout" >Log Out</a>
			</div>
		</div>
		<div class= "col-xs-1"></div>
	</div>	
	
	
	
	<?php 
		
		include ('footer.html');
	?>																																																						