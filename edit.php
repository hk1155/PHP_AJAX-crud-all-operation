<?php
ob_start();
session_start();
if (isset($_SESSION['semailadmin'])) {
    // if((time()-$_SESSION['login_time'])>300)   //Session destroy after 5 minutes of Inactivity 5*60=300
    // {
    //     header('Location:logout.php');
    // }
} else {
    header('Location:index.php');
}
include_once 'Connection.php';

$uid = $_GET['uid'];

$select = mysqli_query($con, "SELECT * FROM tbl_user WHERE id='" . $uid . "'");
$row = mysqli_fetch_array($select);



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

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <center><strong>Edit</strong> Customer Details</center>
                        </div>
                        <div class="card-body card-block">

                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="msgerruser" style="display: none;">
                                <span class="badge badge-pill badge-danger">Check!</span>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <form action="#" method="post" class="form-horizontal" id="fmreg">

                                <div class="row form-group">
                                    <input type="hidden" id="hid" name="hid" value="<?php echo $row['id'];  ?>">

                                    <div class="col-12 col-md-12">
                                        <input type="text" id="txtname" id="txtname" name="txtname" onkeyup="fndemo()" value="<?php echo $row['name']; ?>" class="form-control"><small class="form-text text-muted">
                                            <div id="demoerr" style="color: blue"></div>
                                        </small>
                                    </div>


                                </div>
                                <div class="row form-group">
                                    <div class="col-12 col-md-6">
                                        <select name="city" id="city" class="form-control">
                                            <option value="">--Select City--</option>
                                            <option value="surat">Surat</option>
                                            <option value="baroda">Baroda</option>
                                            <option value="mumbai">Mumbai</option>
                                        </select>
                                    </div>

                                    <div class="col col-md-1"><label class=" form-control-label">Gender:</label></div>
                                    <div class="col col-md-5">
                                        <div class="form-check-inline form-check">

                                            <?php
                                            if ($row['gender'] == 'm') {
                                            ?>

                                                <label for="inline-radio1" class="form-check-label ">
                                                    <input type="radio" checked="" name="gender" value="m" id="gender" class="form-check-input">Male
                                                </label> &nbsp;&nbsp;
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio" id="inline-radio2" name="gender" value="f" id="gender" class="form-check-input">Female
                                                </label>

                                            <?php
                                            } else {
                                            ?>
                                                <label for="inline-radio1" class="form-check-label ">
                                                    <input type="radio" name="gender" value="m" id="gender" class="form-check-input">Male
                                                </label> &nbsp;&nbsp;
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio" checked="" name="gender" value="f" id="gender" class="form-check-input">Female
                                                </label>
                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-6"><input type="text" id="txtcontact" maxlength="10" minlength="10" title="Please Enter 10 digit Valid number" name="txtcontact" value="<?php echo $row['contact'] ?>" class="form-control" required=""></div>
                                </div>
                                <center>
                                    <div class="col col-md-12">
                                        <input type="button" onclick="btnUpdateUser()" class="btn btn-primary" name="btnupdate" value="Update">
                                    </div>
                                </center>
                            </form>
                        </div>
                        </center>
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