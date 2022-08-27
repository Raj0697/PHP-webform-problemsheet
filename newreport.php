<body>
<table border="1">

<?php
$id=$_POST['reid'];
$id="%" .$id. "%";
$dsn="mysql:dbname=raj";
$uname="root";
$pass="";
$conn=new PDO($dsn,$uname,$pass);
$strquery="select * from datainsert where id like '$id'";
$rows=$conn->query($strquery);
echo"<br>";
echo"<br>";
echo"<tr>";
echo"<th>ID</th><th>name</th><th>sex</th><th>address</th><th>products</th><th>edu</th>";
foreach($rows as $row)
{
		echo"<tr>","<td>",$row["id"],"</td>","<td>",$row["name"],"</td>","<td>",$row["sex"],"</td>","<td>",$row["address"],"</td>","<td>",$row["products"],"</td>","<td>",$row["eduqual"],"</td>","</tr>";
}
?>
</table>
</body>