<?php
ob_start();
session_start();

include_once 'Connection.php';

if (isset($_SESSION['semailadmin'])) {
  // if((time()-$_SESSION['login_time'])>300)   //Session destroy after 5 minutes of Inactivity 5*60=300
  // {
  //     header('Location:logout.php');
  // }
} else {
  header('Location:index.php');
}

$select = "select * from tbl_user order by id";

$result = mysqli_query($con, $select);


?>

<html>

<head>
  <title>User Data</title>
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
                  <strong class="card-title">Update Using Ajax</strong>
                  <a href="Add_data.php" style="float: right;" class="btn btn-primary">Add Data</a>
                </div>

                <div class="card-body">
                  <form method="post">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Gender</th>
                          <th>City</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>

                              <td>
                                <?php
                                print $row['name'];

                                ?>
                              </td>
                              <td>
                                <?php
                                print $row['contact'];

                                ?>
                              </td>
                              <td>
                                <?php
                                if ($row['gender'] == 'm') {
                                  print "Male";
                                } else {
                                  print "Female";
                                }


                                ?>
                              </td>
                              <td>
                                <?php
                                print $row['city'];

                                ?>
                              </td>
                              <td>
                                <?php
                                print $row['email'];

                                ?>
                              </td>
                              <td>
                                <?php
                                if ($row['status'] == 1) {
                                ?>
                                  <div id="togleaction<?php echo $row['id']; ?>"> <a href="javascript:void(0)" onclick="fnactive(<?php echo $row['id'];  ?>);"><i class="fa fa-toggle-on" style="color:green;"></i></a></div>


                                <?php
                                } else {
                                ?>
                                  <div id="togleaction<?php echo $row['id']; ?>"><a href="javascript:void(0);" onclick="fnactive(<?php echo $row['id']; ?>);"><i class="fa fa-toggle-off" style="color:red;"></i></a>
                                  </div>

                                <?php
                                }

                                ?>




                              </td>
                            </tr>
                        <?php
                          }
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
  <script>
    function fndelete() {
      if ($(".cbdelete").is(":checked")) {
        $('.btndelete').attr("disabled", false);
      } else {
        $('.btndelete').attr("disabled", true);
      }
    }
  </script>
</body>

</html>