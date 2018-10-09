<?
$servername = "50.62.209.199:3306";
$username = "csbrooks";
$password = "Slade135!";

try{
	$conn = new PDO("mysql:host=$servername;dbname=csbrooks_class_examples", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully </br>";
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	
	$stmt = $conn->prepare('select * from Login where username = :user and password = :pass');
	$stmt->bindParam(':user', $user);
	$stmt->bindParam(':pass', $pass);
	
	$stmt->execute();
	
	$results = $stmt->fetchAll();
	if($results){
		echo "Access Granted!";
		foreach($results as $rows){
			echo "</br>";
			echo "Username: ".$rows['username']. " </br>";
			echo "Password: ".$rows['password']. " </br>";
		}
	}
	else{
		echo "Couldnt Login...";
	}
}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}
	
?>
