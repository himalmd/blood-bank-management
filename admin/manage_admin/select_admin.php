<?php
   require '../session.php';
   require '../header.php';
    
?>


<body>
	<div class="container-row admin">
        <?php 
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">Select Admin</div><br>
            <div class="limiter-2">
            <form action="update_admin.php" method="post">
                <div class="form-group">
                    <label>Provide NIC/ID number</label>
                    <input type="text" name="nic" placeholder="NIC">
                </div>
            
            <label><span> </span><input type="submit" value="Submit" /></label>
            </form>
            </div>

            </div>
        </div>
    </div>

</body>
