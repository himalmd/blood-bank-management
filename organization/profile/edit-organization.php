<?php
    
require_once "../session.php";

    $nic = $_SESSION["id-4"];

    // queries
    $sql = "SELECT * FROM organization WHERE UserName= '$nic'";
    $result = mysqli_query($link, $sql);

    $sql2 = "SELECT  TelephoneNo FROM organization_telephone WHERE OrgId = '$nic' ORDER BY Flag DESC";
    $result2 = mysqli_query($link, $sql2);
    $count= mysqli_num_rows($result2);

   $telephone= array();
   $telephone[1]="";
    $i=0;
    while ($rows=mysqli_fetch_assoc($result2)) {
    $telephone[$i]= $rows["TelephoneNo"];
    $i++;
    }

    $tel1= $telephone[0];
    $tel2= $telephone[1];

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
        $username = $row["UserName"];
        $orgname = $row["OrganizationName"];
        $president= $row["President"];
        $location = $row["District"];
        $password = $row["Password"];
        $purpose = $row["Purpose"];

        }
    } else {
        echo "Something went wrong while loading...";
    }

    // form submission editing
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // validate username
        if(empty(trim($_POST["username"])))
        {
            $username_err="Please enter a user name";

        }elseif(trim($_POST["username"])=="$nic"){
            $user_name=trim($_POST["username"]);
        }
        else
        {
            //prepare statement
            $sql="SELECT UserName FROM organization WHERE UserName=?";
            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_username);
                //set parameter
                $param_username=trim($_POST["username"]);

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows
                  
                    if(mysqli_stmt_num_rows($stmt)==1)
                    {
                        $username_err="This user name is already taken";
                    }
                    else{
                        $user_name=trim($_POST["username"]);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);


                
            }
        }

        //validate organization name
        if(empty(trim($_POST["orgname"])))
        {
            $org_err="Please enter Organization name";
        }
        else{
            $org_name=trim($_POST["orgname"]);
        }
        //validate location
        if(empty(trim($_POST["location"])))
        {
            $district_err="Please enter the Location";
        }
        else{
            $district=trim($_POST["location"]);
        }
        
        //validate president name
        if(empty(trim($_POST["name"])))
        {
            $president_err="Please enter the President name";
        }
        else{
            $president=trim($_POST["name"]);
        }
        //validate mobile number
        if(empty(trim($_POST["mobile"])))
        {
            $mobile_err="Please enter your Telephone number";
        }
        else{
            $mobile=trim($_POST["mobile"]);
        }

        $purpose= $_POST["purpose"];
        $mobile2= $_POST["mobile2"];

        if (empty($username_err)&& empty($org_err) && empty($district_err) && empty($mobile_err) && empty($president_err)) {
            $sql= "UPDATE organization SET OrganizationName=?, District=?, President=?, UserName=?, Purpose=? WHERE UserName='$nic'";

            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"sssss",$org_name,$district,$president,$param_username,$purpose);
                
                //set parameters
                $param_username=$user_name;

                //update session
                $_SESSION["id-4"]="$user_name";

                //execute the prepare statement
                if(mysqli_stmt_execute($stmt))
                {       $sql1= "UPDATE organization_telephone SET OrgID='$username', TelephoneNo='$mobile' WHERE OrgId='$nic' AND TelephoneNo='$tel1'";
                    if (mysqli_query($link, $sql1)){

                        if ($count==2) {
                            $sql2= "UPDATE organization_telephone SET OrgID='$username', TelephoneNo='$mobile2' WHERE OrgId='$nic' AND TelephoneNo='$tel2'";
                            mysqli_query($link, $sql2);
                        }else {
                            $sql3= "INSERT INTO organization_telephone (OrgId, TelephoneNo) VALUES ('$user_name','$mobile2')";
                            mysqli_query($link, $sql3);
                        }

                    }else{echo "Telephone1 errors";}
                    
                    // Redirect to login page
                    header("location: index?update=ok");
                }
                else{
                    echo "Something went wrong, please try again later2";
                }
                //close statement
                mysqli_stmt_close($stmt);

            }
        }



        // Close connection
        mysqli_close($link);

    }




?>

<?php

    include '../header.php';

?>

<body>
    
    <div class="container-row organization">
        <?php
            require_once "../sidebar.php";
        ?>

        <div class="main clearfix">
            <div class="topic">

            <form action="" method="post">
                <div class="form-row clearfix">
                    <div class="form-group <?php echo (!empty($org_err)) ? 'has-error' : ''; ?>">
                        <label>Organization Name</label>
                        <input type="text" name="orgname" class="form-control" value="<?php echo $orgname; ?>">
                    </div>
                    <div class="form-group <?php echo (!empty($president_err)) ? 'has-error' : ''; ?>">
                        <label>President Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $president; ?>">
                    </div>
                    
                </div>
        
                <div class="form-row">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>User Name</label>
                        <input type="text" name="username" value="<?php echo $username; ?>">  
                           
                    </div>
                    <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                        <label>District</label>
                        <select id="location" name="location" class="form-control">
                                <option value="<?php echo $location; ?>"><?php echo $location; ?></option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticoloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullativu">Mullativu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavniya">Vavniya</option>
                            </select>
                    </div>
                    
                </div>

                <div class="form-row">
                    <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
                        <label>Telephone</label>
                        <input type="number" name="mobile" class="form-control" value="<?php echo $telephone[0]; ?>">
                    </div>
                    <div class="form-group">
                        <label>Telephone2</label>
                        <input type="number" name="mobile2" class="form-control" value="<?php echo $telephone[1]; ?>">
                    </div>
                </div>

                <div class="form-row clearfix">

                    <div class="form-group">
                        <label>Purpose(Optional)</label>
                        <textarea name="purpose" placeholder="  please give a precise description" cols="90" rows="5"><?php echo $purpose; ?>
                        </textarea>
                    </div>    

                    </div>


            <center><input type="submit"  name="Submit"></center>
            <div style="margin-top: : -50px; ">
                <a href="edit-password" style="color: #848484; font-size: 15px;">Edit Password</a>
            </div>

            </form>
          
            
            </div>
            
               
        </div>
    </div>
</body>