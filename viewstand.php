<?php
// Check existence of id parameter before processing further
if(isset($_GET["std_id"]) && !empty(trim($_GET["std_id"]))){
    // Include config file
    require_once 'config.php';
    
    // Prepare a select statement
    $sql = "SELECT * FROM std WHERE std_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["std_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["std_name"];
                $address = $row["std_desc"];
                $salary = $row["std_code"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
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
                    
                        <tr><td class="label">Standard Name:</td>
                        <td class="output"><p class="output"><?php echo $row["std_name"]; ?></p></td></tr>
                    <tr><td class="label">Standard Description:</td>
                         <td class="output"><p class="output"><?php echo $row["std_desc"]; ?></p></td></tr>
                        <tr><td class="label">Standard Code:</td>
                        <td class="output"><p class="output"><?php echo $row["std_code"]; ?></p></td></tr>
                    </table>
                    <p><a href="stand.php" class="bt">Back</a></p>
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