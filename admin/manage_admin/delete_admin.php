<?php
    require '../session.php';
    require '../header.php';
?>
<?php
    $nic=$id=$hos_err="";
    if (isset($_GET['nic'])) {
        $nic= $_GET['nic'];
        $sql= "SELECT * FROM blood_bank_admin WHERE NIC='$nic'";
        $result=mysqli_query($link, $sql);
        while ($row=mysqli_fetch_assoc($result)) {
            $first= $row["FirstName"];
            $last= $row["LastName"];
            $nic= $row["NIC"];
            $hosid= $row["BloodBankID"];
        }
    }else{
        if (isset($_GET['delnic'])) { $nic= $_GET['delnic']; }
        $sql= "DELETE FROM blood_bank_admin WHERE NIC='$nic'";
        if ($result=mysqli_query($link, $sql)) {
            header("Location: index?del=ok");
        }else{
            echo "Unable to delete";
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (trim(empty($_POST['id']))) {
            $hos_err= "plz enter hospital id";
        }else{
            $hosid= $_POST['id'];
            $sql2= "SELECT Name FROM blood_bank_hospital WHERE HospitalID='$hosid'";
            $result2=mysqli_query($link, $sql2);
                $count= mysqli_num_rows($result2);
                if ($count==0) {$hos_err="No Such a Hospital";}

                if (empty($hos_err)) {
                    $sql3= "UPDATE blood_bank_admin SET BloodBankID='$hosid' WHERE NIC='$nic'";
                    mysqli_query($link, $sql3);
                    header("Location: index?update=ok");
                }
                
        }
        
    }
// Close connection
mysqli_close($link);
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
                                <input type="text" name="first_name" class="form-control" value="<?php echo $first; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo $last; ?>" readonly>
                            </div>
                            
                        </div>
        
            
                        <div class="form-row">
                            <div class="form-group">
                                <label>NIC</label>
                                <input type="text" name="nic" value="<?php echo $nic; ?>" readonly>  
                           
                            </div>
                            <div class="form-group">
                                <label>Hospital ID</label>
                                <input type="number" name="id" value="<?php echo $hosid; ?>" readonly>
                            </div>
                        </div>    
                    
                    </form>
                <center>
                    <br><a class="has-error" href="<?php echo "delete_admin?delnic=$nic";?>" onclick="return confirm();" >Delete</a>
                </center>    
                    
                    
            </div>

                    
        
        </div>
            
    </div>

</body>