<body bgcolor="tomato">
<center>
<table border="1" bgcolor="white">
<?php
try
{
	$conn  = new mysqli("localhost","root","","sample");
	echo"<tr><th>id</th><th>name</th><th>gender</th><th>educ</th><th>address</th><th>marital</th></tr><br>";
	$stmt = $conn->query("select * from website");
	foreach($stmt as $i)
	{
		echo"<tr><td>$i[id]</td><td>$i[name]</td><td>$i[gender]</td><td>$i[educ]</td><td>$i[address]</td><td>$i[marital]</td></tr>";
	}
	$stmt->close();
}
catch(Exception $e)
{
	echo"$e->getMessage()";
}
$conn->close();
?>
</table>
</center>
</body>
