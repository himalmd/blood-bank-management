
<?php
   require '../session.php';
   require '../header.php';
   
    $hos=$time=$date="";
    $date_err=$time_err=$hos_err="";
//   $nic = htmlspecialchars($_SESSION["nic"]);
    $NIC = $_SESSION["id-1"];

    $today= date("Y-m-d");

        // queries
        $sql = "SELECT HospitalID, Name FROM blood_bank_hospital";
        $result = mysqli_query($link, $sql);    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if date is empty
        if(empty(trim($_POST["date"]))){
            $date_err = "Please enter Date.";
        } else{
            $date = trim($_POST["date"]);
        }

        // Check if time is empty
        if(empty(trim($_POST["time"]))){
            $time_err = "Please enter Time.";
        } else{
            $time = trim($_POST["time"]);
        }

        // Check if hospital id is empty
        if(empty(trim($_POST["hosid"]))){
            $hos_err = "Please enter HospitalID.";
        } else{
            $hos = trim($_POST["hosid"]);
        }

        $sql2 = "SELECT Name FROM blood_bank_hospital WHERE HospitalID='$hos'";
        $result2=mysqli_query($link, $sql2); 
        if (mysqli_num_rows($result2) == 0) {
            $hos_err="There is no such a hospital";
        }
        

        // Validate credentials
        if(empty($date_err) && empty($time_err) && empty($hos_err)){

            $sql2 = "INSERT INTO donor_reservation (DonorID, Dates, Tme, HosID) VALUES (?, ?, ?, ?)";
            if($stmt = mysqli_prepare($link, $sql2)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $date, $time, $hos);
            
            // Set parameters
            $param_username = $NIC;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php?reg=ok");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
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
            <?php
                if (isset($_GET['reg'])) {
                    echo "<center><p style=\"color:green; font-size:20px;\">Appointement Sent Successfully !!!</p></center>";
                }
            ?>

            <div class="topic clearfix">
                 <div class="form-style-2-heading">Donate Blood</div>
            </div>
            
            <form action="" method="post" style="padding-left: 20px;">
                <div class="limiter-2">
                <div class=" donor_calander <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                <label>Date :<input type="date" class="input-field" name="date" min="<?php echo($today);?>" value="" /></label>
                <span class="help-block"><?php echo $date_err; ?></span>
                </div>

                <div class="donor_time <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                <label>Time :<input type="time" class="input-field" name="time"></label>
                <span class="help-block"><?php echo $time_err; ?></span>
                </div>

                <div class="donor_time <?php echo (!empty($hos_err)) ? 'has-error' : ''; ?>">
                <label>Hospital ID :<input type="number" class="input-field" name="hosid" placeholder="H-ID"></label>
                <span class="help-block"><?php echo $hos_err; ?></span>
                </div>
                <br>

                <input type="submit" name="submit" value="Submit">


                </div>
            </form>
            
            <div style="float: right; width: 60%">
                <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column6">H-ID</th>
                            <th class="cell100 column7">Hospital Name</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
    
                                    $id = $row["HospitalID"];
                                    $hosname = $row["Name"];

                                echo "<tr class='row100 body'><td class='cell100 column6'>".$id."</td>";
                                echo "<td class='cell100 column7'>".$hosname."</td></tr>";

                                }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                </div>
                    
                    
            </div>


        </div>

    </div>



</body>
