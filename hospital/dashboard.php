<!DOCTYPE html>
<html>
<body>
	<div class="dashboard-side">

            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>

            <form method="post">

            <div class="contain">

            	<?php
            		$uri = $_SERVER['REQUEST_URI'];
					//echo $uri;
            	?>

    <li><a href="https://himal.dev/bloodbank/hospital/index" <?php if (strpos($uri, '/hospital/index')){ echo "class= \"active\" "; }?>  >Home</a></li>
 	<li><a href="https://himal.dev/bloodbank/hospital/search_hospital/index" <?php if (strpos($uri, '/hospital/search_hospital')){ echo "class= \"active\" "; }?>  >Search hospital</a></li>

    <li><a href="https://himal.dev/bloodbank/hospital/profile/index" <?php if (strpos($uri, '/hospital/profile')){ echo "class= \"active\" "; }?>  >Profile</a></li>

    <li><a href="https://himal.dev/bloodbank/hospital/view_report/index" <?php if (strpos($uri, '/hospital/view_report')){ echo "class= \"active\" "; }?>  >View Report</a></li>

               

            </div>

            </form>



        </div>
</body>
</html>