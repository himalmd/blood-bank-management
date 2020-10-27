<?php
    require '../session.php';
    include '../header.php';
    
?>

<body>
    
    <div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">Manage Hospitals</div><br>
                <form action="" method="post">
                    <div class="content">
                        <div class="tile">
                            <li><a href="new_hospital.php">Add New Hospitals</a></li>
                        </div>
                        <div class="tile">
                            <li><a href="select_hospital.php">Update Hospital info</a></li>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>