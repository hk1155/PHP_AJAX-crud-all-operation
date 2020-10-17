<?php
include_once 'Connection.php';
include_once 'session.php';

$select = "select tbl_stcourse1.fees,tbl_stcourse1.id,tbl_stcourse1.status,tbl_stcourse1.stid,tbl_course.course,tbl_user.name from

tbl_stcourse1 inner join tbl_course on tbl_course.cid=tbl_stcourse1.courseid inner join tbl_user on tbl_user.id=tbl_stcourse1.stid where tbl_stcourse1.stid='" . $_GET['stid'] . "'";
$result = mysqli_query($con, $select);
$result1 = mysqli_query($con, $select);
$temprow = mysqli_fetch_assoc($result1);
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
                        Course List of <strong class="card-title"><?php echo ucfirst($temprow['name']); ?></strong>
                        <a href="student_course2" style="float: right;" class="btn btn-primary">Add Course</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th>Courses</th>
                                    <th>Fees</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['course'] ?></td>
                                        <td><?php echo $row['fees'] ?></td>
                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                            ?>

                                                <div id="toglecat<?php echo $row['id']; ?>"><a href="javascript:void(0)" onclick="fnstatuscourse(<?php echo $row['id']; ?>)"><i class="fa fa-toggle-on" style="color:green;"></i></a></div>
                                            <?php
                                            } else {

                                            ?>
                                                <div id="toglecat<?php echo $row['id']; ?>"><a href="javascript:void(0)" onclick="fnstatuscourse(<?php echo $row['id'];  ?>)"><i class="fa fa-toggle-off" style="color:red;"></i></a></div>
                                            <?php
                                            }
                                            ?>

                                        </td>

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