<?php

error_reporting(0);
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
if (isset($_POST["register"]))
 {
				$stdid=$_POST['stanid'];
				$subid=$_POST['subjid'];
				$subname=$_POST['subjname'];
				$query=("insert into sub(stdid,subid,subname) VALUES('$stdid','$subid','$subname')");
              		
	//echo $query;
			if(mysql_query($query))
			{		
					$msg= " SucessFully Inserted";
					header("location:sub.php");			
			}
			else
			{
				$msg="Error";
			}
				
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<center><title>KIDS LEARNING</title></center>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
<div id="header"><center><br>KIDS LEARNING</center></div>
<div id="menu">
<?php include 'adminheader.php';?>
</div>
<br/>
<div id="mainbody"> <br />
<center><h3 class="label">SUBJECT</h3></center>
<table cellpadding="10" cellspacing="6" align="center" class="table">
<form class="register-form" method="post" action="">
<tr><td class="label">Subject ID</td><td><input type="text" placeholder="Subject ID" name="subjid" /></td></tr>
<tr><td class="label">Standard Id</td><td><input type="text" placeholder="standard ID" name="stanid" /></td></tr>
<tr><td class="label">Subject Name</td><td><input type="text" placeholder="Subject Name" name="subjname" /></td></tr>
<tr><td align="center"><input type="submit" value="Register" name="register" /></td>
</tr>					
</table>
</center>
</div>
<div id="footer">
<marquee direction="left" onmouseover="this.stop();" onmouseout="this.start();">Copyright@2017-2018</marquee>
</div>
</div>
</body>
</html>