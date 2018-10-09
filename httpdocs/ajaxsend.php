 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
    $("input[name='q1']").keyup(function(e){
		$("#output").html("Loading!");
		$.ajax({
			url: "ajaxsend.php?type=html&q="+$("input[name='q1']").val()
			}).done(function(data) {
			$("#output").html(data);
		});
	});
    $("input[name='q2']").keyup(function(e){
		$("#output").html("Loading!");
		$.getJSON("ajaxsend.php?q="+$("input[name='q2']").val(), 
			function( data ){
				var items = [];
				$.each( data, function( key, val ) {//for each row
					items.push( "<li id='" + key + "'><ul>");
					$.each(val, function(key2, val2){//for each column in a row
						items.push( "<li id='" + key2 + "'>" + key2 + " : " + val2 + "</li>" );
					});
					items.push( "</ul></li>");
				});
				$("#output").html($( "<ul/>", {
				"class": "my-new-list",
				html: items.join( "" )
				}));
		});
	});
	
});
</script>
<style>
.code{
	border:1px #BBB solid;
	background-color:#CCC;
	padding:5px;
	display:inline-block;
	margin:5px 0px;
}
.output{
	border:1px #DDD solid;
	background-color:#EEE;
	padding:5px;
	display:inline-block;
	margin:5px 0px;
}
h3{
	margin:5px 0px;
}
</style>
</head>

<body>
Get as HTML:<input name="q1" type="text"><br>
Get as JSON:<input name="q2" type="text"><br>
<div id="output"></div>

	<?
$servername = "50.62.209.199:3306";
$username = "csbrooks";
$password = "Slade135!";
    $db = new PDO("mysql:host=$servername;dbname=csbrooks_class_examples", $username, $password);
$select = $db->prepare("SELECT * FROM `Students` WHERE `LAST_NAME` LIKE ?");
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
</body>
</html>