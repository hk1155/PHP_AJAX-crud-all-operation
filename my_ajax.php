<?php

ob_start();
session_start();
include 'Connection.php';

require 'PHPMailerAutoload.php';
require 'credentials.php';


//================================================================================================================
if (isset($_POST['tempid']))   //Display the Employee data in table Format
{
	$sql = "SELECT * FROM tbl_employee";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
?>
			<tr id="trid_<?php echo $row['id'] ?>">
				<td><?php echo $row['name']; ?></td>
				<td><?= $row['email']; ?></td>
				<td><?= $row['phone']; ?></td>
				<td><?= $row['city']; ?></td>
				<td><a href="javascript:void(0);" onclick="fndelete(<?php echo $row['id']; ?>);" class="delete" style="color:red;"><i class="fa fa-trash" style="color:red;"></i></a>&nbsp;&nbsp;

					<!-- <a href="update2.php?u2id=<?php echo $row['id']  ?>" class="update" style="color:	blue;"><i class="fa fa-edit" style="color:blue;"></i></a> -->

				</td>


				</td>

			</tr>
<?php
		}
	}
}


//==========================================================================================
if (isset($_POST['emcheck'])) // Check the Email Exists or Not
{
	$email = $_POST['emcheck'];

	$sql = "SELECT * FROM tbl_user where email='" . $email . "'";
	$res = mysqli_query($con, $sql);

	if (mysqli_num_rows($res)) {
		echo "Email is Already Exists!!!";
	} else {
	}
}

//========================================================
if (isset($_POST['name']))   // new employee Record
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$status = $_POST['status'];
	$sql = "INSERT INTO `tbl_employee`( `name`, `email`, `phone`, `city`,`status`) 
	VALUES ('$name','$email','$phone','$city','$status')";
	if (mysqli_query($con, $sql)) {
		//echo json_encode(array("statusCode"=>200));
		echo '1';
		//print_r($sql);
	} else {
		echo '0';
		//print_r($sql);
		//echo json_encode(array("statusCode"=>201));
	}
}

if (isset($_POST['namedata']))    //New User records Insert
{
	$rand = rand(1000, 9999);
	$status = 1;
	$name = $_POST['namedata'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	$select = "select * from tbl_user where email='" . $email . "'";
	$rs = mysqli_query($con, $select);
	$rowuser = mysqli_fetch_assoc($rs);

	if ($rowuser['email'] == $email) {
		echo "2"; //User is Already Exists
	} else {
		if ($password == $cpassword) {

			$url = "www.way2sms.com/api/v1/sendCampaign";
			$motp = urlencode($rand);
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_POST, 1); // set post data to true
			curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=HVUT6FRQ85O0BZIEDCI9PAAMLSHR3XPM&secret=JHI7L0XL0O44CFVW&usetype=stage&phone=$contact&senderid=02McCu&message=[$motp]");
			// query parameter values must be given without squarebrackets.
			// Optional Authentication:
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec($curl);
			curl_close($curl);
			//echo $result;

			$mail = new PHPMailer;

			// $mail->SMTPDebug = 4;          // Enable verbose debug output

			$mail->isSMTP();                  //Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;          // Enable SMTP authentication
			$mail->Username = EMAIL;         // SMTP username it comes from credentials file
			$mail->Password = PASS;         // SMTP password
			$mail->SMTPSecure = 'tls';     // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;              // TCP port to connect to

			$mail->setFrom(EMAIL, 'Registration ');
			$mail->addAddress($email);     // Add a recipient

			$mail->addReplyTo(EMAIL);
			// print_r($_FILES['file']); exit;
			/* for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
                  $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);     Optional name
                  } */
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Customer Registration';
			$mail->Body = $name . ' Your OTP is: ' . $rand;
			$mail->AltBody = 'this is body';

			if (!$mail->send()) {

				echo 4; // Mail send Unseccessfull
				//echo 'Message could not be sent.';
				// echo 'Mailer Error: ' . $mail->ErrorInfo;
				// $msg.='<div class="alert alert-danger">
				//  <strong>Warning!</strong> Mail could not be sent.'.$mail->ErrorInfo;
				//     '</div>';
			} else {
				//echo 'Message has been sent';

				$sql = "INSERT INTO tbl_user (name,contact,gender,city,email,password,status)
			           VALUES ('$name','$contact','$gender','$city','$email','$cpassword','$status')";

				if (mysqli_query($con, $sql)) {
					//echo $rand;
					echo 1;
					// Record saved successfully
				} else {
					echo "0";
				}
			}
		} else {
			echo "3";  //Password is Not Matched to conform Password
		}
	}
}

