<?php

include_once 'Connection.php';
$curdate = date('Y-m-d');

if (isset($_POST['stid'])) {
    $stid = $_POST['stid'];
    $course = $_POST['course'];
    $price = $_POST['price'];
    $status = 1;
    $ra = 0;
    $paymentstatus = 'pending';
    $check = "SELECT * FROM tbl_stcourse1 WHERE stid='" . $stid . "' and courseid='" . $course . "'";
    $rscheck = mysqli_query($con, $check);
    $row = mysqli_fetch_assoc($rscheck);
    //echo $row['course'];
    //print_r($check);
    //exit();

    if ($row['stid'] == $stid && $row['courseid'] == $course) {
        echo 2;
        //course is already exists with same student
    } else {

        $insert = "INSERT INTO tbl_stcourse1(stid,courseid,fees,status,addon) VALUES('" . $stid . "','" . $course . "','" . $price . "','" . $status . "','" . $curdate . "')";
        $result = mysqli_query($con, $insert);
        if ($result) {

            $check = "SELECT * FROM tbl_payment where stid='" . $stid . "'";
            $resultcheck = mysqli_query($con, $check);
            $rowcheck = mysqli_fetch_assoc($resultcheck);

            if ($rowcheck['stid'] == $stid) {

                $final = $rowcheck['finalamount'];
                $pending = $rowcheck['pendingamount'];
                $total = $final + $price;
                $pn = $pending + $price;
                $payment = "UPDATE tbl_payment SET finalamount='" . $total . "',pendingamount='" . $pn . "' WHERE stid='" . $stid . "'";
                $resultpayment = mysqli_query($con, $payment);
            } else {
                $payment = "INSERT INTO tbl_payment(stid,finalamount,receivedamount,pendingamount,status) VALUES('" . $stid . "','" . $price . "','" . $ra . "','" . $price . "','" . $paymentstatus . "')";
                $resultpayment = mysqli_query($con, $payment);
            }
            if ($resultpayment) {
                echo 1;
            } else {
                echo $insertpayment;
            }
        }
    }
}

if (isset($_POST['corid'])) {
    $delete = "DELETE FROM tbl_course WHERE cid='" . $_POST['corid'] . "'";
    $result = mysqli_query($con, $delete);

    if ($result) {
        echo 1;
    } else {
        echo $delete;
        //Something Went Wrong
    }
}
