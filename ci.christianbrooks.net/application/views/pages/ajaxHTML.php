<?
echo "<table>";
	echo "<tr>";
		echo "<th>First Name</th>";
		echo "<th>Last Name</th>";
		echo "<th>Email</th>";
	echo "</tr>";
foreach($results as $row)
{
	echo "<tr>";
		echo "<td>".$row->FIRST_NAME."</td>";
		echo "<td>".$row->LAST_NAME."</td>";
		echo "<td>".$row->EMAIL."</td>";
	echo "</tr>";
}
echo "</table>";
?>