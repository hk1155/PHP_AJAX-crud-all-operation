<?php
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

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Import & Export Data</strong>
                                </div>

                                <div class="card-body">
                                    <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                                            <div class="col-md-4">
                                                <input type="file" name="file" id="file" class="input-large">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                                            <div class="col-md-4">
                                                <button type="submit" id="btnimport" onclick="fncheck()" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="singlebutton">Export data</label>
                                            <div class="col-md-4">
                                                <button type="submit" id="submit" name="Export" class="btn btn-success button-loading" data-loading-text="Loading...">Export</button>&nbsp; export tbl_employee table
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                                include_once 'functions.php';
                                get_all_records($con);
                                ?>
                            </div>
                        </div>


                    </div>
                </div><!-- .animated -->
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