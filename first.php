<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML
1.0 Transitional//EN" "http://www.w3.org/
TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/
xhtml" xml:lang="en" lang="en">
 <head>
 <meta http-equiv="Content-Type"
content="text/html; charset=utf-8" />
 <title>Page Title</title>
 </head>
 <body>
 <head>
<meta http-equiv="Content-Type"
➝ content="text/html;
➝ charset=utf-8" />
<title>Basic PHP Page</title>
</head>
<body>
<!-- Script 1.2 - first.php -->
<p>This is standard HTML.</p>
 </body>
 <?php
 echo '<p>this was generated</br> using PHP </p>';
 $file = $_SERVER['SCRIPT_FILENAME'];
 $user = $_SERVER['HTTP_USER_AGENT'];
 $server = $_SERVER['SERVER_SOFTWARE'];
 $city= 'Seattle';
$state = 'Washington';
$address = $city . $state;


 echo "<p> you are running the file:<b>$file</b>.</p>";
 echo "<p>You are viewing this page using:<br /><b>$user</b></p>\n";
 echo "<p>This server is running:<br /><b>$server</b>.</p>\n";
 echo "<p> use . to concatenating string values on the assignment. <em>$address</em>";
 //end of php
 ?>
 </html>