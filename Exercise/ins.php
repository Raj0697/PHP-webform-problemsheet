<?php

$id = $_POST['pid'];
$gen = $_POST['sex'];
$edu = $_POST['temp'];
$num = $_POST['sel'];

if(!empty($id) && !empty($gen) && !empty($edu) && !empty($num))
{
	$t = 0;
	
	$conn = new mysqli("localhost","root","","practise");
	if(mysqli_connect_error())
	{
		die('connection error('.mysqli_connect_errno().')');
	}
	else
	{
		$stmt = $conn->query("select * from new where id='$id'");
		foreach($stmt as $i)
		{
			$t = 1;
		}
		
		
		if($t==1)
		{
			echo"The id:: $id is already available in the db";
		}
		$stmt->close();
		if($t==0)
		{
			$stmt = $conn->prepare("insert into new(id,gender,educ,number)values(?, ?, ?, ?)");
			$stmt->bind_param("issi",$id,$gen,$edu,$num);
			$stmt->execute();
			$stmt->close();
			echo"The $id is inserted successfully";
		}
	}
	$conn->close();
}
else
{
	echo"some of the fields are empty";
}

?>	
	