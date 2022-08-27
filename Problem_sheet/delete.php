<?php
$id=$_POST['del'];
if(!empty($id))
{
	$t=0;
	$conn=new mysqli("localhost","root","","sem");
	if(mysqli_connect_error())
	{
		die('connection error('.mysqli_connect_errno().')');
	}
	else
	{
		$stmt=$conn->query("select * from parc where id='$id'");
		foreach($stmt as $i)
		{
			$t=1;
		}
		if($t==0)
		{
			echo"The id::$id is not found";
		}
		$stmt->close();
		if($t==1)
		{
			$delete="delete from parc where id=?";
			$stmt=$conn->prepare($delete);
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$stmt->close();
			echo"The id:$id is deleted";
		}
	}
	$conn->close();
}
else
{
	echo"empty";
}
?>
