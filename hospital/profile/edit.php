<?php
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["id-5"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../reg_login.php");
    exit;
}

    //$nic = htmlspecialchars($_SESSION["nic"]);
    require_once "../../config.php";
    
    //variable declaration
    $hosname=$username=$drname=$dis=$add=$data2="";
    
    if(isset($_POST["submit"]))
    {
        
        $data2=$_SESSION['id-5'];
        //echo $data2;

        //prepare statment
        $sql1="SELECT UserName FROM normal_hospital WHERE UserName = ?";
        if($stmt=mysqli_prepare($link,$sql1))
        {
               
        mysqli_stmt_bind_param($stmt,"s",$para_username);
        //set parameters
        $para_username=trim($_POST["username"]);
        //execute the prepare statement
        if(mysqli_stmt_execute($stmt))
        {
            //store the result
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)==1)
            {
                $error="This user name is already taken";
            }
            else
            {
                $username=trim($_POST("username"));
            }
        }
        
        mysqli_stmt_close($stmt);

       }
        
        // validate hospital name
        if(!empty(trim($_POST["hosname"])))
        {
            $hosname=trim($_POST["hosname"]);
        }else{
            $hos_err= "Enter the Hospital Name";
        }
        // validate address
        if(!empty(trim($_POST["address"])))
        {
            $add=trim($_POST["address"]);
        }else{
            $add_err= "Enter the Address";
        }
        // validate District
        if(!empty(trim($_POST["district"])))
        {
            $dis=trim($_POST["district"]);
        }else{
            $dis_err= "Enter the District";
        }
        // validate DrName
        if(!empty(trim($_POST["drname"])))
        {
            $drname=trim($_POST["drname"]);
        }else{
            $drname_err= "Enter the Doctor Name";
        }
        // validate DrName
        if(!empty(trim($_POST["username"])))
        {
            $username=trim($_POST["username"]);
        }else{
            $username_err= "Enter the User Name";
        }
        //prepare update statement
         $sql="UPDATE normal_hospital SET UserName=?, Name=?, Address=?, District=?, Chief=? WHERE UserName='$data2'";
        
         if($stmt=mysqli_prepare($link,$sql))
         {
            mysqli_stmt_bind_param($stmt,"sssss",$param_user,$param_name,$param_add,$param_dis,$param_dr);
            //set parameters
            $param_user=$username;
            $param_name=$hosname;
            $param_add=$add;
            $param_dis=$dis;
            $param_dr=$drname;

            $_SESSION["id-5"]="$username";
            
            //execute prepare statement
            if(mysqli_stmt_execute($stmt))
            {
                header("location: index?edit=ok");  //index?edit=ok
            }
            else{
                echo"something get wrong";
            }
            //close prepare statement
            mysqli_stmt_close($stmt);
         }

    }
    else
    {
        $nic= $_SESSION['id-5'];
        $sql = "SELECT * FROM normal_hospital WHERE UserName= '$nic'";

        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
    
            $hospital_name = $row["Name"];
            $address = $row["Address"];
            $district = $row["District"];
            $chief_doctor = $row["Chief"];
            $user_name = $row["UserName"];
            $telephone = $row["Telephone"];
            $telephone2 = $row["Telephone2"];

            }
        }
        else {
            echo "Something went wrong while loading...";
        }

    }
    //close the db connection
    mysqli_close($link); 

?>

<?php

    include '../header.php';

?>

<body>
    
    <div class="container-row hospital">
        <?php require_once "../dashboard.php";?>

        <div class="main">
            <div class="topic">

            <form action="" method="post"> <!--  echo htmlspecialchars($_SERVER["PHP_SELF"]); -->
                <div class="form-row clearfix">
                    <div class="form-group">
                        <label>Hospital Name</label>
                        <input type="text" name="hosname" class="form-control" value="<?php echo $hospital_name; ?>">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                    </div>
                    <div class="form-group">
                        <label>District</label>
                        <input type="text" name="district" class="form-control" value="<?php echo $district; ?>"> <!-- **** -->
                    </div>
                </div><br>
        
                <div class="form-row">
                    <div class="form-group">
                        <label>Chief Doctor Name</label>
                        <input type="text" name="drname" value="<?php echo $chief_doctor; ?>">  
                           
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user_name; ?>">
                    </div>
                    
                </div><br>

                <div class="form-row">
                    <div class="form-group">
                        <label>Telephone Number</label>
                        <input type="number" name="mobile" class="form-control" value="<?php echo $telephone; ?>">
                    </div>
                    <div class="form-group">
                        <label>Telephone Number</label>
                        <input type="number" name="mobile2" class="form-control" value="<?php echo $telephone2; ?>">
                    </div>
                
                    
                </div>

                <!--
                    <div class="form-row clearfix">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="text" name="addline1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="text" name="addline1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="text" name="addline2" class="form-control">
                    </div>
                    
                </div>
                -->

            <center>
                <label><input type="submit" class="btn btn-primary" value="Submit" name="submit"></label>
                <div style="margin-top: 30px;">
                    <a href="edit_password.php" style="color: #848484; font-size: 15px;">Edit Password</a>
                </div>
            </center>

            </form>
          

            </div>

               
        </div>
    </div>
</body>