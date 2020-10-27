<?php
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["id-5"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../reg_login.php");
    exit;
}
?>

<?php

    require_once "../header.php";

?>

<body>

	<div class="container-row hospital">

        <?php
            require_once "../dashboard.php";
        ?>



        <div class="main">

            <div class="topic">
                <div class="form-style-2-heading">Search Hospital</div>
            </div>
            <div class="type-check">
                <form action="hospital_result" methood="POST">
                <label for="btype">Enter Blood Type</label>
                <select name="btype" id="btype">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+ </option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <div class="form-group">
                    <label>Enter Volumn</label>
                    <input type="text" name="volume" class="form-control" value="">
                            
                </form>
            
            </div>

        </div>

    </div>



</body>