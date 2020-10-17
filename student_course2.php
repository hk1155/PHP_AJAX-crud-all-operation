<?php

include_once 'Connection.php';
include_once 'session.php';

$select = "SELECT * FROM tbl_user;";
$rs = mysqli_query($con, $select);





function course($con)
{
    $alllist = "SELECT * FROM tbl_course;";
    $rscourse = mysqli_query($con, $alllist);
    $data = "";
    while ($row = mysqli_fetch_assoc($rscourse)) {
        $data .= '<option value="' . $row["cid"] . '">' . $row["course"] . '</option>';
    }
    return $data;
}


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
                        <strong class="card-title">New Admission</strong>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post" class="form-horizontal" id="stcourse">
                            <div class="row form-group">
                                <div class="col-12 col-md-5">
                                    <select name="ddstudent" id="ddstudent" class="form-control">
                                        <option value="">--Select Student--</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($rs)) {
                                        ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo ucfirst($row['name']); ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4">
                                    <a href="add_data" class="btn btn-secondary">Add New Student</a>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="newrow">
                                    <tr>
                                        <td><select name="course[]" id="course" class="form-control" onchange="fngetprice()">
                                                <option value="">--Select Course--</option>
                                                <?php echo course($con); ?>
                                            </select></td>
                                        <td><input type="number" name="price[]" placeholder="Enter Price" id="price" class="form-control name_list" /></td>

                                    </tr>
                                </table>

                            </div>
                            <center>
                                <div class="col col-md-12">
                                    <input type="button" id="btnsavecourse" onclick="fnsavestudentcourse()" class="btn btn-success" name="btnsavecourse" value="Save">
                                </div>

                            </center>

                        </form>
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
    <script>
        function fnsavestudentcourse() {
            // alert('okok');
            var hh = $("#ddstudent").val();
            var c = $("#course").val();
            var p = $("#price").val();
            if (hh == "") {
                alert('Please select The student Name');
                $("#ddstudent").focus();
            } else {

                if (c != "" && p != "") {
                    $.ajax({
                        url: "my_ajax4.php",
                        method: "POST",
                        data: {
                            stid: hh,
                            course: c,
                            price: p
                        },
                        success: function(data) {
                            if (data == 1) {
                                alert('Record Inserted Successfully');
                                $("#ddstudent").val("");
                                $("#course").val("");
                                $("#price").val("");

                            } else if (data == 2) {

                                alert('Course is Exists with Same Student');

                            } else {
                                alert(data);
                            }
                        }
                    });
                } else {
                    alert('Please Enter The Below Fields');
                    $("#course").focus();
                    $("#price").focus();
                }

            }




        }
    </script>
</body>

</html>