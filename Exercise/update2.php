<?php

$id = $_POST['uid'];
if(!empty($id))
{
	echo"the id::$id is found in the db";
	
	try
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
				$fgen = $i["gender"];
				$feduc = $i["educ"];
				$fmar = $i["marital"];
				$t=1;
		?>
		
<html>
<head>
<title>mcc</title>
</head>
<script type="text/javascript">

function val()
{
	//id
	var id = document.getElementById("pid").value;
	var len=id.length;
	id=id.trim();
	
	
	if(len==0)
	{
		document.getElementById("msg1").innerHTML="Enter the id";
		document.getElementById("pid").focus();
		return false;
	}
	else if(len<3)
	{
		document.getElementById("msg1").innerHTML="enter 3 digits";
		document.getElementById("pid").focus();
		return false;
	}
	else
	{
		document.getElementById("msg1").innerHTML="";}
	//name
	var nam = document.getElementById("pna").value;
	nam=nam.trim();
	var ct = /^[ A-Za-z]+$/;
	
	if(nam=="")
	{
		document.getElementById("msg2").innerHTML="enter your name";
		document.getElementById("pna").focus();
		return false;
	}
	else if(nam.match(ct))
	{
		document.getElementById("msg2").innerHTML="";	
	}
	else
	{
		document.getElementById("msg2").innerHTML="enter only alphabets";
		document.getElementById("pna").focus();
		return false;
	}
	//gender
	var m = document.getElementById("s1").checked;
	var f = document.getElementById("s2").checked;
	if(m==false && f==false)
	{
		alert("Select the gender");
		return false;
	}
	//educ
	var u = document.getElementById("e1").checked;
	var p = document.getElementById("e2").checked;
	var d = document.getElementById("e3").checked;
	if(u==false && p==false && d==false)
	{
		alert("select the educational qualification");
		return false;
	}
	
	var text="";
	
	if(u==true || p==true || d==true)
	{
		if(u==true)
			text+=" "+document.getElementById("e1").value;
		if(p==true)
			text+=" "+document.getElementById("e2").value;
		if(d==true)
			text+=" "+document.getElementById("e3").value;
			
		document.raj.temp.value=text;
		
	}

}
</script>

<body bgcolor="royalblue">
<center>
<h1 style="color:white;background-color:blue;font-size:45px;font-family:algerian;">WELCOME TO MY WEBSITE</h1>
<form name="raj" method="post" action="finalupdate.php" onsubmit="return val();">
<table border="0" cellpadding="10" cellspacing="5" style="background-color:white;border-color:yellow;">
<tr>
<td>id</td>
<td><input type="text" name="i" id="pid" autocomplete="off" value="<?php echo"$i[id]";?>" readonly>
<span id="msg1" style="color:red;"/>
</td>
</tr>

<tr>
<td>name</td>
<td><input type="text" name="na" id="pna" autocomplete="off" value="<?php echo"$i[name]";?>">
<span id="msg2" style="color:blue;">
</td>
</tr>

<tr>
<td>gender</td>
<td><input type="radio" name="sex" id="s1" value="male" <?php if(strstr($fgen,"male"))echo"checked";?>>male
<input type="radio" name="sex" id="s2" value="female" <?php if(strstr($fgen,"female"))echo"checked";?>>female</td>
</tr>

<tr>
<td>education</td>
<td><input type="checkbox" name="educ" id="e1" value="ug" <?php if(strstr($feduc,"ug"))echo"checked";?>>ug
<input type="checkbox" name="educ" id="e2" value="pg" <?php if(strstr($feduc,"pg"))echo"checked";?>>pg
<input type="checkbox" name="educ" id="e3" value="doctrate" <?php if(strstr($feduc,"doctrate"))echo"checked";?>>doctrate</td>
</tr>

<tr>
<td>address</td>
<td><textarea rows="3" cols="30" name="t1" id="add"><?php echo"$i[address]";?></textarea></td>
</tr>

<tr>
<td>marital status</td>
<td><select name="marry" id="m1">
<option value="select yours">select yours</option>
<option value="single" <?php if(strstr($fmar,"single"))echo"selected";?>>single</option>
<option value="married" <?php if(strstr($fmar,"married"))echo"selected";?>>married</option>
<option value="widow" <?php if(strstr($fmar,"widow"))echo"selected";?>>widow</option></td>
</tr>

</table>
<br><br>
<input type="submit" value="UPDATE" style="border:none;color:yellow;border-radius:10px;background-color:red;cursor:pointer;width:100px;margin:12px 0;">&ensp;&ensp;
<input type="reset" value="STARTOVER" style="border:none;color:blue;border-radius:10px;background-color:yellow;cursor:pointer;width:100px;margin:12px 0;">
<input type="hidden" name="temp">
</form>
</center>
</body>
</html>

<?php
			}
			if($t==0)
			{
				echo"the id::$id is not found in the db";
			}
			
		}
	}
	catch(Exception $e)
	{
		echo"$e.getMessage()";
	}
}
else
{
	echo"some of the fields are empty";
}
?>
	

			