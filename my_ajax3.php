<?php
include_once 'Connection.php';
$curdate = date('Y-m-d');

$number = count($_POST["course"]);
$stid = $_POST['ddstudent'];
$x = array_sum($_POST['price']);
$h = json_encode($_POST['course']);

if ($stid == "") {

    echo 'Select The Name';
} else {
    if ($x != null && $h != null) {
        $sql = "INSERT INTO tbl_stcourse(stid,course,total,addon) VALUES('" . $stid . "','" . $h . "','" . $x . "','" . $curdate . "')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo 'Data Inserted';
        } else {
            print_r($sql);
        }
    } else {
        echo "Please Enter The Field";
    }
}

