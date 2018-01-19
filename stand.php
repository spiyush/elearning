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
			<div align="right"><span class="bt"><a href="addstand.php">ADD</a></span></div>
			<br />

			<center><h3 class="head">STANDERD</h3></center>


			<center><font color="#CC3300"></font>
			<font color="#CC0033">
				<b>

				</b></font>

 <?php
                     // Include config file
                   
                    require_once 'config.php';
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM std";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Standard </th>";
                                        echo "<th> Standard Name  </th>";
                                        echo "<th> Standard Desc </th>";
                                        echo "<th> Standard Code</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['std_id'] . "</td>";
                                        echo "<td>" . $row['std_name'] . "</td>";
                                        echo "<td>" . $row['std_desc'] . "</td>";
                                        echo "<td>" . $row['std_code'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='viewstand.php?std_id=". $row['std_id'] ."' title='View Record' data-toggle='tooltip'>View | </a>";
                                            echo "<a href='edit_stand.php?std_id=". $row['std_id'] ."' title='Update Record' data-toggle='tooltip'> Edit |</a>";
                                            echo "<a href='deletestand.php?std_id=". $row['std_id'] ."' title='Delete Record' data-toggle='tooltip'> Delete </a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?><b>



	
			</center>
			</div>
			<div id="footer">
				<marquee direction="left" onmouseover="this.stop();" onmouseout="this.start();">Elearning@2018</marquee>
			</div>

		</div>
	</body>

	</html>