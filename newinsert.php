<?php
$id=$_POST['cid'];
$name=$_POST['cna'];
$sex=$_POST['gen'];
$address=$_POST['area'];
$prod=$_POST['se'];
$qual=$_POST['edu'];

if(!empty($id) && !empty($name) && !empty($sex) && !empty($address) && !empty($prod) && !empty($qual))
{
	echo("the details are entered");
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
		$INSERT="insert into datainsert(id,name,sex,address,products,eduqual)values(?, ?, ?, ?, ?, ?)";
		$stmt=$conn->prepare($INSERT);
		$stmt->bind_param("isssss",$id,$name,$sex,$address,$prod,$qual);
		$stmt->execute();
		$stmt->close();
		echo"$name uploaded successfully";
	}
	$conn->close();
}
else
{
	echo"$name unsuccessfull";
}
?>