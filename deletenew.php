<?php
$id=$_POST['did'];

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
		$INSERT="delete from datainsert where id=?";
		$stmt=$conn->prepare($INSERT);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt->close();
		echo"$id deleted success";
	}
	$conn->close();
}
else
{
	echo"unsuccess";
}