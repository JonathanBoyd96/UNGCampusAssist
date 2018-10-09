<?

$servername = "50.62.209.7:3306";
$username = "andrew13";
$password = ""
$database = "class_work";
	
$db = new PDO("mysql:host=".$servername.";dbname=".$database.";", $username, $password);
$select = $db->prepare("SELECT * FROM `users` WHERE `LAST_NAME` LIKE ?");
$select->bindParam(1, $last);
$last = "%".$_GET['q']."%";
$select->execute();
$results = $select->fetchAll(PDO::FETCH_ASSOC);

if($_GET['type'] == "html")
{
	echo "<table>";
		echo "<tr>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Email</th>";
		echo "</tr>";
	foreach($results as $row)
	{
		echo "<tr>";
			echo "<td>".$row['FIRST_NAME']."</td>";
			echo "<td>".$row['LAST_NAME']."</td>";
			echo "<td>".$row['EMAIL']."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else
{
	echo json_encode($results);
}


?>