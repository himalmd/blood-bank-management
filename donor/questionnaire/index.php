<?php
require '../session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Questionnaire</title>
	<style type="text/css">
	.question {
    text-align: center;
    width: 70%;
    margin-top: 20px;
    margin-bottom: 10px;
    background-color: #CED8F6;
	}
	.question p {
    font-size: 20px;
	}
	label{
		font-size: 20px;
	}

	</style>
</head>
<body>
	<center>
		<a href="index"><p style="font-size: 60px;"><b>Questionnaire</b></p></a>
		<?php
			if (isset($_GET['result'])) {
				$mark=$_GET['result'];
				if ($mark==100) {
					echo "<center><h2 style=\"color:green;\">".$mark." %</h2></center>";
					echo "<center><p style=\"color:green;\">You are Capable to Donate</p></center><br>";
				}else{
					echo "<center><h2 style=\"color:red;\">".$mark." %</h2></center>";
					echo "<center><p style=\"color:red;\">Sorry!!! You are not Capable to Donate due to some failures</p></center><br>";
				}
			}
		?>
		<form action="result.php" method="post">
		<div class="question">

		<h2>Genaral Medical Question</h2>

		<p>Do you have Diabetes ? </p>

		<input type="radio" name="q1" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q1" value="No"><label><b> No</b></label>

	</div>

	<div class="question">

		<h2>Genaral Medical Question</h2>

		<p>Have you ever had cancer ? </p>

		<input type="radio" name="q2" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q2" value="No"><label><b> No</b></label>

	</div>

	<div class="question">

		<h2>General Medical Question</h2>

		<p>Have you ever had kidney or blood problems ?</p>

		<input type="radio" name="q3" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q3" value="No"><label><b> No</b></label>

	</div>

	<div class="question">

		<h2>Life Style Question</h2>

		<p>In the last 3 months have you had a tattoo ?</p>

		<input type="radio" name="q4" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q4" value="No"><label><b> No</b></label>

	</div>

	<div class="question">

		<h2>Life Style Question</h2>

		<p>Are you suffering from a social-deceases ?</p>

		<input type="radio" name="q5" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q5" value="No"><label><b> No</b></label>

	</div>
	<input type="submit" name="Submit" style="width: 200px; height: 60px; margin-top: 20px; margin-bottom: 20px;">
	</form>
	<div style="margin-bottom: 60px;"><a href="../index" style="font-size: 20px;"> Back</a></div>
	</center>
</body>
</html>