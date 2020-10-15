<?php


include_once 'Connection.php';

$status = '1';
$price = $_POST['price'];
$product = $_POST['product'];
$category = $_POST['category'];
$desc = $_POST['desc'];

$path = "upload/";
$filename = $_FILES['file']['name'];
$tempname = $_FILES['file']['tmp_name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$target = $path . $filename;
$dataimg = $target;
//echo $target;


if ($filetype != 'jpg' && $filetype != 'png' && $filetype != 'jpeg') {
	echo 3;
	//only png jpg or jpeg files allowed
} else {
	$select = "select * from tbl_product where product_name='" . $product . "' and cat_id='" . $category . "'";
	$rs = mysqli_query($con, $select);
	$rowproduct = mysqli_fetch_assoc($rs);

	if ($rowproduct['product_name'] == $product) {
		echo 2; //Product  is Already Exists
	} else {
		$sql = "INSERT INTO tbl_product (product_name,price,cat_id,description,image,status)
	           VALUES ('$product','$price','$category','$desc','$dataimg','$status')";

		if (mysqli_query($con, $sql)) {
			move_uploaded_file($tempname, $target);
			//print_r($sql);
			echo 1;
			// Record saved successfully
		} else {
			//print_r($sql);
			echo 0;
			//Something went wrong
			//print_r($sql);
		}
	}
}
