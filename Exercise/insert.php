<?php

$id = $_POST['i'];
$name = $_POST['na'];
$gen = $_POST['sex'];
$edu = $_POST['temp'];
$add = $_POST['t1'];
$mar = $_POST['marry'];

if(!empty($id) && !empty($name) && !empty($gen) && !empty($edu) && !empty($add) && !empty($mar))
{
	$t=0;
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
		if($t==1)
		{
			echo"The $id is already found in the database";
		}
		$stmt->close();
		
		if($t==0)
		{
			$insert = "insert into website(id,name,gender,educ,address,marital)values(?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($insert);
			$stmt->bind_param("isssss",$id,$name,$gen,$edu,$add,$mar);
			$stmt->execute();
			$stmt->close();
			echo"$name is successfull";
		}
	}
	$conn->close();
}
else
{
	echo"some of the fields are empty";
}

?>