<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Secure Log In</title>
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
<h2>Secure Log In</h2>
<form method="post" action="secureLogin.php">  
  Username: <br><input type="text" name="user" size="40"><br>
  Password: <br><input type="password" name="pass" size="40"><br>
  <input id="button" type="submit" name="submit" value="Log-In">  
</form>
<label> Go To Unsecure Log In <a href="index.html">Click ME</a></label>

</body>
</html>