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
                                        <option value=" ">--Select Student--</option>
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
                                        <td><button type="button" name="add" id="add" onclick="fnstudentcourse()" class="btn btn-success">Add More</button></td>
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
        function fngetprice() {
            var c = $("#course").val();
            // alert(c);
            $.ajax({

                url: 'my_ajax.php',
                method: 'POST',
                data: {
                    courseid: c
                },
                success: function(result) {
                    //alert(result);

                    $("#price").val(result);
                }

            });
        }

        function fnstudentcourse() {
            var i = 0;
            i++;
            $('#newrow').append('<tr id="row' + i + '"><td><select name=course[] id="course" class="form-control"><option value="">--Select Course--</option><?php echo course($con);  ?></select></td><td><input type="number"  name="price[]" placeholder="Enter your Price" id="price" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        }

        function fnsavestudentcourse() {
            // alert('okok');
            $.ajax({
                url: "my_ajax3.php",
                method: "POST",
                data: $('#stcourse').serialize(),
                success: function(data) {
                    alert(data);
                    $('#stcourse')[0].reset();
                    $('#stcourse')[1].reset();
                    $('#stcourse')[2].reset();
                }
            });
        }
    </script>
</body>

</html>