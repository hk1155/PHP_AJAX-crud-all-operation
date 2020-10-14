<?php


include 'Connection.php';

if(isset($_POST['hpid']))  //update the Product Details
{
	$pid=$_POST['hpid'];
	$pname=$_POST['product'];
	$price=$_POST['price'];
	$category=$_POST['category'];
    $desc=$_POST['desc'];
	if($category!=" ")
	{

        $check="select * from tbl_product where product_name='".$pname."' and cat_id='".$category."'";
        $resultcheck=mysqli_query($con,$check);
        $rowproduct=mysqli_fetch_assoc($resultcheck);
        //echo $rowproduct['cat_id'];
        //echo $rowproduct['product_name'];
        //print_r($check);
        //exit();
        if($rowproduct['cat_id']==$category &&$rowproduct['product_name']==$pname)
        {
            echo 3;
        }
        else
        {
    		$update="UPDATE tbl_product SET product_name='".$pname."',price='".$price."',cat_id='".$category."',description='".$desc."' where pid='".$pid."'";
    		$result=mysqli_query($con,$update);

    		if($result)
    		{
    			echo 1;  // Update successfully
    		}
    		else
    		{
    			//echo '0';
    			print_r($update);
    		}
        }
		
	}
	else
	{
		echo '2';  // Select the Category
	}

}

if(isset($_POST['hcatid']))
{
    $category=$_POST['category'];
    $catid=$_POST['hcatid'];

    $select="select * from tbl_category where cat_name='".$category."'";
    $rs=mysqli_query($con,$select);
    $rowcheck=mysqli_fetch_assoc($rs);

    if($rowcheck['cat_name']==$category)
    {
    	echo '2';
    	//Category is Already Exists
    }
    else
    {
    	$upcat="UPDATE tbl_category SET cat_name='".$category."' where catid='".$catid."'";
    	$result=mysqli_query($con,$upcat);

    	if($result)
    	{
    		echo '1';
    	}
    	else
    	{
    		echo '0';

    		//something went wrong
    	}
    }

}

if(isset($_POST['username']))
{

    $name=$_POST['username'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $hid=$_POST['hid'];

    if($city!="")
    {
         $upuser="UPDATE tbl_user set  name='" . $name . "', contact='" . $contact . "',gender='".$gender."',city='".$city."' WHERE id='" .$hid. "'";
        $rsupuser=mysqli_query($con,$upuser);

        if($rsupuser)
        {
           echo 1;
        }
        else
        {
            echo 0;
        }   
    }
    else
    {
        echo 2;
    }
        


}


?>