<?php
error_reporting(0);
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
 session_start();
if (isset($_POST["login"])) 
{
			
        $user=$_POST['username'];
		$pass=$_POST['password'];
		
		$a=mysql_query("SELECT * FROM admin WHERE ml='$user' AND pas='$pass' ");
		$aa=mysql_num_rows($a);
		if($aa==TRUE)
		{
		   header("location:adminlogin.php");
		}
		else
		{
		    $msg="Incorrect Username or Password";
		}
	}
    
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>   </title>
<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>
<div id="container">

<div id="header"><center><br>KIDS LEARNING</center></div>
<div id="menu">
<ul>
<li><a href="index.php" >HOME</a></li>
<li><a href="preeschool.php">PREESCHOOL</a></li>
<li><a href="preekindegarden.php">PREEKINDEGARDEN</a></li>
<li><a href="kindegarden.php">KINDEGARDEN</a></li>
<li><a href="homeschool.php">HOMESCHOOL</a></li>
<li><a href="aboutus.php">ABOUT US</a></li>
<li><a href="contactus.php">CONTACTUS</a></li>
<li><a href="admin.php">ADMIN</a></li></ul>
</div>
<div id="mainbody">
  <div align="center">
  <br><br><br><br><br>
  <center><span class="label">ADMIN LOGIN FORM</span></center><br>
  <font color="#FFFF00"></font>  <br>
  <font color="#FFFF00"><?php echo $msg;?></font><br>
   <form method="post" action="">
  <table align="center" cellpadding="10" cellspacing="1" class="table">
    <tr><td  class="label">Enter Username:</td>
    <td class="field"><input type="text" placeholder="Username / Email" name="username"/></td></tr>
    <tr><td class="label">Enter Password:</td>
    <td class="field"><input type="password" placeholder="Password" name="password"/></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" name="login" ></td></tr>
    </table>
     </form>
  </div>
</div>  
<div id="footer">
<marquee direction="left" onmouseover="this.stop();" onmouseout="tshis.start();">elearning@2018</marquee>
</div>
</body>
</html>