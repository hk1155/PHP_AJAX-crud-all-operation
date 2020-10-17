<?php
include_once 'Connection.php';
include_once 'session.php';

$query = "select tbl_stcourse1.id as myid,count(course) as number,sum(tbl_stcourse1.fees) as 

total,tbl_user.name,tbl_user.id,tbl_course.course from tbl_user 

inner join tbl_stcourse1 on tbl_user.id=tbl_stcourse1.stid inner join 

tbl_course on tbl_course.cid=tbl_stcourse1.courseid where tbl_stcourse1.status=1 GROUP BY 

tbl_user.name
";

$result = mysqli_query($con, $query);

$query1 = "select tbl_stcourse1.fees,tbl_stcourse1.stid,tbl_course.course from

tbl_stcourse1 inner join tbl_course on tbl_course.cid=tbl_stcourse1.courseid";
$result1 = mysqli_query($con, $query1);
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
                <!-- Model start -->
                <?php
                if (mysqli_num_rows($result1)) {
                    while ($rowcourse = mysqli_fetch_assoc($result1)) {
                ?>
                        <div class="modal fade" id="mycourse_<?php echo $rowcourse['stid'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title">Course Details of:<b> <?php echo ucfirst($rowcourse['stid']); ?></b></h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body;">
                                        <div>&nbsp;
                                            <div>
                                                <table class="table table-striped table-bordered col-md-6">
                                                    <thead>
                                                        <tr>
                                                            <th>Courses</th>
                                                            <th> Fees</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $rowcourse['course']  ?></td>
                                                            <td><?php echo $rowcourse['fees']  ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Model Ends -->
                <?php
                    }
                }

                ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Student Fees Details</strong>
                        <a href="student_course2" style="float: right;" class="btn btn-primary">Add Student Course</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Active Course</th>
                                    <th>Total Fees</th>
                                    <th>Course Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['myid'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['number'] ?>&nbsp;&nbsp;<a href="javascript:void(0);" data-toggle='modal' data-target="#mycourse_<?php echo $row['id']; ?>" style="color: green;">View Course List</a></td>
                                        <td><?php echo $row['total'] ?></td>
                                        <td><a href="course_details?stid=<?php echo $row['id']; ?>">Course details</a></td>
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