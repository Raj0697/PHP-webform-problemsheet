<?php
$id=$_POST['i'];
$name=$_POST['n'];
$gen=$_POST['sex'];
$add=$_POST['addres'];
$marital=$_POST['marry'];
$educqual=$_POST['edu'];
if(!empty($id) && !empty($name) && !empty($gen) && !empty($add) && !empty($marital) && !empty($educqual))
{
	echo"<center><h1> The documents are entered </h1></center>";
	echo"<br>";
	echo"<h3>1.ID:$id</h3>";
	echo"<h3>2.NAME:$name</h3>";
	echo"<h3>3.gender:$gen</h3>";
	echo"<h3>4.Address:$add</h3>";
	echo"<h3>5.martal:$marital</h3>";
	echo"<h3>6.edu:$educqual<h3>";
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbName="raj";
	$conn=new mysqli($host, $dbUsername, $dbPassword, $dbName);
	if(mysqli_connect_error())
	{
		die('connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else
	{
		$INSERT="INSERT into datainsert(id,name,gender,address,maritalstatus,eduqual)values(?, ?, ?, ?, ?, ?)";
		$stmt=$conn->prepare($INSERT);
		$stmt->bind_param("ssssss",$id,$name,$gen,$add,$marital,$educqual);
		$stmt->execute();
		$stmt->close();
		echo"<br><br><h2><center>$name uploaded successfully</center></h2>";
	}
	$conn->close();
}
else
{
	echo"<br><br>$name unsuccessful";
}
?>