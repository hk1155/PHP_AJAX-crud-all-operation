<?php
include_once 'Connection.php';
include_once 'session.php';

$select = "select tbl_user.name,id,tbl_payment.finalamount from tbl_user inner join tbl_payment on tbl_payment.stid=tbl_user.id where tbl_payment.status='pending'";
$rs = mysqli_query($con, $select);
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
                        <strong class="card-title">Credit Student Fees</strong>

                    </div>
                    <div class="card-body">
                        <form action="#" method="post" class="form-horizontal" id="stcourse">
                            <div class="row form-group">
                                <div class="col-12 col-md-3">
                                    <select name="ppstudent" id="ppstudent" onchange="fnstudentfees()" class="form-control">
                                        <option value="">--Select Student--</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($rs)) {
                                        ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo ucfirst($row['name']); ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-md-3">
                                    <input type="number" value="" id="txtfinalamount" readonly placeholder="Total Fees" name="txtfinalamount" class="form-control">
                                </div>
                                <div class="col-12 col-md-3">
                                    <input type="number" id="txtpendingamt" placeholder="Pending Amount" readonly name="txtpendingamt" class="form-control">
                                </div>
                                <div class="col-12 col-md-3">
                                    <input type="number" id="txtreceiveamt" placeholder="Received Amount" name="txtreceiveamt" class="form-control">
                                </div>
                            </div>
                           
                                <center>
                                
                                        <input type="button" id="btnfees" name="btnfees" value="Add Fees" onclick="btnaddfees()" class="form-group btn btn-success">
                                
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