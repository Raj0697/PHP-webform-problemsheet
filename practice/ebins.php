<?php
$id=$_POST['did'];
$name=$_POST['na'];
$add=$_POST['area'];
$gen=$_POST['sex'];
$quali=$_POST['temp'];
$country=$_POST['selection'];
if(!empty($id) && !empty($name)&& !empty($add)&& !empty($gen)&& !empty($quali)&& !empty($country))
{
	echo"<h1>";
	echo"the details are entered";
	echo"<br>";
	echo"<br>";
	echo"ID = $id";
	echo"<br>";
	echo"NAME = $name";
	echo"<br>";
	echo"ADDRESS = $add";
	echo"<br>";
	echo"GENDER = $gen";
	echo"<br>";
	echo"QUALIFICATION = $quali";
	echo"<br>";
	echo"COUNRTY = $country";
	echo"</h1>";
	
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
	$insert="insert into ebinsert(id,name,address,gender,qual,country)values(?, ?, ?, ?, ?, ?)";
	$stmt=$conn->prepare($insert);
	$stmt->bind_Param("isssss",$id,$name,$add,$gen,$quali,$country);
	$stmt->execute();
	$stmt->close();
	echo"<br>";
	echo"<center><h2> $name uploaded successfully</h2></center>";
}
$conn->close();
}
else
{
	echo"<center><h2> $name unsuccessfull</h2></center>";
}
?>