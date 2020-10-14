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


$select="SELECT * from tbl_category where status='1' GROUP BY cat_name;";
$rscat=mysqli_query($con,$select);

$check="SELECT * FROM tbl_product WHERE pid='".$_GET['upid']."'";
$result=mysqli_query($con,$check);

$row=mysqli_fetch_assoc($result);





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
                
                    <div class="col-lg-12">

                        <div class="col-lg-12 sufee-alert alert with-close alert-success alert-dismissible fade show" id="successproduct" style="display: none;">
                            <span class="badge badge-pill badge-success">success</span>
                           
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="col-lg-12 sufee-alert alert with-close alert-danger alert-dismissible fade show" id="errorproduct" style="display: none;">
                            <span class="badge badge-pill badge-danger">Error</span>
                           
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card">

                            <div class="card-header">
                                <center><strong>Edit</strong> Product Details</center>
                            </div>
                            <div class="col-12 col-md-6"><input type="hidden" id="hid" name="hid" value="<?php echo $row['pid']; ?>"  class="form-control"></div>
                            <div class="card-body card-block">
                                <form action="#" method="post" class="form-horizontal" id="fmreg">
                                     <select name="ddcategory" id="ddcategory" class="form-control">
                                                <option value=" ">--Select Category--</option>
                                                <?php

                                                 if($rscat)
                                                 {
                                                    while($row1=mysqli_fetch_assoc($rscat))
                                                    {
                                                        ?>
                                                        <option value="<?php echo $row1['catid']; ?>"><?php echo $row1['cat_name'] ?></option>
                                                        <?php
                                                    }
                                                 }

                                                ?>
                                            </select>



                                    <div class="row form-group">
                                        
                                        
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-12 col-md-6"><input type="text" id="txtproduct" name="txtproduct" value="<?php echo $row['product_name']; ?>"  class="form-control"></div>
                                        
                                        <div class="col-12 col-md-6"><input type="number" id="txtprice" name="txtprice" value="<?php echo $row['price']; ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                         <div class="col-12 col-md-6">
                                            
                                            <textarea id="txtdesc" class="form-control"><?php echo $row['description']; ?></textarea>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            
                                            <img src="<?php echo $row['image'] ?>" style="height: 100px;width: 100px;">
                                           
                                        </div>
                                    </div>
                                    <center>
                                        <div class="col col-md-12">
                                            <input type="button" onclick="UpdateProduct()" class="btn btn-primary" name="btninsert" value="Update Product">
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