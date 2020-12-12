<?php include 'includes/db.php';
	$match = '';
	if(isset($_POST['submit_user'])){
		
		if($_POST['password'] == $_POST['con_password']){
			$date = date('Y-m-d h:i:s');
			$ins_sql = "INSERT INTO users (role, user_f_name, user_l_name, user_email, user_password, user_gender, user_marital_status, user_phone_no, user_designation, user_website, user_address, user_about_me, user_date) VALUES ('subscriber', '$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', '$_POST[password]', '$_POST[gender]', '$_POST[marital_status]', '$_POST[phone_no]', '$_POST[designation]', '$_POST[website]', '$_POST[address]', '$_POST[about_me]', '$date')";
			$run_sql = mysqli_query($conn,$ins_sql);
		}else {
			$match = '<div class="alert alert-danger">Password doesn&apos;t match!</div>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CMS System</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../js/jquery.js"></script>
	</head>
	<body>
		<?php include 'includes/header.php';?>
		<div class="container">
			<article class="row">
				<section class="col-lg-8">
					<div class="page-header">
						<h2>Registration Form</h2>
					</div>
					<?php echo $match; ?>
					<form class="form-horizontal" action="registration.php" method="post" role="form">
						<div class="form-group">
							<label for="first_name" class="col-sm-3 control-label">First Name *</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="first_name" placeholder="Insert your Name" id="first_name" required>
							</div>
						</div>
						<div class="form-group">
							<label for="last_name" class="col-sm-3 control-label">Last Name *</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="last_name" placeholder="Insert your Name" id="last_name" required>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">Email Address *</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" name="email" placeholder="Email Address" id="email" required>
							</div>
						</div>
						<div class="form-group">
							<label for="passsword" class="col-sm-3 control-label">Password *</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="password" placeholder="Insert a password" id="password" required>
							</div>
						</div>
						<div class="form-group">
							<label for="con_passsword" class="col-sm-3 control-label"> Confirm Password *</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="con_password" placeholder="Confirm password" id="con_password" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="gender" class="col-sm-3 control-label"> Gender *</label>
							<div class="col-sm-3">
								<select class="form-control" name="gender" id="gender" required>
									<option value="">Select Gender</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>
						
							<label for="marital_status" class="col-sm-2 control-label"> Marital Status</label>
							<div class="col-sm-3">
								<select class="form-control" name="marital_status" id="marital_status">
									<option value="">Select Status</option>
									<option value="single">Single</option>
									<option value="married">Married</option>
									<option value="divorced">Divorced</option>
									<option value="other">Other</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="phone_no" class="col-sm-3 control-label"> Phone No: *</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Insert Your Contact No." id="con_password" required>
							</div>
						</div>
						<div class="form-group">
							<label for="designation" class="col-sm-3 control-label"> Designation:</label>
							<div class="col-sm-8">
								<input type="text" name="designation" class="form-control" name="designation" placeholder="Insert your Designation" id="con_password">
							</div>
						</div>
						<div class="form-group">
							<label for="website" class="col-sm-3 control-label"> Official Website:</label>
							<div class="col-sm-8">
								<input type="text" id="website" class="form-control" name="website" placeholder="Insert your Official Website" id="con_password">
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-sm-3 control-label"> Address:</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="address" id="address" rows="2"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="about_me" class="col-sm-3 control-label"> About me: *</label>
							<div class="col-sm-8">
								<textarea id="about_me" name="about_me" class="form-control" rows="6" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"></label>
							<div class="col-sm-8">
								<input type="submit" value="Register Yourself" name="submit_user" class="btn btn-block btn-danger" id="subject">
							</div>
						</div>
					</form>
					
				</section>
				<?php include 'includes/sidebar.php';?>
			</article>
		</div>
		<div style="width:50px;height:50px;"></div>
		<?php include 'includes/footer.php';?>
	</body>
</html>