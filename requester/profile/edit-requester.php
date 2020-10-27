<?php
    require_once "../session.php";
    require_once "../header.php";

    $nic_old = $_SESSION["id-2"];

    // queries
    $sql = "SELECT * FROM requestor WHERE NIC = '$nic_old'";
    $result = mysqli_query($link, $sql);

    $sql2 = "SELECT  TelephoneNo FROM requestor_telephone WHERE NIC = '$nic_old' ORDER BY Flag DESC";
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
    
        $firstname = $row["FirstName"];
        $lastname = $row["LastName"];
        $dob = $row["DateOfBirth"];
        $district = $row["District"];
        $addressline1 = $row["Lane1"];
        $addressline2 = $row["Lane2"];
        $NIC= $row["NIC"];

        }
    } else {
        echo "Something went wrong while loading...";
    }


    // form submission editing
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // validate username
        if(empty(trim($_POST["nic"])))
        {
            $nic_err="Please enter the NIC";

        }elseif(trim($_POST["nic"])=="$nic_old"){
            $nic=trim($_POST["nic"]);
        }
        else
        {
            //prepare statement
            $sql="SELECT FirstName FROM requester WHERE NIC=?";
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
        if(empty(trim($_POST["first_name"])))
        {
            $first_name_err="Please enter a first name";
        }
        else{
            $first_name=trim($_POST["first_name"]);
        }
        //validate last name
        if(empty(trim($_POST["last_name"])))
        {
            $last_name_err="Please enter a last name";
        }
        else{
            $last_name=trim($_POST["last_name"]);
        }

        //validate location
        if(empty(trim($_POST["district"])))
        {
            $district_err="Please enter the District";
        }
        else{
            $district=trim($_POST["district"]);
        }
        
        //validate dob
        if(empty(trim($_POST["dob"])))
        {
            $dob_err="Please enter the DOB";
        }
        else{
            $dob=trim($_POST["dob"]);
        }
        //validate telephone number
        if(empty(trim($_POST["telephone-1"])))
        {
            $mobile_err="Please enter your Telephone number";
        }
        else{
            $mobile=trim($_POST["telephone-1"]);
        }
        //validate address
        if(empty(trim($_POST["addline1"])))
        {
            $addline_err="Please enter the Address";
        }
        else{
            $addline1=trim($_POST["addline1"]);
        }

        $addline2= $_POST["addline2"];
        $mobile2= $_POST["telephone-2"];

        if (empty($nic_err) && empty($dob_err) && empty($mobile_err) && empty($district_err) && empty($first_name_err) && empty($last_name_err) && empty($addline_err)) {
            $sql3="UPDATE requestor SET NIC='$nic', FirstName='$first_name', LastName='$last_name', DateOfBirth='$dob', District='$district', Lane1='$addline1', Lane2='$addline2' WHERE NIC='$nic_old' ";
            if ($result3=mysqli_query($link, $sql3)) {

                    $sql4= "UPDATE requestor_telephone SET NIC='$nic',TelephoneNo='$mobile' WHERE NIC='$nic_old' AND TelephoneNo='$tel1' AND Flag='1'";
                    mysqli_query($link, $sql4);
                    if ($count==2){
                        $sql5= "UPDATE requestor_telephone SET NIC='$nic',TelephoneNo='$mobile2' WHERE NIC='$nic_old' AND TelephoneNo='$tel2' AND Flag='0'";
                            mysqli_query($link, $sql5);
                        }
                        else{
                        $sql5= "INSERT INTO requestor_telephone (NIC, TelephoneNo, Flag) VALUES ('$nic','$mobile2', '0')";
                            mysqli_query($link, $sql5);
                        }

                    $_SESSION["id-2"]= $nic;    

                        // Redirect to login page
                    header("location: index?update=ok");

            }else{
                echo "error occured";
            }
        }

// Close connection
mysqli_close($link);
}


?>

<body>
    
    <div class="container-row donor">
        <?php require_once '../sidebar.php'; ?>

        <div class="main">
            <div class="topic">

            <form action="" method="post">
                <div class="form-row clearfix">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $firstname; ?>">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $lastname; ?>">
                    </div>
                    
                </div>
        
                <div class="form-row">
                    <div class="form-group">
                        <label>NIC</label>
                        <input type="text" name="nic" value="<?php echo $NIC; ?>">  
                           
                    </div>
                    <div class="form-group">
                        <label>DOB</label>
                        <input type="date" name="dob" value="<?php echo $dob; ?>">
                    </div>
                </div>

                <div class="form-row clearfix">
                    <div class="form-group">
                        <label>Address Line 1</label>
                        <input type="text" name="addline1" class="form-control" value="<?php echo $addressline1; ?>">
                    </div>
                    <div class="form-group">
                        <label>Address Line 2(Optional)</label>
                        <input type="text" name="addline2" class="form-control" value="<?php echo $addressline2; ?>">
                    </div>
                    
                </div>
                <div class="form-row clearfix">
                    <div class="form-group">
                        <label>District</label>
                        <input type="text" name="district" value="<?php echo $district; ?>">
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="number" name="telephone-1" class="form-control" value="<?php echo $tel1; ?>">
                    </div>
                    <div class="form-group">
                        <label>Telephone(Optional)</label>
                        <input type="number" name="telephone-2" class="form-control" value="<?php echo $tel2; ?>">
                    </div>

                    
                </div>

                <center><label><input type="submit" value="Submit"></label></center>
                <div>
                    <a href="edit-password" style="color: #848484; font-size: 15px;">Edit Password</a>
                </div>

            </form>
          

            </div>

               
        </div>
    </div>
</body>