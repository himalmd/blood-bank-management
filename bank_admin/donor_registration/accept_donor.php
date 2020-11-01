<?php

    require "../session.php";
    require ('../header.php');
?>
<?php
$id=$volume_table=$nic="";
$bankid=$_SESSION["id-3"];
$date= date("Y-m-d");
putenv("TZ=Asia/Colombo");
$t=time();$time=date('H:i:sa',$t);

$place= $_SESSION['place'];
if (isset($_GET['nic'])) {
    $nic = $_GET['nic'];
}
//query
$sql= "SELECT * FROM donor WHERE nic='$nic'";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
        $firstname = $row["first_name"];
        $lastname = $row["last_name"];
        $dob= $row["dob"];
        $bgroup = $row["bloodgroup"];
        $district = $row["district"];
        $purpose = $row["status"];
        $name= $firstname." ".$lastname;

        }
}else{
    echo "Something went wrong while loading...";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //validate volume
        if(empty(trim($_POST["volume"])))
        {
            $volume_err="empty";
        }
        else{
            $volume=trim($_POST["volume"]);
        }
        //validate blood group
        if(empty(trim($_POST["bgroup"])))
        {
            $bgroup_err="empty";
        }
        else{
            $bgroup=trim($_POST["bgroup"]);
        }
        $valid= $_POST["valid"];
        $purpose= $_POST["case"];

        if (empty($volume_err) && empty($bgroup_err)) {
            $sql2= "UPDATE donor SET bloodgroup='$bgroup', validation='$valid', status='$purpose' WHERE nic='$nic'";
            mysqli_query($link, $sql2);
           if ($place=='hospital') {
                $sql3="INSERT INTO donate_hospital (HospitalID, DonorID, Dates, Tme, Volume) VALUES ('$bankid','$nic','$date','$time','$volume') ";
                mysqli_query($link, $sql3);
                $sql4="SELECT DonorID FROM donor_satisfaction WHERE HospitalID='$bankid' AND DonorID='$nic'";
                    if($result4=mysqli_query($link, $sql4)){
                        $count=mysqli_num_rows($result4);
                        if ($count==0) {
                            $sql5="INSERT INTO donor_satisfaction (DonorID,HospitalID,Satisfaction,Validation) VALUES ('$nic','$bankid','0','$valid')";
                            mysqli_query($link, $sql5);
                        }else{
                            $sql5="UPDATE donor_satisfaction SET Validation='$valid' WHERE HospitalID='$bankid' AND DonorID='$nic'";
                            mysqli_query($link, $sql5);
                        }
                    }
                
            }else{
                $campid=$_SESSION['id'];
                $sql2="INSERT INTO donate_campaign (CampID, DonorID, Volume) VALUES ('$campid','$nic','$volume')";
                mysqli_query($link, $sql2);
           }

           $sql6="SELECT a.Volume AS Volume, a.BloodID AS ID FROM blood_stock a INNER JOIN blood b ON a.BloodID=b.BloodID WHERE a.StockID='$bankid' AND b.Type='$bgroup'";
                $result6=mysqli_query($link, $sql6);
                while($row = mysqli_fetch_assoc($result6)){$volume_table=$row["Volume"];$id=$row["ID"];}
                $temp_volume_int=(int)$volume_table+(int)$volume;
                $sql7="UPDATE blood_stock SET Volume='$temp_volume_int' WHERE BloodID='$id' AND StockID='$bankid'";

                if($result7=mysqli_query($link, $sql7)){
                    header("location: select_donor?add=ok");
                }else{
                    echo "Something went wrong. Cannot Update";
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

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Donor Registration  (<?php echo "$place";?>)</div>
            </div>
            
            <form action="" method="post" style="margin-left: 20px; margin-right: 20px; margin-top: 40px;">
                <div class="form-row">
                    <div class="form-group">
                    <label>NIC</label>
                    <input type="text" name="nic" value="<?php echo $nic; ?>" readonly> 
                    </div>
                    <div class="form-group <?php echo (!empty($bgroup_err)) ? 'has-error' : ''; ?>">
                        <label>Blood Group</label>
                            <select id="bgroup" name="bgroup" class="form-control">
                                <option value="<?php echo $bgroup;?>"><?php echo "$bgroup";?></option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>    
                    </div>
                    <div class="form-group <?php echo (!empty($volume_err)) ? 'has-error' : ''; ?>">
                        <label>Volume (ml)</label>
                        <input type="text" name="volume">
                    </div>
                      
                </div>
                <div class="form-row">
                    <div class="form-group">
                    <label>Full Name</label>    
                    <input type="text" name="name" value="<?php echo $name;?>" readonly>   
                    </div>
                    <div class="form-group">
                    <label>DOB</label>
                    <input type="text" name="dob" value="<?php echo $dob;?>" readonly>     
                    </div>

                    <div class="form-group">
                    <label>District</label>
                    <input type="text" name="dob" value="<?php echo $district;?>" readonly>     
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                    <label>Cases (If Any)</label>
                    <textarea name="case" rows="6" cols="108" style="resize: none;" ><?php echo "$purpose"; ?></textarea>
                    </div><div class="form-group"></div>
                    
                    <div class="form-group">
                     <label>Validation</label>    
                            <select name="valid" class="form-control">
                                <option value="1">Valid</option>
                                <option value="0">InValid</option>
                            </select>  
                    </div>
                    
                </div>
                <center>
                    <input type="submit" name="submit">
                    <a href="select_donor" style="color: #808080; font-size: 15px;">Back</a>
                </center>
            </form>
            
        </div>
    </div>

</body>
</html>

