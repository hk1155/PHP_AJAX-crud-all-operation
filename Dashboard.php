<?php
include_once 'Connection.php';
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

$jsonData = file_get_contents("https://pomber.github.io/covid19/timeseries.json");
$data = json_decode($jsonData, true);
$total_confirmed = 0;
$total_recovered = 0;
$total_deaths = 0;

foreach ($data as $key => $value) {
    $days_count = count($value) - 1;
    $days_count_prev = $days_count - 1;
}


foreach ($data as $key => $value) {
    $total_confirmed = $total_confirmed + $value[$days_count]['confirmed'];
    $total_recovered = $total_recovered + $value[$days_count]['recovered'];
    $total_deaths = $total_deaths + $value[$days_count]['deaths'];
}

?>
<html>

<head>
    <title>My Admin</title>
    <?php
    include './Head_admin.php';
    ?>
    <script>
        $(document).ready(function() {
            setTimeout(
                function() {
                    //$('#pp').hide();
                    $("#pp").slideUp();


                }, 2500);
        });
    </script>
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
                <?php
                if ($con) {
                ?>
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" id="pp">
                        <span class="badge badge-pill badge-success">Success</span>
                        <?php if (isset($_SESSION['semailadmin'])) {
                            $sid = session_id();
                            echo 'Session id: ' . $sid;
                        }
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                } else {
                ?>

                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Oops!!</span>
                        Connection Problem
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>
                <div class="row">
                    <button id="h1" onclick="demo()">Hide</button>
                    <button id="h1" onclick="demo1()">show</button>
                </div><br>


                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $total_confirmed; ?></span></div>
                                            <div class="stat-heading">Confirmed</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $total_recovered; ?></span></div>
                                            <div class="stat-heading">Recover</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $total_deaths; ?></span></div>
                                            <div class="stat-heading">Deaths</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!--row ends -->

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