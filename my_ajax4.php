<?php

include_once 'Connection.php';
$curdate = date('Y-m-d');

if (isset($_POST['stid'])) {
    $stid = $_POST['stid'];
    $course = $_POST['course'];
    $price = $_POST['price'];

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

        $insert = "INSERT INTO tbl_stcourse1(stid,courseid,fees,addon) VALUES('" . $stid . "','" . $course . "','" . $price . "','" . $curdate . "')";
        $result = mysqli_query($con, $insert);

        if ($result) {
            echo '1';
        } else {
            echo $insert;
            //something Went Wrong
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
