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
            <div class="form-style-2-heading">Update Admin</div><br>
            <form action="" method="post">
                  <div class="form-row">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo ""; ?>">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo ""; ?>">
                            </div>
                            <div class="form-group">
                                <label>Hospital ID</label>
                                <input type="number" name="id">
                            </div>
            </div>
        
            <div class="form-row">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="first_name" class="form-control" value="<?php echo ""; ?>">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="last_name" class="form-control" value="<?php echo ""; ?>">
                            </div>
            </div>
            <div class="form-group">
                          <label>NIC</label>
                          <input type="text" name="nic" value="<?php echo ""; ?>">  
                           
            </div>

            <div class="form-row">
                <div class="form-group">
                    <input type="submit" style="margin-left: 80px;" value="Update">
                </div>
                <div class="form-group">
                    <input type="submit" style="background-color: red; margin-left: 50px;" value="Delete">
                </div>
            </div>

            </form>
        </div>
            <div style="float: right; margin-top: -290px; margin-right: 20px;" class="clearfix">
                <button onclick="blood_bank_list()">Hospital IDs</button>
            </div> 
    </div>

</body>
</html>