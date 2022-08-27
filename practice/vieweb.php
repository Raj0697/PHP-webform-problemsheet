<?php
$name=$_POST['nam'];
$name="%".$name."%";

$host="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="raj";
	
	$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
	if(mysqli_connect_error())
	{
		die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$insert="select * from ebinsert where name like '$name'";
		$stmt=$conn->query($insert);
		echo"<br>";		
		echo"<br>";		
		echo"<tr>";
		echo"<th>ID</th><th>name</th><th>address</th><th>gender</th><th>qual</th><th>country</th>";
		echo"</tr>";
		foreach($stmt as $row)
		{
			echo"<tr>","<td>",$row["id"],"</td>","<td>",$row["name"],"</td>","<td>",$row["address"],"</td>","<td>",$row["gender"],"</td>","<td>",$row["qual"],"</td>","<td>",$row["country"],"</td>","</tr>","<br>";
		}	
	}
?>



