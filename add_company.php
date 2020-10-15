<?php
ob_start();
session_start();
include_once 'Connection.php';

if (isset($_SESSION['semailadmin'])) {
    // if((time()-$_SESSION['login_time'])>300)   
    // {
    //     header('Location:logout.php');
    // }
} else {
    header('Location:index.php');
}


function InsertCompany($con)
{
    $status = 1;
    $insert = "INSERT INTO tbl_company(name,status) VALUES('" . $_POST['txtcompany'] . "','" . $status . "');";
    $rs = mysqli_query($con, $insert);

    if ($rs) {
        header('Location:manage_company.php');
    }
}

if (isset($_POST['btnadd'])) {
    InsertCompany($con);
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
                <div class="col-lg-9 sufee-alert alert with-close alert-success alert-dismissible fade show" id="success" style="display: none;">
                    <span class="badge badge-pill badge-success">Success!!</span>
                    Data Save Successfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <center><strong>Add </strong>Company</center>
                        </div>

                        <div class="card-body card-block">

                            <form action="#" method="post" class="form-horizontal" id="fupForm">

                                <div class="row form-group">

                                    <div class="col-12 "><input type="text" id="txtname" required="" name="txtcompany" placeholder="Company Name" class="form-control"><small class="form-text text-muted">
                                            <div id="demoerr" style="color: blue"></div>
                                        </small></div>


                                </div>



                                <center>

                                    <div class="col col-md-12">


                                        <input type="submit" id="btnadd" class="btn btn-success" name="btnadd" value="Save">
                                    </div>

                                </center>

                            </form>
                        </div>
                    </div>
                </div>

                </center>


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