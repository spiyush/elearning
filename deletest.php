<?php 

error_reporting(0);
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);

$id=$_GET['id'];

$a=mysql_query("DELETE FROM sub WHERE id='$id' ");

if($a==TRUE)
{
 header("location:sub.php");
}
else
{
echo "Error ";	
}

?>