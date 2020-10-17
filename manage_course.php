<?php

include_once 'session.php';
include_once 'Connection.php';


$all = "SELECT * FROM tbl_course";
$res = mysqli_query($con, $all);


?>
<html>

<head>
    <title>My Admin</title>
    <?php
    include './Head_admin.php';
    ?>
</head>

<body>
    <?php
    include './Left_admin.php';
    ?>
    <div id="right-panel" class="right-panel">
        <?php
        include './Header_admin.php';
        ?>
        <div class="content pb-0">
            <section>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Manage Course</strong>
                        <a href="add_course" style="float: right;" class="btn btn-primary">Add Course</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Course</th>
                                    <th>Fees</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr id="trcourse<?php echo $row['cid'] ?>">
                                        <td><?php echo $row['cid'] ?></td>
                                        <td><?php echo $row['course'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td><a href="javascript:void(0);" onclick="fncoursedelete(<?php echo $row['cid']; ?>)" style="color: red;;">Delete</a></td>
                                    </tr>


                                <?php
                                }
                                ?>


                            </tbody>



                        </table>
                    </div>
                </div>
            </section>
        </div>
        <div class="clearfix"></div>
        <?php
        include './Footer_admin.php';
        ?>
    </div>
    <?php
    include './Script_admin.php';
    ?>
</body>

</html>