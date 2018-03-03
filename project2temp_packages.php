<?php
	session_start();
?>

<?php
	include ('header.php');
?>

<div class="container" style="background-color:#c8ebe5; border: 1px double black;">	
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
						
						
						
						if (empty($_POST['dayspa'])) {
							$errors[ ] = 'You forgot to enter your the date.';
						}						
						else {
							$d = trim($_POST['dayspa']);
						}
						
						if (empty($errors)) {
							
							require ('./mysqli_connect.php');
							$q = "INSERT INTO reservations (type,first_name, last_name, email, telephone, date) VALUES
							('$ty','$fn', '$ln', '$em', '$tp', '$d')";
							$r = @mysqli_query ($dbc, $q);				
							if ($r) {
								// Print a message:
								$p = "UPDATE users SET spa_status ='pending' WHERE first_name = '".$_SESSION['first_name']."'";
								$p = @mysqli_query ($dbc, $p);
								header('Location: http://cs.neiu.edu/~fsef17g6/Lab_John/appointmentsuccess.php');
								
								
								
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
					}
					
				?>	
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				&nbsp;&nbsp;<a href="index.html" class= "active"> home > </a> <a href="project2temp_reservations.html">reservations &amp; packages > </a> spa packages form
			</div>
			
			
			<div style="padding:20px">
				<h1 style="color:#055E9A;">Spa Packages</h1>
				<p>Using the form below, you are able to request an appointment at The Nirvana Spa at your convenience. We recommend that all guests reserve appointments prior to your arrival.
				Our friendly and helpful concierge staff will be happy to assist you in planning your day of pampering and relaxation.</p>
				
				<p>We accept all major credit cards and travelers checks for services or retail products.
				All appointments must be guaranteed with a major credit card and a late cancellation policy does apply to those appointments canceled with less than a 72 hours notice.</p>
				
				<h3 style="color: #055E9A;">Mamora Spa Online Appointment Request</h3>
				
				<p>Please fill out the form bellow and an Mamora spa representative will contact you.</p>
				
				<form  action="project2temp_packages.php" method="post">
					<input type="hidden" name="type" value="spa appointment"/><br/>
					<fieldset>
						<legend> *Personal Information </legend>
						
						First Name: <input type="text" name="firstname" id="fName"/> &nbsp;
						Last Name: <input type="text" name="userlastname" id="lName"/><br/>
						Email Address: <input type="text" name="emailaddress" id="email"/>  &nbsp;
						Telephone: <input type="text" name="telephoneNum" id="tel"/><br/>
					</fieldset>
					
					<fieldset>
						<legend> Survey Questions </legend>
						
						Have you taken an online reservation before? <br/>
						<input type="radio" value="Yes"/> Yes
						<input type="radio" value="No"/> No <br/>
					</fieldset>
					
					<fieldset>
						*What day would you like to visit the spa: <br/>
						<input type="text" name="dayspa" size="50" maxlength="50" /><br/>
						
					</fieldset>
					
					<fieldset>
						*What services were you interested in?<br/><br/>
						
						<fieldset>
							
						
						<legend>Body Treatments</legend>
						
						<input type="checkbox" name="checkallapply" value="cellulitebathtreatments"/>Cellulite Bath
						Treatment  
						
						<input type="checkbox" name="checkallapply" value="moroccanbathtreatments"/>Moroccan Bath Treatment
						
						<input type="checkbox" name="checkallapply" value="seaweedleafwrapbathtreatments"/>Seaweed Leaf Wrap
						Bath Treatment
						<br/><br/>
						</fieldset>
						
						<fieldset>
						
						
						<legend>Skin Care</legend>
						
						<input type="checkbox" name="checkallapply" value="Nirvanasorganicfacial"/>Nirvana's Organic Facial
						
						<input type="checkbox" name="checkallapply" value="stressrelieffacial"/>Stress Relief Facial           
						
						<input type="checkbox" name="checkallapply" value="riverstonefacial"/>River Stone Facial
						
						<br/><br/>
						</fieldset>
						
						<fieldset>
						
						
						<legend>Massage Therapy</legend>
						<input type="checkbox" name="checkallapply" value="swedishmassage"/>Swedish Massage             
						
						<input type="checkbox" name="checkallapply" value="couplemassage"/>Couple Massage               
						
						<input type="checkbox" name="checkallapply" value="hotstonemassage"/>Hot Stone Massage <br/><br/>
						</fieldset>
						<fieldset>
						<legend>Spa Packages</legend>
						
						<input type="checkbox" name="checkallapply" value="deeptissuespapackages"/>DeepTissue Packages
						
						
						<input type="checkbox" name="checkallapply" value="dayspapackages"/>Day Spa Packages             
						
						<input type="checkbox" name="checkallapply" value="overnightspapackages"/>Overnight Spa Packages <br/><br/>
						
						
						</fieldset>
						<p>
						<b>Note: </b> A 15% service fee is added to all massage therapy.  Voucher and discount coupons are not valid for use on Spa Packages.  
						Personalized Spa Packages available upon request.  We can customize the perfect Spa Package for you!</p>
						
						</fieldset>
						
						<fieldset>
						*Add a Detoxifying Ion Cleansing?<br/>
						<input type="radio" value="Yes,15mins"/> Yes, 15 minute cleansing &nbsp;&nbsp;
						<input type="radio" value="Yes,30mins"/> Yes, 30 minute cleansing &nbsp;&nbsp;
						<input type="radio" value="No"/> No, Thank You
						<br/>
						
						
						</fieldset>
						
						
						
						<fieldset>
						Additional Comments<br/>
						<textarea name="commentsaboutcomputer" rows="10" cols="120"></textarea>
						
						</fieldset>
						<input type="submit" value="Submit" onclick="return validateForm()"/>
						<input type="reset" value="Reset"/>
						
						</form>
						
						
						
						</div>
						
						</div>
						
						
						
						</div>
						</div>
						
						
						<?php
						include ('footer.html');
						?>
												