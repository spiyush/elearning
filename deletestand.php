
<?php
// Process delete operation after confirmation
if(isset($_POST["std_id"]) && !empty($_POST["std_id"])){
// Include config file
  require_once 'config.php';

// Prepare a delete statement
  $sql = "DELETE FROM std WHERE std_id = ?";

  if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);

// Set parameters
    $param_id = trim($_POST["std_id"]);

// Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
// Records deleted successfully. Redirect to landing page
      header("location: stand.php");
      exit();
    } else{
      echo "Oops! Something went wrong. Please try again later.";
    }
  }

// Close statement
  mysqli_stmt_close($stmt);

// Close connection
  mysqli_close($link);
} else{
// Check existence of id parameter
  if(empty(trim($_GET["std_id"]))){
// URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
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
<body bgcolor="#AAAAAA">
	<div id="container">

		<div id="header"><center><br>KIDS LEARNING</center></div>
		<div id="menu">

			<?php include 'adminheader.php';?>

		</div>

		<br/>
		<div id="mainbody"><br /> 
			<center><h3>STANDERD</h3></center>
			<center><font color="#CC3300"></font></center>
			<font color="#CC0033">
				<b>
				  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="std_id" value="<?php echo trim($_GET["std_id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="stand.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>



						</center>
					</div>
					<div id="footer">
						<marquee direction="left" onmouseover="this.stop();" onmouseout="this.start();">elearning@2018</marquee>
					</div>

				</div>
			</body>
			</html>