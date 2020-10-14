<?php
ob_start();
session_start();

if(isset($_SESSION['semailadmin']))
{
    // if((time()-$_SESSION['login_time'])>300)   //Session destroy after 5 minutes of Inactivity 5*60=300
    // {
    //     header('Location:logout.php');
    // }
}
else
{
  header('Location:index.php');
}
?>

<html>
    <head>
        <title>My Admin</title>
        <?php
        include './Head_admin.php';
        ?>
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
                    <div class="col-lg-9 sufee-alert alert with-close alert-success alert-dismissible fade show" id="success" style="display: none;">
                            <span class="badge badge-pill badge-success">Success!!</span>
                            Data Save Successfully
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <center><strong>Ajax</strong> Employee Registration</center>
                            </div>

                            <div class="card-body card-block">
                                 
                                <form action="#" method="post" class="form-horizontal" id="fupForm">

                                    <div class="row form-group">

                                        <div class="col-12 col-md-12"><input type="text" id="txtname" required="" name="txtname" onkeyup="fndemo()" placeholder="Full Name" class="form-control"><small class="form-text text-muted"><div id="demoerr" style="color: blue"></div></small></div>
                                       <!--  <div class="col-12 col-md-4"><input type="text" id="txtmname" required="" name="txtmname" pattern="^[A-Za-z]{3,50}$"  placeholder="Midle-name" class="form-control"></div>
                                        <div class="col-12 col-md-4"><input type="text" id="txtlname" required="" name="txtlname"  pattern="^[A-Za-z]{3,50}$" placeholder="Last-name" class="form-control"></div> -->

                                    </div>
                                    <div class="row form-group">
                                     

                                        <div class="col-12 col-md-12">
                                            <select name="city" id="city" class="form-control">
                                                <option value=" ">--Select City--</option>
                                                <option value="surat">Surat</option>
                                                <option value="baroda">Baroda</option>
                                                <option value="mumbai">Mumbai</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row form-group">
                                        
                                        
                                    </div>

                                    <div class="row form-group">

                                        <div class="col-12 col-md-6"><input type="email" id="txtemail" name="txtemail" placeholder="Enter Email-id" class="form-control" required pattern="\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" title="Please Enter Valid Email Address"  onkeyup="emailchecker()"><small class="help-block form-text">Email check in user table</small><div id="emailmsg" style="color: red"></div></div>
                                        
                                        <div class="col-12 col-md-6"><input type="text" id="txtcontact" maxlength="10" minlength="10" title="Please Enter 10 digit Valid number" name="txtcontact" placeholder="Contact-no" class="form-control" required=""></div>
                                    </div>
                                    


                                    <center>

                                        <div class="col col-md-12">


                                            <input type="button" onclick="btncheck()" id="btnsave"  class="btn btn-success" name="btnsave" value="Save">
                                        </div>
                                        
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