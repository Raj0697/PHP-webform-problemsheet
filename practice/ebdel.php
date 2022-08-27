<?php
$id=$_POST['del'];
if(!empty($id))
{
	$host="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="raj";
	
	$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
	if(mysqli_connect_error())
	{
		die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$insert="delete from ebinsert where id=?";
		$stmt=$conn->prepare($insert);
		$stmt->bind_Param("i",$id);
		$stmt->execute();
		$stmt->close();
		echo"The id: $id is deleted successfully";
	}
	$conn->close();
}
else
{
	echo"$id unsuccess";
}
?>