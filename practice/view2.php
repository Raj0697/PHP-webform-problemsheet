
<?php
$name=$_POST['nam'];
$name="%".$name."%";

$dsn="mysql:dbname=raj";
$username="root";
$password="";

$conn=new PDO($dsn,$username,$password);
$strquery="select * from ebinsert where name like '$name'";
$rows=$conn->query($strquery);
echo"<body bgcolor=pink>";
echo"<br>";
echo"<center>";
echo"<h1>The details are shown below</h1>";
echo"<table border=3>";
echo"<tr>";
echo"<th>ID</th><th>NAME</th><th>ADDRESS</th><th>GENDER</th><th>qual</th><th>country</th>";
echo"</tr>";
echo"<br>";
foreach($rows as $row)
{
	echo"<tr>","<td>",$row["id"],"</td>","<td>",$row["name"],"</td>","<td>",$row["address"],"</td>","<td>",$row["gender"],"</td>","<td>",$row["qual"],"</td>","<td>",$row["country"],"</td>","</tr>","<br>";
}
echo"</table>";
echo"</center>";
echo"</body>";
?>
