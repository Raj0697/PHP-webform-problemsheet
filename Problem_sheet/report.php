<center>
<table border="1">

<?php
$name=$_POST['rep'];
$name="%".$name."%";

	$t=0;
	$conn=new mysqli("localhost","root","","sem");
	if(mysqli_connect_error())
	{
		die('connection error('.mysqli_connect_errno().')');
	}
	else
	{
		echo"<tr><th>id</th><th>name</th><th>gender</th><th>qual</th><th>marital</th><th>address</th><th>dob</th><th>email</th></tr>";
		$stmt=$conn->query("select * from parc where name like '$name'");
		foreach($stmt as $i)
		{
			$t=1;
			echo"<tr><td>$i[id]</td><td>$i[name]</td><td>$i[gender]</td><td>$i[qual]</td><td>$i[marital]</td><td>$i[address]</td><td>$i[dob]</td><td>$i[email]</td></tr>";
		}
		
		$stmt->close();
	}	
	if($t==0)
		{
			echo"not found";
		}

$conn->close();

?>
</table>
</center>