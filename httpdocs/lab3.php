
<!DOCTYPE HTML>  
<html>
<head>
<title>Christian's Lab 3</title>
<style>
.error {color: red;}
</style>
</head>
<body>  

<?php
$servername = "50.62.209.199:3306";
$username = "csbrooks";
$password = "Slade135!";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=csbrooks_class_examples", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

<br>

<?php
	
// define variables and set to empty values
$Last_nameErr = $First_name = $emailErr =  "";
$Last_name = $First_name = $email =  "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Last_name"])) {
    $Last_nameErr = "Last name is required";
	$error = 1;
  } else {
    $Last_name = test_input($_POST["Last_name"]);
  }
  if (empty($_POST["First_name"])) {
    $First_nameErr = "First name is required";
	$error = 1;
  } else {
    $First_name = test_input($_POST["First_name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$error = 1;
  } else {
    $email = test_input($_POST["email"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Last Name: <input type="text" name="Last_name">
  <span class="error">* <?php echo $Last_nameErr;?></span>
  <br><br>
  First Name: <input type="text" name="First_name">
  <span class="error">* <?php echo $First_nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>



<?php

try{
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if($error != 1){
	$sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL) VALUES ('".$_POST["First_name"]."', '".$_POST["Last_name"]."', '".$_POST["email"]."')";
	}
	if ($dbh->query($sql)) {
	echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
	}
	else{
	echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
	}
	
	
}

catch(PDOException $e)
    {
    echo "<br>Error: Blank Form<br>";
    }
	
?>
<br>
<table border="1">
	<thead>
    	<tr>
        	<th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
<?php
$query = $dbh->query("SELECT ID, FIRST_NAME, LAST_NAME, EMAIL FROM users ORDER BY ID DESC LIMIT 10");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['ID']."</td>";
	echo "<td>".$row['FIRST_NAME']." ".$row['LAST_NAME']."</td>";
	echo "<td>".$row['EMAIL']."</td>";
	echo "</tr>";
	$lastID = $row['ID'];
}
?>
    </tbody>
</table>

<br>



</body>
</html>