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



    $select="SELECT * FROM tbl_company";
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
                                        <strong class="card-title">Company details</strong>
                                        <a href="add_company" style="float: right;" class="btn btn-primary">Add company</a>
                                    </div>
                                    
                                    <div class="card-body">
                                        <form method="post">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                   
                                                    while($row=mysqli_fetch_assoc($rs))
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                            <?php echo $row['cid']; ?>
                                                            </td>
                                                             <td>
                                                            <?php echo $row['name']; ?>
                                                            </td>
                                                            <td>
                                                            <?php echo $row['status']; ?>
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