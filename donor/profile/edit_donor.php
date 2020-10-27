<?php
    require '../session.php';
    require '../header.php';

    // Define variables and initialize with empty values
    $nic_old=$nic =$first_name = $last_name  = $dob = $mobile2 = $addline1 = $addline2 = $mobile = $district = "";
    $nic_err = $first_name_err = $last_name_err = $dob_err  = $addline_err  = $mobile_err = $district_err = "";
    $NIC=$firstname=$lastname=$addressline1=$addressline2="";
    
    $nic_old= $_SESSION["id-1"];

     // queries
    $sql = "SELECT * FROM donor WHERE nic= '$nic_old'";
    $result=mysqli_query($link, $sql);

    $sql2 = "SELECT  TelephoneNo FROM donor_telephone WHERE NIC = '$nic_old' ORDER BY Flag DESC";
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
    
        $firstname = $row["first_name"];
        $lastname = $row["last_name"];
        $dob = $row["dob"];
        $district = $row["district"];
        $addressline1 = $row["addressline1"];
        $addressline2 = $row["addressline2"];
        $NIC= $row["nic"];

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
            $sql="SELECT first_name FROM donor WHERE nic=?";
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
            $sql3="UPDATE donor SET nic='$nic', first_name='$first_name', last_name='$last_name', dob='$dob', district='$district', addressline1='$addline1', addressline2='$addline2' WHERE nic='$nic_old' ";
            if ($result3=mysqli_query($link, $sql3)) {

                    $sql4= "UPDATE donor_telephone SET NIC='$nic',TelephoneNo='$mobile' WHERE NIC='$nic_old' AND TelephoneNo='$tel1' AND Flag='1'";
                    mysqli_query($link, $sql4);
                    if ($count==2){
                        $sql5= "UPDATE donor_telephone SET NIC='$nic',TelephoneNo='$mobile2' WHERE NIC='$nic_old' AND TelephoneNo='$tel2' AND Flag='0'";
                            mysqli_query($link, $sql5);
                        }
                        else{
                        $sql5= "INSERT INTO donor_telephone (NIC, TelephoneNo, Flag) VALUES ('$nic','$mobile2', '0')";
                            mysqli_query($link, $sql5);
                        }

                    $_SESSION["id-1"]= $nic;    

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
        <?php
            require '../dashboard.php';
        ?>

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
                        <select id="location" name="district" class="form-control">
                                <option value="<?php echo $district;?>"><?php echo "$district";?></option>
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
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="number" name="telephone-1" class="form-control" value="<?php echo $tel1; ?>">
                    </div>
                    <div class="form-group">
                        <label>Telephone(Optional)</label>
                        <input type="number" name="telephone-2" class="form-control" value="<?php echo $tel2; ?>">
                    </div>

                    
                </div>

                <center><input type="submit"  name="Submit"></center>
                <div>
                    <a href="edit_password" style="color: #848484; font-size: 15px;">Edit Password</a>
                </div>

            </form>
          

            </div>

               
        </div>
    </div>
</body>