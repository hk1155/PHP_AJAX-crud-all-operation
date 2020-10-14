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



    //$select="SELECT tbl_category.*,tbl_company.name from tbl_company inner join tbl_category on tbl_category.cid=tbl_company.cid order by tbl_company.name";
    $select="SELECT * FROM tbl_category;";
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

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">category details</strong>
                                        <a href="add_category" style="float: right;" class="btn btn-primary">Add category</a>
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>ID</th>
                                                    <!-- <th>Company</th> -->
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                   
                                                    while($row=mysqli_fetch_assoc($rs))
                                                    {
                                                        ?>
                                                        <tr id="trcat_<?php echo $row['catid']; ?>">
                                                            <td>
                                                            <?php echo $row['catid']; ?>
                                                            </td>
                                                           <!--  <td>
                                                            <?php echo $row['name'] ?>
                                                            </td> -->
                                                             <td>
                                                            <?php echo ucfirst($row['cat_name']); ?>
                                                            </td>
                                                            <td>
                                                    <a href="javascript:void(0);" onclick="fncatdelete(<?php  echo $row['catid']; ?>);" class="delete" style="color:red;"><i class="fa fa-trash" style="color:red;"></i></a>&nbsp;&nbsp;
                                                    <a href="editcat.php?ucid=<?php echo $row["catid"]; ?>" style="color: blue"><i class="fa fa-edit" style="color:blue;"></i></a>&nbsp;&nbsp;
                                                    
                                                         <?php
                                                         if($row['status']==1)
                                                         {
                                                            ?>
                                                    <div id="toglecat<?php echo $row['catid']; ?>"> <a href="javascript:void(0)" onclick="fnactivecat(<?php echo $row['catid'];  ?>);"><i class="fa fa-toggle-on" style="color:green;"></i></a></div>

                                                    </td>
                                                     <?php
                                                      }

                                                      else
                                                      {
                                                        ?>

                                                <div id="toglecat<?php echo $row['catid']; ?>"> <a href="javascript:void(0)" onclick="fnactivecat(<?php echo $row['catid'];  ?>);"><i class="fa fa-toggle-off" style="color:red;"></i></a></div>


                                                        <?php

                                                      }
                                                    ?>
                                                           
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