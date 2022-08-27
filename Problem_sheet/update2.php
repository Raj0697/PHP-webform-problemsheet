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
		if($t==0)
		{
			echo"the id::$id is not found ";
		}
		$stmt->close();
		if($t==1)
		{
			$insert="update parc set name=?,gender=?,qual=?,marital=?,address=?,dob=?,email=? where id=?";
			$stmt=$conn->prepare($insert);
			$stmt->bind_param("sssssssi",$name,$sex,$edu,$mar,$add,$dob,$em,$id);
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
		
		
		