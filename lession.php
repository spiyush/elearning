<?php
error_reporting(0);
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);

$a=mysql_query("SELECT * FROM stand");
$aa=mysql_fetch_array($a);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<center><title>KIDS LEARNING</title></center>
<link href="style.css" rel="stylesheet" type="text/css">
    
</head>
<body bgcolor="#AAAAAA">
<div id="container">

<div id="header"><center><br>KIDS LEARNING</center></div>
<div id="menu">

<?php include 'adminheader.php';?>

</div>

<br/>
<div id="mainbody"> <br />
<div align="right"><span class="bt"><a href="addsub.php">ADD</a></span></div>
<br />

<center><h3 class="head">LESSON</h3></center>
     
     
<center><font color="#CC3300"></font></center>
<font color="#CC0033">
<b>

</b></font><table cellpadding="10" cellspacing="6" align="center" class="table">

<body><tr><td  class="label"> Subject ID</td>
<td  class="label">Standard ID</td>

<td  class="label">Subject Name</td>
<td class="label">View</td>
<td class="label">Update</td>
<td class="label">Delete</td>
</tr>


    <?php
	$a=mysql_query("SELECT * FROM sub");
	while($b=mysql_fetch_array($a))
	{
	  echo "<tr><td class='output'>$b[subid]</td><td class='output'>$b[stdid]</td>
	  <td class='output'>$b[subname]</td>
	  <td><a href='viewsub.php?id=$b[id]'>VIEW</td>
	  <td><a href='updatesub.php?id=$b[id]'>UPDATE</td>
	  <td><a href='delete.php?id=$b[id]'>DELETE</td></tr>";	
	}
	?>
</table><b>


 
  </center>
</div>
<div id="footer">
<marquee direction="left" onmouseover="this.stop();" onmouseout="this.start();">Elearning@2018</marquee>
</div>

</div>
</body>

</html>