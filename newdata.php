<?php

include_once 'try1.php';

if(isset($_POST['btnsubmit']))
{
	echo hke($_POST['txtnumber']);

}


if(isset($_POST['btndec']))
{
	echo hkd($_POST['txtnumber']);

}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Encryption Decryption</title>
</head>
<body>
	<form action="#" method="post">
		<input type="text" name="txtnumber" placeholder="Enter Any Text">
		<input type="submit" name="btnsubmit" value="Encryption">

		<input type="submit" name="btndec" value="Decryption">
	</form>
</body>
</html>