//=======================================================

if (isset($_POST['did'])) {    //delete employee on manage employee page
	$delete = "DELETE FROM tbl_employee WHERE id='" . $_POST['did'] . "'";
	$rp = mysqli_query($con, $delete);

	if ($rp) {
		echo 1;
	} else {
		echo "not";
	}
}


if (isset($_POST['catdid']))   //Delete Category
{
	$did = $_POST['catdid'];

	$delete = "DELETE FROM tbl_category WHERE catid='" . $did . "'";
	$rsdelete = mysqli_query($con, $delete);

	if ($rsdelete) {
		echo 1;
	} else {
		echo 0;
	}
}


if (isset($_POST['prodid']))   //Delete product
{
	$prid = $_POST['prodid'];
	$delete = "DELETE FROM tbl_product WHERE pid='" . $prid . "'";
	$rsdelete = mysqli_query($con, $delete);

	if ($rsdelete) {
		echo 1;
	} else {
		echo 0;
	}
}
//==============================================================
if (isset($_POST['compid']))   // Dropdown in product page onchange event
{
	$data = [];
	$cid = $_POST['compid'];
	$select = "SELECT * FROM tbl_category WHERE cid='" . $_POST['compid'] . "'";
	$rs = mysqli_query($con, $select);

	if (mysqli_num_rows($rs) > 0) {
		while ($row = mysqli_fetch_assoc($rs)) {
			$catname = $row['cat_name'];
			$x = substr($catname, 0, 3);
			//$data='<option value="' . $row['catid'] . '">' . $row['cat_name'] . '</option>';
			$data['category'][] = '<option value="' . $row['catid'] . '">' . $catname . '</option>';
			$data['product'] = $x;
		}

		echo json_encode($data, TRUE);
	} else {
		echo 'Something went Wrong';
	}
}

//====================toggle Code=====================================================

if (isset($_POST['cid']))  //User table toggle
{
	$data = "";
	$cid = $_POST['cid'];

	$select = "SELECT * FROM tbl_user where id='" . $cid . "'";
	$resultselect = mysqli_query($con, $select);
	$row = mysqli_fetch_assoc($resultselect);
	//echo $row['status'];

	if ($row['status'] == 1) {
		$up = "UPDATE tbl_user SET status='0' where id='" . $cid . "'";
	} else {
		$up = "UPDATE tbl_user SET status='1' where id='" . $cid . "'";
	}
	$rsup = mysqli_query($con, $up);

	if ($rsup) {
		$select2 = "SELECT * FROM tbl_user where id='" . $cid . "'";
		$rs2 = mysqli_query($con, $select2);
		$row2 = mysqli_fetch_assoc($rs2);
		//echo $row2['status'];

		if ($row2['status'] == 1) {
			$data = "<div><a href='javascript:void(0);' onclick='fnactive(\"" . $row2['id'] . "\");'  style='color:green;'><i class='fa fa-toggle-on'></i></a></div>";
		} else {
			$data = "<div><a href='javascript:void(0);' onclick='fnactive(\"" . $row2['id'] . "\");'  style='color:red;'><i class='fa fa-toggle-off'></i></a></div>";
		}

		echo $data;
	} else {
		echo "Notupdate";
	}
}


