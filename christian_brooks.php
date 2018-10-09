<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Midterm Part 2</title>
<style>.error {color: red;}</style>
<link rel="stylesheet" type="text/css" href="christian_brooks.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="christian_brooks.js"></script>
</head>

<body>
<h1>Midterm</h1>
<h2>Starting point for Part 2</h2>

<?php
// define variables and set to empty values
$likecatsErr = "";
$likecats = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["likecats"])) {
    $nameErr = "Please Select Yes or No";
  } else {
    $name = test_input($_POST["likecats"]);
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$servername = "50.62.209.199:3306";
$username = "csbrooks135";
$password = "Slade135!";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=christian_brooks_midterm", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>

<label for="petname">First Pet Name</label><input pattern=".{2,25}" required title="2 characters minimum" type="text" id="petname" name="petname"><br>

<label for="favorite">Favorite type of pet</label><input pattern=".{2,25}" required title="2 characters minimum" type="text" id="favorite" name="favorite"><br>

Do you like cats
<input  required title="Please check Yes or No" checked="checked" id="yes" type="radio" name="likecats" value="yes">
<label for="yes">Yes</label>
<input id="no" type="radio" name="likecats" value="no">
<label for="no">No</label>
<span class="error">* <?php echo $likecatsErr;?></span>
<br>

<label for="cats">How many cats do you have</label><input pattern=".{1,100}" required title="1 minimum" type="text" id="cats" name="cats"><br>

<label for="pets">Number of pets</label>
<select id="pets" name="pets">
<option value=""></option>
<?
//loop to create all drop down values
for($i = 1; $i < 21; $i++)
{
	echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>
<br>

<input type="submit" name="submit" value="Submit"><br>

<?php

try{
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if($error != 1){
	$sql = "INSERT INTO form (name, type, like1, cats, pets) VALUES ('".$_POST["petname"]."', '".$_POST["favorite"]."', '".$_POST["likecats"]."', '".$_POST["cats"]."', '".$_POST["pets"]."')";
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



</form>

<table height="32" border="1" class="myTable">
	<thead>
    	<tr>
        	<th>ID</th>
        	<th>First Pet Name</th>
            <th>Favorite Type of Pet</th>
            <th>Like Cats?</th>
            <th>Number of Cats</th>
            <th>Number of Pets</th>
        </tr>
    </thead>
    <tbody>
    	<?php
$query = $dbh->query("SELECT id,name, type, like1, cats, pets FROM form ORDER BY pets, name DESC LIMIT 10");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['petname']."</td>";
	echo "<td>".$row['favorite']."</td>";
	echo "<td>".$row['likecats']."</td>";
	echo "<td>".$row['cats']."</td>";
	echo "<td>".$row['pets']."</td>";
	echo "</tr>";
	$lastID = $row['id'];
}
?>
    </tbody>
</table>

</body>
</html>