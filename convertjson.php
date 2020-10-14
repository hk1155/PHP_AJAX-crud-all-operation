<?php
ob_start();
session_start();
include_once 'Connection.php';

if(isset($_SESSION['semailadmin']))
{
  
}
else
{
  header('Location:index.php');
}

$query="select * from tbl_employee";
$result=mysqli_query($con,$query);

//$myary= array(array(1,2,3),"hetul","patel");
//echo $myary[1][0];


if($result)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$myary[]=$row;
	}

	// print_r($myary);
	// echo "<br>";echo "<br>";echo "<br>";
	$e=json_encode($myary);
	echo $e;
	echo "<br>";
	echo "<br>";
	
	$d =json_decode($e);
	print_r($d);

	
}