if (isset($_POST['catid']))    //category Toggle
{
	$catid = $_POST['catid'];
	$catdata = "";

	$check = "SELECT * FROM tbl_category where catid='" . $catid . "'";
	$rscheck = mysqli_query($con, $check);
	$rowcat = mysqli_fetch_assoc($rscheck);

	if ($rowcat['status'] == 1) {
		$upcat = "UPDATE tbl_category SET status='0' WHERE catid='" . $catid . "'";
	} else {
		$upcat = "UPDATE tbl_category SET status='1' WHERE catid='" . $catid . "'";
	}

	$rsupcat = mysqli_query($con, $upcat);

	if ($rsupcat) {
		$select = "SELECT * FROM tbl_category WHERE catid='" . $catid . "'";
		$rselect = mysqli_query($con, $select);
		$rowcat2 = mysqli_fetch_assoc($rselect);

		if ($rowcat2['status'] == 1) {
			$data = "<div><a href='javascript:void(0);' onclick='fnactivecat(\"" . $rowcat2['catid'] . "\");'  style='color:green;'><i class='fa fa-toggle-on'></i></a></div>";
		} else {
			$data = "<div><a href='javascript:void(0);' onclick='fnactivecat(\"" . $rowcat2['catid'] . "\");'  style='color:red;'><i class='fa fa-toggle-off'></i></a></div>";
		}

		echo $data;
	} else {
		echo '0';
	}
}

if (isset($_POST['emailadmin']))    //Admin Login 
{
	$email = $_POST['emailadmin'];
	$password = $_POST['password'];

	$dpassword = md5($password);
	$query = "select * from tbl_user where email='" . $email . "' and password='" . $dpassword . "'";
	$result = mysqli_query($con, $query);

	if (mysqli_num_rows($result) > 0) {

		$query2 = "SELECT * FROM tbl_user where email='" . $email . "'";
		$rs2 = mysqli_query($con, $query2);
		$row = mysqli_fetch_assoc($rs2);

		if ($row['status'] == 0) {

			echo 2;
			//$msg="Your Id is Not Active";            
		} else {
			$_SESSION['semailadmin'] = $email;
			$_SESSION['spwdadmin'] = $password;
			$_SESSION['sname'] = $row['name'];
			$_SESSION['login_time'] = time();
			echo 1;
			//header('Location:dashboard.php');
		}
	} else {
		echo 0;
	}
}

if (isset($_POST['catadd'])) {
	$cat = $_POST['catadd'];
	$status = 1;
	$check = "SELECT cat_name from tbl_category where cat_name='" . $cat . "'";;
	$rscheck = mysqli_query($con, $check);
	$row = mysqli_fetch_assoc($rscheck);

	if ($row['cat_name'] == $cat) {
		echo 2;
		//category is already exists

	} else {
		if ($cat != "") {
			$insert = "INSERT INTO tbl_category(cat_name,status) VALUES('" . $cat . "','" . $status . "');";
			$rs = mysqli_query($con, $insert);

			if ($rs) {
				echo 1;
				//inserted successfully
			} else {
				echo 0;
				//something went wrong
			}
		} else {
			echo 3;
			//check and try
		}
	}
}


if (isset($_POST['tempj'])) {
	$url = "https://jsonplaceholder.typicode.com/posts";
	$data = file_get_contents($url);
	$values = json_decode($data);

	foreach ($values as $value) {
		$id = $value->id;
		$title = $value->title;
		$insert = "INSERT INTO tbl_jsondata(id,title) VALUES('" . $id . "','" . $title . "')";
		$result = mysqli_query($con, $insert);
		/*echo "<br>";
        print_r($insert);
        echo "<br>";
        exit();*/
	}
	if ($result) {
		echo 1;
	} else {
		echo 0;
	}
}

// if(isset($_POST['uid']))  //pdf Download function
// {
// 	require('fpdf/fpdf.php');

// 	$pdf = new FPDF();
// 	$pdf->AddPage();
// 	$pdf->SetFont('Arial','B',12);	

// 	$uid=$_POST['uid'];

// 	$select="SELECT * FROM tbl_user WHERE id='".$uid."'";
// 	$result=mysqli_query($con,$select);
// }


//==============Add more functionality==================


