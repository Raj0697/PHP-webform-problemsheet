<?php

$id = $_POST['i'];
$name = $_POST['na'];
$gender = $_POST['sex'];
$educ = $_POST['temp'];
$add = $_POST['t1'];
$mar = $_POST['marry'];

if(!empty($id) && !empty($name) && !empty($gender) && !empty($educ) && !empty($add) && !empty($mar))
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
			$stmt = $conn->prepare("update website set name=?,gender=?,educ=?,address=?,marital=? where id=?");
			$stmt->bind_param("sssssi",$name,$gender,$educ,$add,$mar,$id);
			$stmt->execute();
			$stmt->close();
			echo"<h1><center>The id::$id is successfully updated</center></h1>";
		}
		if($t==0)
		{
			echo"The id::$id is not found in the db";
		}
	}
		$conn->close();
}
else
{
	echo"some of the fields are empty ";
}
?>
	