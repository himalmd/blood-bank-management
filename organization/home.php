<!DOCTYPE html>
<html>
<head>
	<title>Organization - Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body class="">
	<?php
		require('header.php');
	?>
	<div class="container-row organization">
        <?php
			require('sidebar.php');
		?>

        <div class="main">
            <div class="topic clearfix">
            	<div class="opt_1">
            	<button><a href="add-campaign.php">Create Campaign</a></button>
            </div>
            <div class="opt_2">
            	<button><a href="my-campaigns.php">View My Campaigns</a></button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>