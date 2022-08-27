<?php
$id=$_POST['fid'];
$name=$_POST['na'];
$sex=$_POST['sex'];
$edu=$_POST['temp'];
$mar=$_POST['mar'];
$add=$_POST['add'];
$dob=$_POST['dob'];
$em=$_POST['em'];

if(!empty($id) && !empty($name) && !empty($sex) && !empty($edu) && !empty($mar) && !empty($add) && !empty($dob) && !empty($em))
{
	$t=0;
	$conn=new mysqli("localhost","root","","sem");
	if(mysqli_connect_error())
	{
		die('connection error('.mysqli_connect_errno().')');
	}
	else
	{
		$stmt= $conn->query("select * from parc where id='$id'");
		foreach($stmt as $i)
		{
			$t=1;
		}
		if($t==1)
		{
			echo"the id::$id is already available ";
		}
		$stmt->close();
		if($t==0)
		{
			$insert="insert into parc(id,name,gender,qual,marital,address,dob,email)values(?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt=$conn->prepare($insert);
			$stmt->bind_param("isssssss",$id,$name,$sex,$edu,$mar,$add,$dob,$em);
			$stmt->execute();
			$stmt->close();
			echo"success";
		}
	}
	$conn->close();
}
else
{
	echo"empty";
}
?>
