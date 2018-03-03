<?php
	session_start();
?>

<?php
	include ('header.php');
?>

<div class="container" style=" border: 1px double black;">	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="alert alert-info alert-dismissible fade in" role="alert" >
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				
				<?php
					if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
						
						$errors = array( );
						
						if (empty($_POST['type'])) {
							$errors[ ] = 'You forgot to enter your first name.';
						}		
						else {
							$ty = trim($_POST['type']);
						}
						
						if (empty($_POST['firstname'])) {
							$errors[ ] = 'You forgot to enter your first name.';
						}		
						else {
							$fn = trim($_POST['firstname']);
						}
						
						if (empty($_POST['userlastname'])) {
							$errors[ ] = 'You forgot to enter your last name.';
						}					
						else {
							$ln = trim($_POST['userlastname']);
						}
						
						
						
						if (empty($_POST['emailaddress'])) {
							$errors[ ] = 'You forgot to enter your email address.';
						}				
						else {
							$em = trim($_POST['emailaddress']);
						}
						
						if (empty($_POST['telephoneNum'])) {
							$errors[ ] = 'You forgot to enter your telephone number.';
						}				
						else {
							$tp = trim($_POST['telephoneNum']);
						}
						
						if (empty($_POST['checkin'])) {
							$errors[ ] = 'You forgot to enter your start date.';
						}					
						else {
							$sd = trim($_POST['checkin']);
						}
						
						if (empty($_POST['checkout'])) {
							$errors[ ] = 'You forgot to enter your end date.';
						}						
						else {
							$ed = trim($_POST['checkout']);
						}
						
						if (empty($errors)) {
							
							require ('./mysqli_connect.php');
							$q = "INSERT INTO reservations (type,first_name, last_name, email, telephone, start_date, end_date) VALUES
							('$ty','$fn', '$ln', '$em', '$tp', '$sd', '$ed')";
							$r = @mysqli_query ($dbc, $q);				
							if ($r) {
								// Print a message:
								$p = "UPDATE users SET res_status ='pending' WHERE first_name = '".$_SESSION['first_name']."'";
								$p = @mysqli_query ($dbc, $p);
								
								header('Location: http://cs.neiu.edu/~fsef17g6/Lab_John/reservationsuccess.php');
								
								
								
								} else { // If it did not run OK.
								
								// Public message:
								echo '<h1 style="margin-top: 50px; margin-bottom: 50px;">System Error</h1>
								<p class="error">You could not be registered due to a system error. We apologize for
								any inconvenience.</p>';
								
								// Debugging message:
								echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
								
							} // End of if ($r) IF.
							
							mysqli_close($dbc); // Close the database connection.
							
							// Include the footer and quit the script:
							exit( );
							
							
							
						} // End of if (empty($errors)) IF.
					else { // Report the errors.
					
					echo '<h1>Error!</h1>
					<p class="error">The following error(s) occurred:<br />';
					foreach ($errors as $msg) { // Print each error.
					echo " - $msg<br />\n";
					}
					echo '</p><p>Please try again.</p><p><br /></p>';
					} // End of the main Submit conditional.
					mysqli_close($dbc); // Close the database connection.
					}?>	
					</div>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-12">
					<div class="breadcrumbs">
					<a href="project2temp_home.html" class= "active"> home > </a><a href="project2temp_reservations.html">reservations &amp; packages > </a> reservation form
					</div>
					<div style="padding:20px">
					
					<h1 >Reservations</h1>
					
					<p>
					
					Explore Nirvana Spa And Resort full directory of the best hotels around the world and easily book your stay. 
					
					If you're looking for ideas for your next family vacation, anniversary trip or relaxing weekend getaway, 
					
					you'll find a variety of ways to explore Mamora's hotel. Begin planning your trip by looking through our list of popular destinations, 
					
					where you can find more information about what that city has to offer, along with a list of our hotels.
					
					</p>
					
					<p>Nirvana Spa And Resort invites you to relax and rejuvenate the mind and body at our destination. 
					
					Complete the form below to book an appointment at The Spa at Mamora.</p>
					
					<h3>How To Purchase</h3>
					
					
					<p>Nirvana Spa Gift Certificates can be purchased directly from the spa or by contacting a Spa Concierge at <b>(773) 583-4050</b>.
					
					For convenience, after business hours,
					
					you may use the Online Request form provided below and a Concierge will contact you to complete your request the following business day.</p>
					
					<em>Depending on seasonal operating hours, it may take up from 24 to 48 hours for a Spa Concierge to reply to your request.</em>
					
					<h3>Spa Gift Certificate And Hotel Room Online Request</h3>
					
					<p>Gift Certificates are available in amounts of $50 or above and can be used toward any spa service or all-natural products that we offer.
					
					Nirvana Spa Gift Certificates make the perfect gift for birthdays or holidays and fantastic reward incentives for employees and clients.
					
					Give the gift of relaxation.
					
					</p>
					
					<br/>
					
					<form  action="project2temp_res.php" method="post">
					
					<fieldset class="form-group"> 
					<input type="hidden" name="type" value="reservation"/><br/>
					
					<legend style="color:blue">*Personal Information</legend>
					First Name:<input type="text" name="firstname" id="fName"/><br/>
					
					Last Name:<input type="text" name="userlastname" id="lName"/><br/>
					
					Address:<input type="text" name="useraddress"/><br/>
					
					City:<input type="text" name="usercity"/><br/>
					
					State/Province:<input type="text" name="userstate"/><br/>
					
					Zip/Postal Code:<input type="text" name="zipcode"/><br/>
					
					Email:<input type="text" name="emailaddress" id="email"/> <br/>
					
					Telephone:<input type="text" name="telephoneNum" id="tel"/>
					
					</fieldset>
					<br/>
					<fieldset>
					
					<legend>*How would you prefer we contact you?</legend>
					
					
					
					<input type="radio" name="telephone" value="telephone"/> Telephone
					
					<input type="radio" value="email"/> Email <br/><br/>
					
					</fieldset>
					<br/>
					<fieldset>
					
					<legend style="color:blue">*Spa Gift Certificates</legend>
					
					How many Nirvana Spa Gift Certificates would you like to purchase?
					
					<select name="number">
					
					<option selected="selected">Choose one...</option>
					
					<option>1</option>
					
					<option>2</option>
					
					<option>3</option>
					
					<option>4</option>
					
					<option>5</option>
					
					<option>6</option>
					
					<option>7</option>
					
					<option>8</option>
					
					<option>9+</option>
					
					</select><br/>
					
					</fieldset>
					<br/>
					<fieldset>
					
					<legend>*What dollar amount would you like for your Nirvana Spa Gift Certificates? ($50 minimum)</legend>
					
					
					<input type="text" name="dayspa" size="50" maxlength="50" value="Place your amount here:"/>
					
					</fieldset><br/>
					
					<fieldset>
					
					<legend style="color:blue">*Hotel Reservation</legend>
					
					Check in:<input type="text" name="checkin"/> &nbsp;&nbsp;
					
					Check out: <input type="text" name="checkout"/><br/><br/>			 
					
					<fieldset>
					
					<legend>
					
					*Hotel View Room
					
					</legend>
					
					<input type="radio" value="oceanview"/>Ocean View Room<br/>
					
					<input type="radio" value="gardenview"/>Garden View Room <br/>
					
					<input type="radio" value="mountainview"/>Mountain View Room <br/>		
					
					</fieldset>
					
					<br/>
					
					<fieldset>
					
					<legend>
					
					*Smoking Preference
					
					</legend>
					
					<input type="radio" value="nosmoking"/>No Smoking Preference<br/>
					
					<input type="radio" value="nonsmoking"/>Non Smoking Room <br/>
					
					<input type="radio" value="smokingroom"/>Smoking Room<br/>
					
					</fieldset>
					
					<br/>
					
					<fieldset>
					
					<legend>
					
					*Room Preference
					
					</legend>
					
					<select name="room">
					
					<option selected="selected">No Preference</option>
					
					<option>1 Bed</option>
					
					<option>2 Beds Accessible</option>
					
					<option>2 Beds Executive</option>
					
					<option>2 Double Begs</option>
					
					<option>King Beg</option>
					
					<option>King Bed Accessible</option>
					
					<option>King Bed Executive</option>
					
					<option>Suite</option>
					
					<option>Suite Accessible</option>
					
					</select><br/>		
					
					</fieldset>
					
					<br/>
					
					<fieldset>
					
					How Many Adult:<input type="text" name="numberadult"/><br/>
					
					How Many Children:<input type="text" name="numberchildren"/><br/>
					
					</fieldset>
					<br/>
					<fieldset>
					
					<legend>*How many room? </legend>
					
					<select name="number">
					
					<option selected="selected">Choose one...</option>
					
					<option>1</option>
					
					<option>2</option>
					
					<option>3</option>
					
					<option>4</option>
					
					<option>5</option>
					
					<option>6</option>
					
					<option>7</option>
					
					<option>8</option>
					
					<option>9+</option>
					
					</select><br/>
					
					</fieldset>
					
					<br/>
					<fieldset>
					
					<legend>Promo Code:</legend>
					
					<textarea name="promocode" rows="1" cols="100"></textarea>
					
					</fieldset>
					<br/>
					<fieldset>
					
					<legend>Additional Comments:</legend>
					
					<textarea name="commentsaboutcomputer" rows="10" cols="100"></textarea>
					
					</fieldset>
					
					<input type="submit" value="Submit"/>
					
					<input type="reset" value="Reset"/>
					
					</fieldset>
					
					</form>
					
					
					</div>
					</div>
					</div>
					
					</div>
					
					
					
					
					<?php
					include ('footer.html');
					?>
					
										