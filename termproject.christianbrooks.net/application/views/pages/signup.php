<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Secure Log In</title>

<link rel="stylesheet" type="text/css" href="http://termproject.christianbrooks.net/application/assets/css/styles.css">
	
	
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
		
	topmenu{
		float: left;
	}

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
		@media screen and (min-width:320px){
		body{font-size: 10px; color: darkblue}
		}
			
		@media screen and (min-width:1024px){
		body{font-size: 12px; color: white}
		}
		
		@media screen and (min-width:1280px){
		body{font-size: 15px; color: black}
		}

		
			
	
	
	</style>




</head>

<?php
// define variables and set to empty values
$passErr = $userErr="";
$pass = $user="";

  if (empty($_POST["user"])) {
    $userErr = "Username is required";
  } else {
    $user = test_input($_POST["user"]);
    // check if e-mail address is well-formed
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["pass"])) {
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["pass"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<h2>Create User</h2>
<div id="body">
	<?
		echo "<div class='error'>".validation_errors()."</div>";
		echo form_open_multipart("Pages/created");
	?>
		<label>Username :</label>
		<input type="text" name="user" id="name" placeholder="username"/><br /><br />
		<label>Password :</label>
		<input type="password" name="pass" id="password" placeholder="**********"/><br/><br />
		<input type="submit" value=" Login " name="Submit"/><br />
		<?php echo form_close(); 
	?>

	<?
		echo form_close()
			
	?>
	
	


	</div>


</body>
</html>