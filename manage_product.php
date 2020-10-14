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


    //$select="SELECT tbl_product.*,tbl_category.*,tbl_company.name from tbl_product inner join tbl_category on tbl_product.cat_id=tbl_category.catid inner join tbl_company on tbl_category.cid=tbl_company.cid"; 
        //without adding company id in product table then use this query
    // $select="SELECT tbl_product.*,tbl_category.*,tbl_company.name from tbl_product inner join tbl_category on tbl_product.cat_id=tbl_category.catid inner join tbl_company on tbl_product.compid=tbl_company.cid";

    $select="select tbl_product.*,tbl_category.cat_name from tbl_category inner join tbl_product on tbl_category.catid=tbl_product.cat_id";
    $rs=mysqli_query($con,$select);



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
                     <div class="animated fadeIn">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Product details</strong>
                                        <a href="add_product" style="float: right;" class="btn btn-primary">Add Product</a>
                                    </div>
                                    
                                    <div class="card-body">
                                        <form method="post">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>ID</th>
                                                   <!--  <th>Company</th> -->
                                                    <th>category</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Price</th>
                                                    <th>Description</th>
                                                    <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                   
                                                    while($row=mysqli_fetch_assoc($rs))
                                                    {
                                                        ?>
                                                        <tr id="trprod<?php echo $row['pid']; ?>">
                                                            <td>
                                                            <?php echo $row['pid']; ?>
                                                            </td>
                                                             <!-- <td>
                                                            <?php echo $row['name']; ?>
                                                            </td> -->
                                                            <td>
                                                            <?php echo ucfirst($row['cat_name']); ?>
                                                            </td>
                                                            
                                                             <td>
                                                            <?php echo ucfirst($row['product_name']); ?>
                                                            </td>
                                                             <td>
                                                            <img src="<?php echo $row['image']; ?>" style="height: 100px; width: 100px;">
                                                            </td>
                                                             <td>
                                                            <?php echo $row['price']; ?>
                                                            </td>
                                                            <td>
                                                            <?php echo $row['description']; ?>
                                                            </td>
                                                             <td>
                                                             <a href="javascript:void(0);" onclick="fnprodelete(<?php  echo $row['pid']; ?>);" title="delete Product" class="delete" style="color:red;"><i class="fa fa-trash" style="color:red;"></i></a>&nbsp;&nbsp;
                                                             <a href="editproduct.php?upid=<?php echo $row["pid"]; ?>" title="Edit Product Details" style="color: blue"><i class="fa fa-edit" style="color:blue;"></i></a>&nbsp;&nbsp;

                                                             <a href="<?php echo $row['image']; ?>" download title="Download Product Image"><i class="fa fa-download" style="color: black;"></i></a>
                                                            </td>
                                                        </tr>    
                                                        <?php
                                                    }


                                                    ?>
                                                
                                                </tbody>

                                               

                                            </table>
                                            
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div><!-- .animated -->    
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