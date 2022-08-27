<?php

$id = $_POST['del'];

if(!empty($id))
{
	$t=0;
	try
	{
		$conn = new mysqli("localhost","root","","sample");
		if(mysqli_connect_error())
		{
			die('connection error('.mysqli_connect_errno().')');
		}
		else
		{
			$stmt = $conn->query("select * from website where id='$id'");
			foreach($stmt as $i)
			{
				$t=1;
			}
			$stmt->close();
			if($t==0)
			{
				echo"no record";
			}
			else
			{
				$stmt = $conn->prepare("delete from website where id=?");
				$stmt->bind_param("i",$id);
				$stmt->execute();
				$stmt->close();
				echo"deleted";
			}
			$conn->close();
		}
	}
	catch(Exception $e)
	{
		echo"$e->getMessage()";
	}
}
else
{
	echo"some";
}
