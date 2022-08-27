<?php

$id = $_POST['up'];

if(!empty($id))
{
	try
	{
		$t = 0;	
		$conn = new mysqli("localhost","root","","practise");
		
		if(mysqli_connect_error())
		{
			die('connection error('.mysqli_connect_errno().')');
		}
		else
		{
			$stmt = $conn->query("select * from new where id='$id'");
			foreach($stmt as $i)
			{
				$t = 1;
				$gen = $i["gender"];
				$edu = $i["educ"];
				$num = $i["number"];
			?>
<html>
<head><title>mca</title></head>
<script type="text/javascript">

function val()
{
	var u = document.getElementById("e1").checked;
	var p = document.getElementById("e2").checked;
	var d = document.getElementById("e3").checked;
	
	if(u==false && p==false && d==false)
	{
		alert("select the educ");
	}
	var text = "";
	if(u==true || p==true || d==true)
	{
		if(u==true)
			text+=" "+document.getElementById("e1").value;
		if(p==true)
			text+=" "+document.getElementById("e2").value;
		if(d==true)
			text+=" "+document.getElementById("e3").value;
	}
	document.raj.temp.value=text;
		
}	
</script>
<body bgcolor="plum">
<form name="raj" action="newupdate2.php" method="post" onsubmit="return val();">
<table border="1" cellpadding="10" cellspacing="5">
<tr><td>id</td><td><input type="text" name="pid" id="id" autocomplete="off" value="<?php echo"$i[id]";?>" readonly></td></tr>

<tr><td>gender</td><td><input type="radio" name="sex" id="g1" value="male" <?php if(strstr($gen,"male")) echo"checked";?>>male
<input type="radio" name="sex" id="g2" value="female" <?php if(strstr($gen,"female")) echo"checked";?>>female</td></tr>

<tr><td>educ</td><td><input type="checkbox" name="edu" id="e1" value="ug" <?php if(strstr($edu,"ug")) echo"checked";?>>ug
<input type="checkbox" name="edu" id="e2" value="pg" <?php if(strstr($edu,"pg")) echo"checked";?>>pg
<input type="checkbox" name="edu" id="e3" value="doc" <?php if(strstr($edu,"doc")) echo"checked";?>>doc</td>

<tr><td>number</td><td>
<select name="sel">
<option value="select yours">select yours</option>
<option value="1" <?php if(strstr($num,"1")) echo"selected";?>>1</option>
<option value="2" <?php if(strstr($num,"2")) echo"selected";?>>2</option></td></tr>
</table><br><br>
<input type="submit" value="insert">
<input type="hidden" name="temp">
</form>
</body>
</html>

<?php

			}
			if($t==0)
			{
				echo"the $id is not found";
			}
		}
		$stmt->close();
	}
	catch(Exception $e)
	{
		echo"$e->getMessage()";
	}
}
else
{
	echo"some";
}