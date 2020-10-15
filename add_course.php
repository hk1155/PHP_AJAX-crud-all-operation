<?php
include_once 'session.php';
include_once 'Connection.php';
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
                        <strong class="card-title">New Course</strong>
                    </div>
                    <div class="card-body">
                        <div class="sufee-alert alert with-close  alert-dismissible fade show" style="display: none;" id="msg">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="#" method="post" class="form-horizontal" id="fupForm">
                            <div class="row form-group">

                                <div class="col-12 col-md-6"><input type="text" id="txtcourse" name="txtcourse" placeholder="Enter Course" class="form-control"></div>

                                <div class="col-12 col-md-6"><input type="number" min="0" id="txtprice" name="txtprice" placeholder="Price" class="form-control"></div>
                            </div>
                            <center>
                                <div class="col col-md-12">
                                    <input type="button" id="btnsavecourse" onclick="fnsavecourse()" class="btn btn-success" name="btnsavecourse" value="Save">
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
</body>

</html>