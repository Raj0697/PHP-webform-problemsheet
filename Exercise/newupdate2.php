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
			$stmt = $conn->prepare("update new set gender=?, educ=?,number=? where id=?");
			$stmt->bind_param("ssii",$gen,$edu,$num,$id);
			$stmt->execute();
			$stmt->close();
			echo"the $id is updated";
		}
		if($t==0)
		{
			echo"the id ::$id is not found";
		}
	}
	$conn->close();
}
else
{
	echo"empty";
}
?>
	