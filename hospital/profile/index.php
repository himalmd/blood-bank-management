<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["id-5"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../reg_login.php");
    exit;
}

require_once "../../config.php";
$nic = $_SESSION["id-5"];

//queries
$sql="SELECT * FROM normal_hospital WHERE UserName = '$nic'";
$result= mysqli_query($link,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
    $hospital_name = $row["Name"];
    $address = $row["Address"];
    $district = $row["District"];
    $chief_doctor = $row["Chief"];
    $user_name = $row["UserName"];
    $telephone = $row["Telephone"];
    $telephone2= $row["Telephone2"];
  }
} else {
  echo "0 results";
}

    require_once "../header.php";
?>




<body class="">

    <div class="container-row hospital">

     <?php require_once "../dashboard.php";?>   


        <div class="main"> 

            <?php
                if (isset($_GET['edit']))
                {
                    echo "<p style=\"color:green;\">Update Successfully !!!</p>";
                }
                    
            ?>
            
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100 ver2 m-b-110">

                            <div class="table100-head">
                                <table>
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column4">Topic</th>
                                            <th class="cell100 column5">Content</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                           

                            <div class="table100-body">
                                <table>
                                <tbody>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Hospital Name</td>
                                    <td class="cell100 column5"><?php echo $hospital_name; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Address</td>
                                    <td class="cell100 column5"><?php echo $address; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">District</td>
                                    <td class="cell100 column5"><?php echo $district; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Chief Doctor Name</td>
                                    <td class="cell100 column5"><?php echo $chief_doctor; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">User Name</td>
                                    <td class="cell100 column5"><?php echo $user_name; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Telephone</td>
                                    <td class="cell100 column5"><?php echo $telephone; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Telephone(Optional)</td>
                                    <td class="cell100 column5"><?php echo $telephone2; ?></td>
                                </tr>

                                
                                </tbody>
                                </table>
                            </div>    
                            
                        </div>
                    </div>
                </div>
            </div> 

        
            <div class="form-row" style="margin-left: 25%;">
                <div class="form-group">
                <?php
                    echo "<a class=\"check\" style=\"color: green;\" href=\"edit\" onclick=\"return confirm('Are you sure to Edit?')\">Edit</a>";
                ?>
                </div>
                <div class="form-group">
                <?php
                   echo "<a class=\"check\" style=\"color: red;\" href=\"delete.php\" onclick=\"return confirm('Warning! : This Cannot be undone... If you proceed, your all data will be lost. (cannot be recover)')\">Delete</a>"; 
                ?>
                </div>
            </div> 
                     

        </div>

    </div>



</body>

</html>

