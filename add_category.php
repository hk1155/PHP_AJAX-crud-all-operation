<?php
ob_start();
session_start();
include_once 'Connection.php';

if (isset($_SESSION['semailadmin'])) {
    // if((time()-$_SESSION['login_time'])>300)   //Session destroy after 5 minutes of Inactivity 5*60=300
    // {
    //     header('Location:logout.php');
    // }
} else {
    header('Location:index.php');
}

// $select="SELECT * from tbl_company order BY name;";
// $rscomp=mysqli_query($con,$select);


$selectcat = "SELECT * from tbl_category where status='1'";
$rscat = mysqli_query($con, $selectcat);


$msg = "";
if (isset($_POST['btnadd']) && $_POST['txtcategory'] != "") {
    //echo "reach";
    //exit();
    $status = 1;
    //$insert="INSERT INTO tbl_category(cat_name,cid,status) VALUES('".$_POST['txtcategory']."','".$_POST['ddcompany']."','".$status."');";

    $check = "SELECT cat_name from tbl_category where cat_name='" . $_POST['txtcategory'] . "'";;
    $rscheck = mysqli_query($con, $check);
    $row = mysqli_fetch_assoc($rscheck);

    if ($row['cat_name'] == $_POST['txtcategory']) {
        $msg = "Category is Already Exists";
    } else {
        $insert = "INSERT INTO tbl_category(cat_name,status) VALUES('" . $_POST['txtcategory'] . "','" . $status . "');";
        $rs = mysqli_query($con, $insert);

        if ($rs) {
            header('Location:manage_category.php');
        }
    }
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

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <center><strong>Add </strong>category</center>
                        </div>

                        <div class="card-body card-block">

                            <form action="#" method="post" class="form-horizontal" id="fupForm">

                                <div class="row form-group">


                                    <!--  <div class="col-12">
                                            <select name="ddcompany" id="ddcompany" class="form-control">
                                                <option value=" ">--Select Company--</option>
                                                <?php

                                                if ($rscomp) {
                                                    while ($row = mysqli_fetch_assoc($rscomp)) {
                                                ?>
                                                        <option value="<?php echo $row['cid']; ?>"><?php echo $row['name'] ?></option>
                                                        <?php
                                                    }
                                                }

                                                        ?>
                                            </select>
                                              </div> -->
                                </div>

                                <div class="row form-group">

                                    <div class="col-12">
                                        <input type="checkbox" name="cbcategory" id="cbcat" onchange="fncategory()">
                                        <p style="color: lightgrey">If you want to add old category then click the checkbox and select category</p>

                                        <select name="ddcategory" onchange="fncat()" style="display: none;" id="ddcat" disabled="" class="form-control ddcat">
                                            <option value=" ">--Select Category--</option>
                                            <?php

                                            if ($rscat) {
                                                while ($row2 = mysqli_fetch_assoc($rscat)) {
                                            ?>
                                                    <option value="<?php echo $row2['cat_name']; ?>"><?php echo ucfirst($row2['cat_name']); ?></option>
                                            <?php
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>


                                </div>

                                <div class="row form-group">

                                    <div class="col-12 "><input type="text" id="txtcategory" name="txtcategory" placeholder="category Name" class="form-control"></div>


                                </div>

                                <center>
                                    <p style="color: red;"><?php if ($msg != "") {
                                                                echo ucfirst($msg);
                                                            } ?></p>
                                    <div class="col col-md-12">


                                        <input type="button" id="btnadd" onclick="fncatcheck1()" class="btn btn-success" name="btnadd" value="Add category">
                                    </div>

                                </center>&nbsp;
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="errmsgaddcat" style="display: none;">
                                    <span class="badge badge-pill badge-danger">Success</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="sufee-alert alert with-close alert-success" id="catsuccess" style="display: none;">
                                    <span class="badge badge-pill badge-success">Success!!</span>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
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