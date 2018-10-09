<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Christian's Chart</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
<h1>Google Chart API</h1>

<div id="piechart"></div>

<div id="form">
<form action ="form.php" method="post">
  Pick your favorite Netflix show to binge: <br>
 <input type="radio" name="netflix" value="Arrow"> Arrow<br>
 <input type="radio" name="netflix" value="Flash"> Flash<br>
 <input type="radio" name="netflix" value="TheOffice" > The Office<br>
 <input type="radio" name="netflix" value="Daredevil"> Daredevil<br>
 <input type="radio" name="netflix" value="LukeCage"> Luke Cage<br>
 <input type="radio" name="netflix" value="IronFist" > Iron Fist<br>
 <input type="radio" name="netflix" value="Other"> Other<br>
 <input type="submit" value="Submit"><br>
</form>
</div>
<?
$servername = "50.62.209.199:3306";
$username = "csbrooks";
$password = "Slade135!";
$database = "csbrooks_class_examples";

$db = new PDO("mysql:host=".$servername.";dbname=".$database.";", $username, $password);
$select = $db->prepare("SELECT COUNT(*) as NUM FROM Netflix WHERE NETFLIX = ?;");
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
  ['netflix', 'Quantity'],
  ['Arrow', <? $type = 'Arrow';
    $select->execute();
    $results = $select->fetchAll(PDO::FETCH_ASSOC); echo $results[0]['NUM']?>],
  ['Flash', <? $type = 'Flash';
    $select->execute();
    $results = $select->fetchAll(PDO::FETCH_ASSOC); echo $results[0]['NUM']?>],
  ['TheOffice', <? $type = 'TheOffice';
    $select->execute();
    $results = $select->fetchAll(PDO::FETCH_ASSOC); echo $results[0]['NUM']?>],
  ['Daredevil', <? $type = 'Daredevil';
    $select->execute();
    $results = $select->fetchAll(PDO::FETCH_ASSOC); echo $results[0]['NUM']?>],
  ['LukeCage', <? $type = 'LukeCage';
    $select->execute();
    $results = $select->fetchAll(PDO::FETCH_ASSOC); echo $results[0]['NUM']?>],
  ['IronFist', <? $type = 'IronFist';
    $select->execute();
    $results = $select->fetchAll(PDO::FETCH_ASSOC); echo $results[0]['NUM']?>], 
  ['Other', <? $type = 'Other';
    $select->execute();
    $results = $select->fetchAll(PDO::FETCH_ASSOC); echo $results[0]['NUM']?>]
]);
/*var jsonData = $.ajax({
          url: "getData.php",
          dataType: "json",
          async: false
          }).responseText;
     */
//var data = new google.visualization.DataTable(data);


  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Favorite Binge-worthy Netflix Show', 'width':400, 'height':300};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>