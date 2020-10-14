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
                  <div class="animated fadeIn">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">employee Data</strong>
                                        <a href="ajax_registration.php" style="float: right;" class="btn btn-primary">Add Employee</a>
                                    </div>
                                    
                                    <div class="card-body">
                                        <form method="post">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>City</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table">
                                                
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