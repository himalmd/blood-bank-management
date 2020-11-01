<?php
   require '../session.php';
   require '../header.php';
    
?>
<?php
$nic=$nic_err="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty(trim($_POST["nic"]))) {
                $nic_err="Enter an NIC";
            }else{
                $nic= $_POST['nic'];
                $sql="SELECT FirstName FROM blood_bank_admin WHERE NIC='$nic'";
                $result=mysqli_query($link, $sql);
                $count= mysqli_num_rows($result);
                if ($count!=0) {
                    if (isset($_GET['update'])) {
                        header("Location: update_admin?nic=$nic");
                    }else{
                        header("Location: delete_admin?nic=$nic");
                    }
                    
                }else{
                $nic_err="No Such a an Admin";
                }
            }
            
    }   

    mysqli_close($link);        
?>

<body>
	<div class="container-row admin">
        <?php 
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">Select Admin</div><br>
           
                
                <center>
                <form action="" method="post" style="margin-top: 30px;">
                    
                        <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                        <label>Provide NIC/ID number</label>
                        <input type="text" name="nic" placeholder="NIC">
                        <span class="help-block "><?php echo $nic_err; ?></span>
                        </div>
            
                    <input type="submit" value="Submit">
                    
                </form>
            
               </center>
            

            </div>
        </div>
    </div>

</body>
