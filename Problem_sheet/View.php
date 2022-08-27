<body>
<center>
<table border="1">

<?php
$conn=new mysqli("localhost","root","","sem");
if(mysqli_connect_error())
	
	{
		die('connection error('.mysqli_connect_errno().')');
	}
	else
	{
		$stmt=$conn->query("select * from parc");
		echo"<tr><th>id</th><th>name</th><th>gender</th><th>qual</th><th>marital</th><th>address</th><th>dob</th><th>email</th></tr>";
		foreach($stmt as $i)
		{
			echo"<tr><td>$i[id]</td><td>$i[name]</td><td>$i[gender]</td><td>$i[qual]</td><td>$i[marital]</td><td>$i[address]</td><td>$i[dob]</td><td>$i[email]</td></tr>";
		}
	}
?>
</table>
</center>
</body>	

