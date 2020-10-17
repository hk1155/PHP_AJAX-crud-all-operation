<?php

include_once 'Connection.php';
include_once 'session.php';

$select = "select tbl_payment.*,tbl_user.name from tbl_payment inner join tbl_user on tbl_payment.stid=tbl_user.id";
$result = mysqli_query($con, $select);

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
                        <strong class="card-title">Student Fees</strong>
                        <a href="add_fees" style="float: right;" class="btn btn-primary">Add Student Fees</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Total Fees</th>
                                    <th>received fees</th>
                                    <th>Pending Fees</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($rowpayment = mysqli_fetch_assoc($result)) {

                                    $st = 'completed';
                                    $pa = $rowpayment['finalamount'] - $rowpayment['receivedamount'];
                                    

                                ?>

                                    <tr>
                                        <td><?php echo $rowpayment['pid']; ?></td>
                                        <td><?php echo $rowpayment['name']; ?></td>
                                        <td><?php echo $rowpayment['finalamount']; ?></td>
                                        <td><?php echo $rowpayment['receivedamount']; ?></td>
                                        <td><?php echo $pa; ?></td>
                                        <td><?php echo $rowpayment['status']; ?></td>
                                    </tr>
                                <?php

                                }
                                ?>

                            </tbody>



                        </table>
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