<?php
//ob_start();
session_start();
//include_once 'Connection.php';

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


$jsonData = file_get_contents("https://pomber.github.io/covid19/timeseries.json");
$data = json_decode($jsonData, true);

 
    foreach($data as $key => $value){
        $days_count = count($value)-1;
        $days_count_prev = $days_count - 1;
    }

    
    
?>
<html>
    <head>
         <script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>
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
                        <div class="card">
                            <div class="card-header">
                                <center><strong>Corona </strong>Update</center>
                             </div>
                            <div class="card-body card-block">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                    <th>Date</th>
                                                    <th>Countries</th>
                                                    <th>Confirmed</th>
                                                    <th>Recovered</th>
                                                    <th>Deaths</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                            foreach($data as $key => $value){
                                                $increase = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                                                $decrease=$value[$days_count_prev]['confirmed']-$value[$days_count]['confirmed'];
                                              ?>
                                            <tr>
                                                 <td><?php echo $value[$days_count]['date'];?></td>

                                                <td scope="row"><?php echo $key?></td>
                                                <td>
                                                    <?php echo $value[$days_count]['confirmed'];?>
                                                    <?php if($increase != 0){ ?>
                                                        <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i><?php echo $increase;?></small>  
                                                    <?php }
                                                    else
                                                    {
                                                        ?>
                                                         <small class="text-success pl-3"><i class="fas fa-arrow-down"></i><?php echo $decrease;?></small>  

                                                        <?php
                                                    }
                                                     ?>    
                                                </td>
                                                <td><?php echo $value[$days_count]['recovered'];?></td>
                                                <td><?php echo $value[$days_count]['deaths'];?></td>
                                            </tr>
                                        <?php }?>
                                                </tbody>
                                            </table>
                                  </form>
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