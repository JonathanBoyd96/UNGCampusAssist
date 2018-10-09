<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Christian's Chart</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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

<body>

<div id="piechart"></div>
<?
$servername = "50.62.209.199:3306";
$username = "csbrooks";
$password = "Slade135!";
$database = "csbrooks_class_examples";

$db = new PDO("mysql:host=".$servername.";dbname=".$database.";", $username, $password);
$select = $db->prepare("SELECT COUNT(*) as NUM FROM users WHERE STREAM = ?;");
$select->bindParam(1, $type);

?>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
// SQL STATEMENT SELECT COUNT(*) FROM Netflix WHERE NETFLIX = 'StrangerThings';

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['stream', 'Quantity'],
  ['Netflix', <? $type = 'Netflix';
    $select->execute();
    $results = $select->fetchAll(PDO::FETCH_ASSOC); echo $results[0]['NUM']?>],
  ['Hulu', <? $type = 'Hulu';
    $select->execute();
    $results = $select->fetchAll(PDO::FETCH_ASSOC); echo $results[0]['NUM']?>],

]);
/*var jsonData = $.ajax({
          url: "getData.php",
          dataType: "json",
          async: false
          }).responseText;
     */
//var data = new google.visualization.DataTable(data);


  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Favorite Streaming Service', 'width':400, 'height':300};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>