<?php
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["id-5"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../reg_login.php");
    exit;
}
?>

<?php

    include 'header.php';

?>



<body class="">

	<div class="container-row hospital">

<?php
    include 'dashboard.php';
?>



        <div class="main">

            <div class="topic">
                <div class="form-style-2-heading">Home</div>
            </div>

    

        </div>

    </div>



</body>

</html>