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
                        <center><strong>Add More</strong> Product</center>

                        <div style="float: right;">
                            <p>Total Price: </p>

                            <a href="decode" style="color: green;">Decode Data</a>
                        </div>
                    </div>
                    <div class="card-body card-block">
                        <form name="add_name" id="add_name">

                            <!-- <div class="row form-group" id="dynamic_field">

                                <div class="col-12 col-md-4"><input type="text" name="name[]" id="name" placeholder="Enter your Name" class="form-control name_list" /></div>

                                <div class="col-12 col-md-4"><input type="number" name="number[]" placeholder="Enter your Price" class="form-control name_list" /></div>

                                <div class="col-12 col-md-4"><button type="button" name="add" id="add" onclick="fnadd()" class="btn btn-success">Add More</button></div>
                            </div> -->
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td><input type="text" name="name[]" id="name" placeholder="Enter your Name" class="form-control name_list" /></td>
                                        <td><input type="number" name="number[]" placeholder="Enter Price" id="price" class="form-control name_list" /></td>
                                        <td><button type="button" name="add" id="add" onclick="fnadd()" class="btn btn-success">Add More</button></td>
                                    </tr>
                                </table>

                            </div>
                            <input type="button" name="submit" onclick="fnfinaladd()" id="submit" class="btn btn-info" value="Submit" />
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
</body>

</html>