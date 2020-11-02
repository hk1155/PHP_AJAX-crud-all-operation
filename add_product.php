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


function InsertProduct($con)
{
    $status = 1;
    // $insert="INSERT INTO tbl_product(product_name,price,cat_id,compid,status) VALUES('".$_POST['txtproduct']."','".$_POST['txtprice']."','".$_POST['ddcategory']."','".$_POST['ddcompany']."','".$status."')";

    $insert = "INSERT INTO tbl_product(product_name,price,cat_id,status) VALUES('" . $_POST['txtproduct'] . "','" . $_POST['txtprice'] . "','" . $_POST['ddcategory'] . "','" . $status . "')";

    $rs = mysqli_query($con, $insert);


    if ($rs) {
        header('Location:manage_product.php');
    } else {
        echo 'Something went Wrong';
        exit();
    }
}

if (isset($_POST['btninsert'])) {
    InsertProduct($con);
}


// $select="SELECT * from tbl_company GROUP BY name;";
// $rscomp=mysqli_query($con,$select);

$select = "SELECT * from tbl_category where status='1' GROUP BY cat_name;";
$rscat = mysqli_query($con, $select);

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
                    <div class="col-lg-12 sufee-alert alert with-close alert-danger alert-dismissible fade show" id="errorproduct" style="display: none;">
                        <span class="badge badge-pill badge-danger">Error</span>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card">

                        <div class="card-header">
                            <center><strong>New</strong> Product</center>
                        </div>
                        <div class="card-body card-block">
                            <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal" id="fmreg">


                                <!-- <div class="row form-group">
                                    <div class="col-12 col-md-6">
                                        <select name="ddcompany" id="ddcompany" onchange="fncompany();" class="form-control">
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
                                    </div>

                                    <div class="col-12 col-md-6">
                                            <select name="ddcategory" id="ddcategory" disabled="" class="form-control">
                                                <option value=" ">--Select Category--</option>
                                                
                                            </select>
                                        </div>

                                </div> -->
                        <div class="row form-group">
                            <div class="col-12">
                                <select name="ddcategory" id="ddcategory" class="form-control">
                                    <option value=" ">--Select Category--</option>
                                    <?php

                                    if ($rscat) {
                                        while ($row = mysqli_fetch_assoc($rscat)) {
                                    ?>
                                            <option value="<?php echo $row['catid']; ?>"><?php echo ucfirst($row['cat_name']) ?></option>
                                    <?php
                                        }
                                    }
                                   ?>
                                </select>
                            </div>
                            </div>
                                <div class="row form-group">

                                    <div class="col-12 col-md-6"><input type="text" id="txtproduct" name="txtproduct" placeholder="Product Name or Code" class="form-control"></div>

                                    <div class="col-12 col-md-6"><input type="number" id="txtprice" name="txtprice" placeholder="Price" class="form-control"></div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-12 col-md-12">
                                        <textarea id="txtdesc" placeholder="Product Description" class="form-control"></textarea>
                                    </div>


                                </div>
                                <div class="row form-group">

                                    <div class="col-12 col-md-6">
                                        <input type="file" name="mainimg" id="mainimg" class="form-control">
                                    </div>

                                    <div class="col-12 col-md-6" id="preview">


                                    </div>
                                </div>
                                <hr>



                                <center>

                                    <div class="col col-md-12">


                                        <input type="button" id="btninsert" onclick="InsertProduct()" class="btn btn-success" name="btninsert" value="Add Product">
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