<?php
include_once 'Connection.php';
ob_start();
//session_start();

// if(isset($_SESSION['semailadmin']))
// {
//     header('Location:Dashboard.php');
// }
// else
// {
//     header('Location:index.php');
// }


/*$msg="";


if(isset($_POST['btnlogin']))
{
    if($_POST['txtemail']!="" && $_POST['txtpassword']!="")
    {

        $dpassword=md5($_POST['txtpassword']);
        $query="select * from tbl_user where email='".$_POST['txtemail']."' and password='".$dpassword."'";
       
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0)
        {

        $query2="SELECT * FROM tbl_user where email='".$_POST['txtemail']."'";
        $rs2=mysqli_query($con,$query2);
        $row=mysqli_fetch_assoc($rs2);

        if($row['status']==0)
        {
         $msg="Your Id is Not Active";            
        }
        else
        {
            $_SESSION['semailadmin']=$_POST['txtemail'];
            $_SESSION['spwdadmin']=$_POST['txtpassword'];
            $_SESSION['sname']=$row['name'];
            $_SESSION['login_time']=time();
            header('Location:dashboard.php');
        }
       
       
      }
      else
      {   
            $msg="Username or Password Incorrect";
      }
    }
    else
    {
        $msg="Please enter the Details";
    }
}*/


?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <?php  
        include_once 'Head_admin.php';
        ?>
        </head>
    <body class="bg-light">

        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="index.php">
                            <img class="align-content" src="images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="login-form">
                        <form method="post">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="txtpassword" id="txtpassword" class="form-control" placeholder="Password">
                            </div>
                            
                            <input type="button" value="Sign in" name="btnlogin" onclick="fnlogin()" class="btn btn-success btn-flat m-b-30 m-t-30">

                            <!-- <input type="button" name="btntest" id="btntest"  value="Test"> -->

                            <div class="register-link m-t-15 text-center">
                                <p>Don't have account ? <a href="add_data.php"> Sign Up Here</a></p>
                            </div>
                            <div class="alert alert-danger" style="display: none;" id="errloginmsg">
                              
                            </div>
							 
						
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once 'Script_admin.php';
        ?>
        <script src="assets/js/main.js"></script>

    </body>
</html>
