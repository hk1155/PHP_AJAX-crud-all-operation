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
                        <strong class="card-title">Here Your Page Name</strong>
                        <a href="#" style="float: right;" class="btn btn-primary">Action Button</a>
                    </div>
                    <div class="card-body">
                        <p>Form or table</p>
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