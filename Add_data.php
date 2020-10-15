<?php
ob_start();
session_start();
require 'PHPMailerAutoload.php';
require 'credentials.php';

include_once 'Connection.php';

// $msg="";
// if(isset($_POST['btnsubmit']))
// {  
//   $rand= rand(1000,9999);
//   $status='1';

//       $view="select * from tbl_user where email='".$_POST['txtemail']."' ";
//       $rs=mysqli_query($con,$view);    //for structured  use

//       $row=mysqli_fetch_assoc($rs);     //for structured  use

//       if($_POST['txtemail']!="")
//       {
//         if($row['email']==$_POST['txtemail'])
//        {
//           $msg="User is Already Exists!!";
//         }


//       else
//       {
//        $name = $_POST['txtname'];
//        $contact = $_POST['txtcontact'];
//        $gender = $_POST['gender'];
//        $city = $_POST['city'];
//        $email = $_POST['txtemail'];
//        $password = md5($_POST['txtpassword']);
//        $cpassword = md5($_POST['txtcpassword']);

//        if($password==$cpassword)
//        {
//                 $mail = new PHPMailer;

//                 // $mail->SMTPDebug = 4;          // Enable verbose debug output

//                 $mail->isSMTP();                  //Set mailer to use SMTP
//                 $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//                 $mail->SMTPAuth = true;          // Enable SMTP authentication
//                 $mail->Username = EMAIL;         // SMTP username it comes from credentials file
//                 $mail->Password = PASS;         // SMTP password
//                 $mail->SMTPSecure = 'tls';     // Enable TLS encryption, `ssl` also accepted
//                 $mail->Port = 587;              // TCP port to connect to

//                 $mail->setFrom(EMAIL, 'Registration ');
//                 $mail->addAddress($_POST['txtemail']);     // Add a recipient

//                 $mail->addReplyTo(EMAIL);
//                 // print_r($_FILES['file']); exit;
//                  for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
//                   $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);     Optional name
//                   } 
//                 $mail->isHTML(true);                                  // Set email format to HTML

//                 $mail->Subject = 'Customer Registration';
//                 $mail->Body = $_POST['txtname'].' Your OTp is: '.$rand;
//                 $mail->AltBody = 'this is body';

//                 if (!$mail->send())
//                  {
//                     //echo 'Message could not be sent.';
//                     echo 'Mailer Error: ' . $mail->ErrorInfo;
//                     $msg.='<div class="alert alert-danger">
//                      <strong>Warning!</strong> Mail could not be sent.'.$mail->ErrorInfo;
//                         '</div>';
//                  }
//                  else
//                  {
//                         //echo 'Message has been sent';

//                      //    $msg.='<div class="alert alert-success">
//                      // <strong>Success!</strong>  OTP is successfully send to the Registered Email.
//                      //    </div>';

//                 }


//             $sql = "INSERT INTO tbl_user (name,contact,gender,city,email,password,status)
//            VALUES ('$name','$contact','$gender','$city','$email','$cpassword','$status')";


//            // if ($con->query($sql) === TRUE) {
//            //    echo "New record created successfully";
//            //    }

//            if (mysqli_query($con, $sql))   //for structured  use query
//            {

//              header('Location:view_data.php');
//             }
//             else 
//             {
//               echo "Error: " . $sql . "" . mysqli_error($con);  //Structured Use
//             }
//       }
//       else
//       {
//          $msg="password is Not Matched";

//       }
//    }   
//   }


// }

?>
<html>

<head>

    <title>Registration</title>
    <?php
    include './Head_admin.php';
    ?>
    <!-- 
        <script>
             $(document).ready(function () {
                $('#yourphone').usPhoneFormat({
                    format: '(xxx) xxx-xxxx',
                });
                
                $('#yourphone2').usPhoneFormat();
            });
            

        </script> -->
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

                <div class="col-lg-12">
                    <div class="col-lg-12 sufee-alert alert with-close alert-danger alert-dismissible fade show" id="error" style="display: none;">
                        <span class="badge badge-pill badge-danger">Error</span>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-lg-12 sufee-alert alert with-close alert-success alert-dismissible fade show" id="success" style="display: none;">
                        <span class="badge badge-pill badge-success">Success!!</span>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-lg-12 sufee-alert alert with-close alert-danger alert-dismissible fade show" id="errmsg" style="display: none;">
                        <span class="badge badge-pill badge-danger">Check</span>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong>Customer </strong>Registration
                        </div>
                        <div class="card-body card-block">

                            <form action="#" method="post" class="form-horizontal" id="fmreg">

                                <div class="row form-group">

                                    <div class="col-12 col-md-12"><input type="text" id="txtname" name="txtname" onkeyup="fndemo()" placeholder="Full Name" class="form-control"><small class="form-text text-muted">
                                            <div id="demoerr" style="color: blue"></div>
                                        </small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12 col-md-6">
                                        <select name="city" id="city" class="form-control">
                                            <option value=" ">--Select City--</option>
                                            <option value="surat">Surat</option>
                                            <option value="baroda">Baroda</option>
                                            <option value="mumbai">Mumbai</option>
                                        </select>
                                    </div>

                                    <div class="col col-md-1"><label class=" form-control-label">Gender:</label></div>
                                    <div class="col col-md-5">
                                        <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label ">
                                                <input type="radio" id="gender" name="gender" value="m" class="form-check-input">Male
                                            </label> &nbsp;&nbsp;
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio" id="gender" name="gender" value="f" class="form-check-input">Female
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12 col-md-6"><input type="email" id="txtemail" name="txtemail" placeholder="Enter Email-id" class="form-control" pattern="\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" title="Please Enter Valid Email Address" onkeyup="emailchecker()"><small class="help-block form-text">E-mail as a Username</small>
                                        <div id="emailmsg" style="color: red"></div>
                                    </div>

                                    <div class="col-12 col-md-6"><input type="text" id="txtcontact" name="txtcontact" placeholder="Contact-no" class="form-control"></div>

                                </div>
                                <div class="row form-group">

                                    <div class="col-12 col-md-6"><input type="password" onkeyup="check();" id="txtpassword" name="txtpassword" placeholder="Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Must contain at least 8 characters in one number and one uppercase and lowercase letter" class="form-control"><small class="help-block form-text">Password must be 8 digit or and character</small></div>
                                    <div class="col-12 col-md-6"><input type="password" onkeyup="check();" id="txtcpassword" name="txtcpassword" placeholder="Confirm Password" class="form-control"><small class="help-block form-text">Password must be 8 digit or and character</small><span id='message'></span></div>

                                </div>



                                <center>

                                    <div class="col col-md-12">
                                        <input type="button" id="btninsert" onclick="userinsert()" class="btn btn-success" name="btninsert" value="Register">
                                    </div>
                                    <button class="buttonload btn btn-success" id="btnsend" disabled="" style="display: none;">
                                        <i class="fa fa-spinner fa-spin"></i>Sending OTP on Mail
                                    </button>
                                    <!-- <p style="color: red;"><?php if ($msg != "") {
                                                                    echo $msg;
                                                                } ?></p> -->

                                </center>

                            </form>
                        </div>


                        </center>

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