
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
            <div  class="form-style-2-heading">Manage Admins</div><br>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['reg']=='ok') {
                    echo "<p style=\"color:green; text-align:center;\">Added Successfully !!!</p>";
                }
            ?>
                <form action="" method="post">
                    <div class="content">
                        <div class="tile">
                             <li><a href="new_admin.php" >Add New Admin</a></li>
                         </div>
                        <div class="tile">
                            <li><a href="select_admin.php">Delete Admin</a></li>
                        </div>

                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

</body>
</html>