if (isset($_POST['course'])) {
	$course = $_POST['course'];
	$price = $_POST['price'];

	$check = "SELECT * FROM tbl_course WHERE course='" . $course . "'";
	$rescheck = mysqli_query($con, $check);
	$row = mysqli_fetch_assoc($rescheck);


	if ($row['course'] == $course) {
		echo 2;
		//Course is Already Exists
	} else {
		$insert = "INSERT INTO tbl_course(course,price) VALUES('" . $course . "','" . $price . "')";
		$result = mysqli_query($con, $insert);

		if ($result) {
			echo 1;
			//Record Inserted Successfully
		} else {

			echo 0;
			//Something Went Wrong
		}
	}
}

if (isset($_POST['courseid'])) {
	$cid = $_POST['courseid'];
	$select = "SELECT price FROM tbl_course where cid='" . $cid . "'";
	$res = mysqli_query($con, $select);
	$row = mysqli_fetch_assoc($res);

	echo $row['price'];
}

if (isset($_POST['fstid'])) {
	$data = [];
	$id = $_POST['fstid'];
	$select = "SELECT * FROM tbl_payment where stid='" . $id . "'";
	$res = mysqli_query($con, $select);
	$row = mysqli_fetch_assoc($res);

	$data['pending'] = $row['pendingamount'];
	$data['final'] = $row['finalamount'];
	echo json_encode($data, true);
}


if (isset($_POST['userid'])) {
	$id = $_POST['userid'];

	$d = "DELETE FROM tbl_user WHERE id='" . $id . "'";
	$rs = mysqli_query($con, $d);

	if ($rs) {
		echo 1;
		//Delete Successfully
	} else {

		echo 0;
		//user course is already is in used
	}
}





if (isset($_POST['coursestatus']))    //Course Toggle
{
	$courseid = $_POST['coursestatus'];
	$data = "";

	$check = "SELECT * FROM tbl_stcourse1 where id='" . $courseid . "'";
	$rscheck = mysqli_query($con, $check);
	$rowcat = mysqli_fetch_assoc($rscheck);

	if ($rowcat['status'] == 1) {
		$upcat = "UPDATE tbl_stcourse1 SET status='0' WHERE id='" . $courseid . "'";
	} else {
		$upcat = "UPDATE tbl_stcourse1 SET status='1' WHERE id='" . $courseid . "'";
	}

	$rsupcat = mysqli_query($con, $upcat);

	if ($rsupcat) {
		$select = "SELECT * FROM tbl_stcourse1 WHERE id='" . $courseid . "'";
		$rselect = mysqli_query($con, $select);
		$rowcat2 = mysqli_fetch_assoc($rselect);

		if ($rowcat2['status'] == 1) {
			$data = "<div><a href='javascript:void(0);' onclick='fnstatuscourse(\"" . $rowcat2['id'] . "\");'  style='color:green;'><i class='fa fa-toggle-on'></i></a></div>";
		} else {
			$data = "<div><a href='javascript:void(0);' onclick='fnstatuscourse(\"" . $rowcat2['id'] . "\");'  style='color:red;'><i class='fa fa-toggle-off'></i></a></div>";
		}

		echo $data;
	} else {
		echo '0';
	}
}

if (isset($_POST['stid'])) {

	$stid = $_POST['stid'];
	$amount = $_POST['fa'];
	$receive = $_POST['ra'];
	$pending = $_POST['pa'];
	$st = 'completed';

	if ($receive > $pending) {
		echo 2;
		//receive amount is not greater than final amount

	} else {

		$finalpending = $pending - $receive;

		if ($finalpending == 0) {

			$up = "UPDATE tbl_payment SET receivedamount='" . $receive . "',pendingamount='" . $finalpending . "',status='" . $st . "' where stid='" . $stid . "'";
			//Status Change to Completed
		} else {
			$up = "UPDATE tbl_payment SET receivedamount='" . $receive . "',pendingamount='" . $finalpending . "' where stid='" . $stid . "'";
		}
		$resultup = mysqli_query($con, $up);

		if ($resultup) {
			echo 1;
			//Record Updated Successfully
		} else {
			echo 0;
			//Something Went Wrong
		}
	}
}

?>