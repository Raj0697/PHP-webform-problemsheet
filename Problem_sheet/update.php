<?php
$id=$_POST['na'];
if(!empty($id))
{
	$t=0;
	$conn=new mysqli("localhost","root","","sem");
	if(mysqli_connect_error())
	{
		die('connection error('.mysqli_connect_errno().')');
	}
	else
	{
		$stmt=$conn->query("select * from parc where id='$id'");
		foreach($stmt as $i)
		{
			$t=1;
			$fgen = $i["gender"];
			$fmar = $i["marital"];
			$fedu = $i["qual"];
			
			?>
			
<html><head><title>mca</title></head>
<script type="text/javascript">

function val()
{
	var id = document.getElementById("n1").value;
	id=id.trim();
	
	var name = document.getElementById("n2").value;
	name=name.trim();
	var ct = /^[ A-Za-z]+$/;
	
	var male = document.getElementById("n3").checked;
	var female = document.getElementById("n4").checked;
	var ug = document.getElementById("n5").checked;
	var pg = document.getElementById("n6").checked;
	var doc = document.getElementById("n7").checked;
	var mar = document.getElementById("n8").selectedIndex;
	var add = document.getElementById("n9").checked;
	var dob = document.getElementById("n10").value;
	
	if(id.length==0)
	{
		document.getElementById("m1").innerHTML="enter the id and id should be 3 numeric values";
		document.getElementById("n1").focus();
		return false;
	}
	else if(id.length!=3)
	{
		document.getElementById("m1").innerHTML="id should be 3 numeric values";
		document.getElementById("n1").focus();
		return false;
	}
	else if(isNaN(id))
	{
		document.getElementById("m1").innerHTML="only numeric values are allowed";
		document.getElementById("n1").focus();
		return false;
	}
	else
	{
		document.getElementById("m1").innerHTML="";
	}
	if(name=="")
	{
		alert("Enter the name");
		return false;
	}
	else if(name.match(ct))
	{
		}
	else
	{
		alert("only characters are allowed");
		return false;
	}
	if(male==false && female==false)
	{
		alert("select the gender");
		return false;
	}
	var text="";
	if(ug==false && pg==false && doc==false)
	{
		alert("select the education qualification");
		return false;
	}
	if(ug==true || pg==true)
	{
		if(ug==true)
			text+=" "+document.getElementById("n5").value;
		if(pg==true)
			text+=" "+document.getElementById("n6").value;
		if(doc==true)
			text+=" "+document.getElementById("n7").value;
		document.raj.temp.value=text;
		alert(text);
	}
	if(mar==0)
	{
		alert("select the marital status");
		return false;
	}
	if(add=="")
	{
		alert("enter the address");
		return false;
	}
	if(dob=="")
	{
		alert("select the date");
		return false;
	}

}
</script>
<body>
<center>
<h2 style="font:normal 35px arial;">PHP UPDATION OF RECORDS</h2>
<form name="raj" method="post" action="update2.php" onsubmit="return val();">
<table border="0" cellpadding="6" cellspacing="3">
<tr><td>id:</td>
<td><input type="text" name="fid" id="n1" readonly value="<?php echo"$i[id]"?>"><span id="m1" style="color:red;"/></td>
</tr>
<tr><td>name:</td>
<td><input type="text" name="na" id="n2" value="<?php echo"$i[name]"?>"><span id="m2" style="color:red;"/></td></tr>
<tr><td>gender:</td>
<td><input type="radio" name="sex" id="n3" value="male" <?php if(strstr($fgen,"male")) echo"checked";?>>male
<input type="radio" name="sex" id="n4" value="female" <?php if(strstr($fgen,"female")) echo"checked;"?>>female
<span id="m3" style="color:red;"/>
</td></tr>
<tr><td>eudc:</td>
<td><input type="checkbox" name="edu" id="n5" value="ug" <?php if(strstr($fedu,"ug")) echo"checked";?>>ug
<input type="checkbox" name="edu" id="n6" value="pg" <?php if(strstr($fedu,"pg")) echo"checked";?>>pg
<input type="checkbox" name="edu" id="n7" value="doc" <?php if(strstr($fedu,"doc")) echo"checked";?>>doc
<span id="m4" style="color:red;"/>
</td></tr>
<tr><td>marital:</td>
<td><select name="mar" id="n8">
<option value="select">select</option>
<option value="single" <?php if(strstr($fmar,"single")) echo"selected";?>>single</option>
<option value="married" <?php if(strstr($fmar,"married")) echo"selected";?>>married</option>
<option value="divorsed" <?php if(strstr($fmar,"divorsed")) echo"selected";?>>divorsed</option><span id="m5" style="color:red;"/></td></tr>
<tr><td>address:</td>
<td><textarea rows="3" cols="30" name="add" id="n9" required><?php echo"$i[address]"?></textarea><span id="m6" style="color:red;"/></td></tr>
<tr><td>dob:</td><td><input type="date" name="dob" id="n10" value="<?php echo"$i[dob]";?>"><span id="m7" style="color:red;"/></td><tr>
<tr><td>email:</td><td><input type="email" name="em" id="n11" value="<?php echo"$i[email]";?>"><span id="m8" style="color:red;"/></td></tr>
</table><br/>
<input type="submit" value="update">&ensp;&ensp;
<input type="reset" value="clear">
<input type="hidden" name="temp">
</form>
</center>
</body></html>


<?php

		}
		$stmt->close();
		if($t==0)
		{
			echo"not found";
		}
	}
	$conn->close();
}
else
{
	echo"empty";
}
?>
