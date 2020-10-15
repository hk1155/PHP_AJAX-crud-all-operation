<?php
include 'Connection.php';

$number = count($_POST["name"]);

$x = array_sum($_POST['number']);
$h = json_encode($_POST['name']);


if ($x != "" && $h != null) {
    $sql = "INSERT INTO tbl_name(name,total) VALUES('" . $h . "','" . $x . "')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo 'Data Inserted';
    } else {
        print_r($sql);
    }
} else {
    echo "Please Enter The Field";
}

// if($number > 0)  
//  {  
//       for($i=0; $i<$number; $i++)  
//       {  
//            if(trim($_POST["name"][$i] != ''))  
//            {  
//                 $sql = "INSERT INTO tbl_name(name) VALUES('".mysqli_real_escape_string($con, $_POST["name"][$i])."')";  
//                 mysqli_query($con, $sql);  

               
//            }  
//       }  
     
//       echo "Data Inserted";  
//  }  
//  else  
//  {  
//       echo "Please Enter Name";  
//  }  
