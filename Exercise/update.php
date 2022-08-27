<?php

$id=$_POST['upid'];

if(!empty($id))
{
	$t = 0;
	$conn = new mysqli("localhost","root","","practise");
	
	if(mysqli_connect_error())
	{
		die('connection error('.mysqli_connect_errno().')');
	}
	else
	{
		$stmt = $conn->query("select * from raj where id='$id'");
		foreach($stmt as $i)
		{
			$t = 1;
			$gen = $i["gender"];
			$edu = $i["qual"];
			
			?>
			
<html>
<head></head>
<script type="text/javascript">

function val()
{
	var u = document.getElementById("ed").checked;
	var p = document.getElementById("ed2").checked;
	var d = document.getElementById("ed3").checked;
	
	if(u==false && p==false && d==false)
	{
		alert("select the edu");
		return false;
	}
	var text = "";
	if(u==true || p==true || d==true)
	{
		if(u==true)
			text+=" "+document.getElementById("ed").value;
		if(p==true)
			text+=" "+document.getElementById("ed2").value;
		if(d==true)
			text+=" "+document.getElementById("ed3").value;
	}
	document.getElementByName("temp")=text;
	alert(text);
}


</script>
<body>
<form action="abcdupdate.php" method="post" onsubmit="return val();">
<table border="1">
<tr><td>id</td>
<td><input type="text" name="iid" id="pid" value="<?php echo"$i[id]";?>" readonly></td></tr>

<tr><td>name</td>
<td><input type="text" name="na" id="nam" value="<?php echo"$i[name]";?>"></td></tr>

<tr><td>gender</td>
<td><input type="radio" name="gen" id="s1" value="male" <?php if(strstr($gen,"male"))echo"checked";?>>male
<input type="radio" name="gen" id="s2" value="female" <?php if(strstr($gen,"female"))echo"checked";?>>female</td></tr>

<tr><td>educ</td>
<td><input type="checkbox" name="edu" id="ed" value="ug" <?php if(strstr($edu,"ug"))echo"checked";?>>ug
<input type="checkbox" name="edu" id="ed2" value="pg" <?php if(strstr($edu,"pg"))echo"checked";?>>pg
<input type="checkbox" name="edu" id="ed3" value="doc" <?php if(strstr($edu,"doc"))echo"checked";?>>doc</td></tr>

</table>
<br><input type="submit" value="update">
<input type="hidden" name="temp">
</form>
</body>
</html>

<?php

		}
	}
	$stmt->close();
	if($t==0)
	{
		echo"not found";
	}
}
else
{
	echo"some fields are empty";
}
?>







