<? 
// define variables and set to empty values
$netflix = $_POST["netflix"];

$servername = "50.62.209.199:3306";
$username = "csbrooks";
$password = "Slade135!";

try {
    $conn = new PDO("mysql:host=$servername;dbname=csbrooks_class_examples", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
try{
$sql = "INSERT INTO Netflix (NETFLIX) VALUES (:netflix)";

$query = $conn->prepare($sql);

$result = $query->execute(array(':netflix'=>$netflix));
}
catch(PDOException $e)
{
	echo "Insert failed: " . $e->getMessage();
}
if ( $result ){
  echo "<p>Thank you. You have inserted Show</p>";
echo '<a href="index.php">Home</a>';
} else {
  echo "<p>Sorry, there has been a problem inserting your details. Please contact admin.</p>";
}
}
?>