<?php
ob_start();
session_start();
include_once 'Connection.php';

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



$select="SELECT * FROM tbl_category where catid='".$_GET['ucid']."'";
$result=mysqli_query($con,$select);
$rowcat=mysqli_fetch_assoc($result);


$urlcheck="select * from tbl_category";
$rsurl=mysqli_query($con,$urlcheck);


$pagename=basename($_SERVER['PHP_SELF']); 

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
                    <div class="col-lg-6 sufee-alert alert with-close alert-danger alert-dismissible fade show" id="msgcat" style="display: none;">
                            <span class="badge badge-pill badge-danger"></span>
                          
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <center><strong>Edit </strong>category</center>
                                <?php //echo $pagename; ?>
                            </div>

                            <div class="card-body card-block">
                                 
                                <form action="#" method="post" class="form-horizontal" id="fupForm">
                                    <div class="row form-group">
                                        <div class="col-12 "><input type="hidden" id="hcatid" name="hcatid" value="<?php echo $rowcat['catid']; ?>"  class="form-control"></div>

                                        <div class="col-12 "><input type="text" id="txtcategory" name="txtcategory" value="<?php echo $rowcat['cat_name']; ?>"  class="form-control"></div>
                                      

                                    </div>                                                                

                                    <center>
                                     <div class="col col-md-12">
                                            <input type="button"  id="btnupdate" onclick="UpdateCategory()"  class="btn btn-primary" name="btnupdate" value="Update category">
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