<?php
	require "../session.php";
    require ('../header.php');
?>
<?php
$nic_err=$firstname_err=$lastname_err="";
$firstname=$lastname=$nic="";

    $nics = $_SESSION["id_card3"];
	// queries
    $sql = "SELECT * FROM blood_bank_admin WHERE NIC= '$nics'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
        $firstname = $row["FirstName"];
        $lastname = $row["LastName"];
        $nic= $row["NIC"];

        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	// validate username
        if(empty(trim($_POST["nic"])))
        {
            $nic_err="Please enter a user name";

        }elseif(trim($_POST["nic"])=="$nic"){
            $nic=trim($_POST["nic"]);
        }
        else
        {
            //prepare statement
            $sql="SELECT NIC FROM blood_bank_admin WHERE NIC=?";
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
                  
                    if(mysqli_stmt_num_rows($stmt)==1)
                    {
                        $nic_err="This NIC is already taken";
                    }
                    else{
                        $nic=trim($_POST["nic"]);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);


                
            }
        }

        //validate first name
        if(empty(trim($_POST["firstname"])))
        {
            $firstname_err="Please enter the First name";
        }
        else{
            $firstname=trim($_POST["firstname"]);
        }
        //validate last name
        if(empty(trim($_POST["lastname"])))
        {
            $lastname_err="Please enter the Last Name";
        }
        else{
            $lastname=trim($_POST["lastname"]);
        }

        if (empty($firstname_err)&& empty($lastname_err) && empty($nic_err)){
        	$sql="UPDATE blood_bank_admin SET NIC='$nic',FirstName='$firstname', LastName='$lastname' WHERE NIC= '$nics'";
        	if (mysqli_query($link, $sql)) {
        		$_SESSION["id_card3"]="$nic";
        		// Redirect to home page
            	header("location: index?update=ok");
        	}else{
        		echo "Something went wrong";
        	}
        	
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

        <div class="main clearfix">
            <div class="topic">
            	
            </div>
            
            <center>
            	<form action="" method="post">
            	
                
                    <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                        <span class="help-block" style="font-size: 15px;"><?php echo $firstname_err; ?></span>
                    </div>
                
               
                    <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                        <span class="help-block" style="font-size: 15px;"><?php echo $lastname_err; ?></span>
                    </div>
                
        
                
                    <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                        <label>NIC</label>
                        <input type="text" name="nic" value="<?php echo $nic; ?>">  
                        <span class="help-block" style="font-size: 15px;"><?php echo $nic_err; ?></span>   
                    </div>
                  
                
                
            <input type="submit"  name="Submit">
            <div style="margin-top: : -50px; ">
                <a href="edit_password" style="color: #848484; font-size: 15px;">Edit Password</a>
            </div>

            </form>
            </center>
          
           </div> 
           </div>
            
               
        
    
</body>