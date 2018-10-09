<table border="1">
	<thead>
    	<tr>
<?
foreach($results[0] as $key => $value)
{
	echo "<th>".ucwords(strtolower(str_replace("_"," ",$key)))."</th>";
}
?>
		</tr>
    </thead>
    <tbody>
<?
foreach($results as $key => $value)
{
	echo "<tr>";
	foreach($value as $col)
		echo "<td>".$col."</td>";
	echo "</tr>";
}
?>
    </tbody>
</table>