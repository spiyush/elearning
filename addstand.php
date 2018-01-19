
<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
	$input_name = trim($_POST["name"]);
	if(empty($input_name)){
		$name_err = "Please enter a name.";
	} elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
		$name_err = 'Please enter a valid name.';
	} else{
		$name = $input_name;
	}

    // Validate address
	$input_address = trim($_POST["address"]);
	if(empty($input_address)){
		$address_err = 'Please enter an address.';     
	} else{
		$address = $input_address;
	}

    // Validate salary
	$input_salary = trim($_POST["salary"]);
	if(empty($input_salary)){
		$salary_err = "Please enter the salary amount.";     
	} elseif(!ctype_digit($input_salary)){
		$salary_err = 'Please enter a positive integer value.';
	} else{
		$salary = $input_salary;
	}

    // Check input errors before inserting in database
	if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
		$sql = "INSERT INTO std (std_name, std_desc, std_code) VALUES (?, ?, ?)";

		if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);

            // Set parameters
			$param_name = $name;
			$param_address = $address;
			$param_salary = $salary;

            // Attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
				header("location: stand.php");
				exit();
			} else{
				echo "Something went wrong. Please try again later.";
			}
		}

        // Close statement
		mysqli_stmt_close($stmt);
	}

    // Close connection
	mysqli_close($link);
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
			<center><h3 class="label">Standard</h3></center>
			<table cellpadding="10" cellspacing="6" align="center" class="table">

				  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                           <label>Recepie Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                             <label>Recepie Description</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                              <label>Recepie Type (1 - Veg 2 - Non Veg)</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="allrecepie.php" class="btn btn-default">Cancel</a>
                    </form>
			
			</center>
		</div>
		<div id="footer">
			<marquee direction="left" onmouseover="this.stop();" onmouseout="this.start();">Copyright@2017-2018</marquee>
		</div>
	</div>
</body>
</html>