<!DOCTYPE html>
<html>
<head>
	<title>Registration/Login</title>
	<style type="text/css">
		body {
  			background-image: url('img/blood.jpg');
  			background-repeat: no-repeat;
  			background-attachment: fixed;  
  			background-size: cover;
			 }
	</style>
	<script type="text/javascript" src="js/madusanka.js"></script>
</head>
<body style="background-color:#eee;">
	<?php
		require('header.php');
	?>
	<div class="wrapper clearfix">
		<div class="login clearfix">
			<div class="tabslink">
			<ul>
				<li id="tab-1" onclick="show_tab(1)" class="active">Donor</li>
				<li id="tab-2" onclick="show_tab(2)">Requester</li>
				<li id="tab-3" onclick="show_tab(3)">Organization</li>
				<li id="tab-4" onclick="show_tab(4)">Hospital</li>
				<li id="tab-5" onclick="show_tab(5)">Admins</li>
			</ul>
			</div><!--tabslink-->
			<div class="tabcontent">
				<div id="tabcontent-1" class="show">
					<div class="form-style-2">
						<div class="form-style-2-heading">Donor Login</div>
						<form action="" method="post">
							<label for="field1"><span>NIC<span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
							<label for="field5"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>

							<label><span> </span><input type="submit" value="submit" /></label>
						</form>
					</div><!--form-style-2-->
				
				</div><!--tabcontent-1-->
				<div id="tabcontent-2" class="hide">
					<div class="form-style-2">
						<div class="form-style-2-heading">Requester Login</div>
						<form action="" method="post">
							<label for="field1"><span>NIC<span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
							<label for="field5"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>

							<label><span> </span><input type="submit" value="submit" /></label>
						</form>
					</div><!--form-style-2-->

				</div><!--tabcontent-2-->
				<div id="tabcontent-3" class="hide">
					<div class="form-style-2">
						<div class="form-style-2-heading">Organization Login</div>
						<form action="" method="post">
							<label for="field1"><span>User Name<span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
							<label for="field5"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>

							<label><span> </span><input type="submit" value="submit" /></label>
						</form>
					</div><!--form-style-2-->

				</div><!--tabcontent-3-->
				<div id="tabcontent-4" class="hide">
					<div class="form-style-2">
						<div class="form-style-2-heading">Hospital Login</div>
						<form action="" method="post">
							<label for="field1"><span>User Name<span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
							<label for="field5"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>

							<label><span> </span><input type="submit" value="submit" /></label>
						</form>
					</div><!--form-style-2-->

				</div><!--tabcontent-4-->
				<div id="tabcontent-5" class="hide">
					<div class="form-style-2">
						<div class="form-style-2-heading">Admin Login</div>
						<form action="" method="post">
							<label for="field1"><span>NIC<span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
							<label for="field5"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>

							<label><span> </span><input type="submit" value="submit" /></label>
						</form>
					</div><!--form-style-2-->

				</div><!--tabcontent-5-->

			</div><!--tab-content-->

		</div><!--login-->
		<div class="register">
			<center>
				<h2>Registration/Sign Up</h2>
				<div class="donor">
					<button onclick="donor_reg()">Donor</button>
				</div>
				<div class="requester">
					<button onclick="requester_reg()">Requestor</button>
				</div>
				<div class="hospital"> 
					<button onclick="hospital_reg()">Hospital</button>
				</div>
				<div class="organization">
					<button onclick="organization_reg()">Organization</button>
				</div>
			</center>
			
		</div>

	</div><!--wrapper-->

<?php
require('footer.php');
?>
</body>

</html>