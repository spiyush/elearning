<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
	require_once 'config.php';
	 $sql = "SELECT * FROM sub WHERE id = ?";
	 if($stmt = mysqli_prepare($link, $sql))
	 {
		 mysqli_stmt_bind_param($stmt, "i", $param_id);
		 $param_id = trim($_GET["id"]);
		 if(mysqli_stmt_execute($stmt))
		 {
            $result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result) == 1)
			{
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$subid = $row["subid"];
				$stdid = $row["stdid"];
                $subname = $row["subname"];
                } 
				else
				{
					echo 'Sorry, you have made an invalid request.';
					exit();
				}
				}
				else
				{
            		echo "Oops! Something went wrong. Please try again later.";
        		}
				}
				mysqli_stmt_close($stmt);
				mysqli_close($link);
				} 
				else
				{
					echo 'Sorry, you have made an invalid request.';
					exit();
				}	
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

<br />     
<center><font color="#CC3300"></font></center>
<font color="#CC0033">
<b>
<center>
<h1>View Record</h1>
                    <table class="table" cellpadding="10" cellspacing="5" align="center">
                    
                        <tr><td class="label">Subject ID:</td>
                        <td class="output"><p class="output"><?php echo $row["subid"]; ?></p></td></tr>
                    <tr><td class="label">Standard ID:</td>
                         <td class="output"><p class="output"><?php echo $row["stdid"]; ?></p></td></tr>
                        <tr><td class="label">Subject Name:</td>
                        <td class="output"><p class="output"><?php echo $row["subname"]; ?></p></td></tr>
                    </table>
                    <p><a href="sub.php" class="bt">Back</a></p>
                </div>
</center>

 
  </center>
</div>
<div id="footer">
<marquee direction="left" onmouseover="this.stop();" onmouseout="this.start();">Elearning@2018</marquee>
</div>

</div>
</body>

</html>