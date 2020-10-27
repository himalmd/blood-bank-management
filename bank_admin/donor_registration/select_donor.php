<?php

    require "../session.php";
    require ('../header.php');
?>
<?php
    if (isset($_GET['hospital'])) {
        $_SESSION['place']="hospital";
    }
    if(isset($_GET['campaign'])){
        $_SESSION['place']="campaign";
    }
    $place= $_SESSION['place'];
?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty(trim($_POST['nic']))){

            
            $sql= "SELECT nic FROM donor WHERE nic=?";

         if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_username);
                //set parameter
                $param_username=trim($_POST["nic"]);

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows
                  
                    if(mysqli_stmt_num_rows($stmt)==0)
                    {
                        $nic_err="no account found";
                    }
                    else{
                        $nic=trim($_POST["nic"]);
                        header("location: accept_donor?nic=$nic");
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);

            }

        }else{
            $nic_err="enter nic";
        }
    }

// Close connection
mysqli_close($link);

?>

<body>
	

	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Donor Registration  (<?php echo "$place";?>)</div>
            </div>
            <?php
                if (isset($_GET['add'])) {
                    echo "<center><p style=\"color:green;\">Added Succesfully</p></center>";
                }
            ?>
            <center>
            <form action="" method="post">
                <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>" style="margin-top: 100px;">
                <label style="font-size: 20px;">Enter Donor's NIC</label>
                <input type="text" name="nic">
                </div>
                <input type="submit" name="submit">
            </form>
            <br><br><br>
            <div class="content">
                <a href="index">Select Hospital / Campaign</a>
            </div>
            </center>
        </div>
    </div>

</body>
</html>