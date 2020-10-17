<?php
ob_start();
session_start();

include_once 'Connection.php';

if (isset($_SESSION['semailadmin'])) {
} else {
  header('Location:index.php');
}

$select = "select * from tbl_user order by id";

$result = mysqli_query($con, $select);

function Deleteall($con)
{
  foreach ($_POST['cbdelete'] as $value) {
    $delete = "DELETE FROM tbl_user WHERE id='" . $value . "'";

    if (mysqli_query($con, $delete)) {
      header('Location:view_data.php');
    } else {
?>
      <script>
        $(document).ready(function() {

          $("#msg").show();

        });
      </script>
<?php
    }
  }
}

function StatusUpdate($con)
{
  $check = "SELECT * FROM tbl_user where id='" . $_GET['sid'] . "'";
  $result = mysqli_query($con, $check);

  $row = mysqli_fetch_assoc($result);

  if ($row['status'] == 1) {
    $update = "UPDATE tbl_user SET status='0' where id='" . $_GET['sid'] . "'";
  } else {
    $update = "UPDATE tbl_user SET status='1' where id='" . $_GET['sid'] . "'";
  }
  $rsup = mysqli_query($con, $update);
  if ($rsup) {
    header('Location:View_data.php');
  }
}


//================================
if (isset($_POST['btndelete']) && $_POST['btndelete'] != "") {
  Deleteall($con);
}

if (isset($_GET['sid'])) {
  StatusUpdate($con);
}




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
          <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show" id="msg" style="display: none;">
            <span class="badge badge-pill badge-warning">Check</span>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <strong class="card-title">User Data</strong>
                  <a href="Add_data.php" style="float: right;" class="btn btn-primary">Add User</a>
                </div>

                <div class="card-body">

                  <form method="post">
                    <input type="checkbox" onchange="fndemo()" name="cball" class="cball" style="margin-left: 16px;"> Check all
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
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
                            <tr id="truser<?php echo $row['id']; ?>">
                              <td>
                                <input type="checkbox" name="cbdelete[]" class="cbdelete" value="<?php echo $row['id'] ?>">
                              </td>
                              <td>
                                <?php
                                print ucfirst($row['name']);

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
                                print ucfirst($row['city']);

                                ?>
                              </td>
                              <td>
                                <?php
                                print $row['email'];

                                ?>
                              </td>
                              <td>
                                <!-- <a href="#"><i class="fa fa-comment" style="color:black;"></i></a>&nbsp;&nbsp; -->
                                <a href="https://api.whatsapp.com/send?phone=<?php echo '+91 ' . $row['contact']  ?>&text=<?php echo 'Your Mail ID:' . $row['email'];  ?>&source=&data=" target="_blank"><i class="fa fa-whatsapp" style="color:green;"></i></i>&nbsp;&nbsp;</a>
                                <a href="javascript:void(0);" onclick="fnuserdelete(<?php echo $row['id']; ?>)"><i class="fa fa-trash" style="color:red;"></i></a>&nbsp;&nbsp;

                                <a href="edit.php?uid=<?php echo $row["id"]; ?>" style="color: blue"><i class="fa fa-edit" style="color:blue;"></i></a>&nbsp;&nbsp;

                                <?php
                                if ($row['status'] == 1) {
                                ?>
                                  <a href="View_data.php?sid=<?php echo $row["id"]; ?>"><i class="fa fa-toggle-on" style="color:green;"></i></a>&nbsp;&nbsp;

                                <?php
                                } else {
                                ?>
                                  <a href="View_data.php?sid=<?php echo $row["id"]; ?>"><i class="fa fa-toggle-off" style="color:red;"></i></a>&nbsp;&nbsp;

                                <?php
                                }

                                ?>

                                <a href="javascript:void(0);" onclick="fnpdf(<?php echo $row['id']; ?>)"><i class="fa fa-file-pdf-o" style="color:red;"></i></a>&nbsp;&nbsp;


                              </td>
                            </tr>
                        <?php
                          }
                        }
                        ?>
                      </tbody>



                    </table>

                    <input type="submit" name="btndelete" value="Delete" class="btn btn-danger btndelete" style="margin-left: 15px;">
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

    function fndemo() {
      if ($(".cball").is(":checked")) {
        $('.cbdelete').prop('checked', true);
        $('.btndelete').show();
      } else {
        $('.cbdelete').prop('checked', false);
        $('.btndelete').hide();
      }

    }

    $(document).ready(function() {

      $('.btndelete').hide();

      $(".cbdelete").change(function() {

        //alert('test ok');
        if ($(".cbdelete").is(":checked")) {
          $('.btndelete').show();
          //$('.btndelete').attr("disabled",false);
        } else {
          $('.btndelete').hide();
          //$('.btndelete').attr("disabled",true);
        }

      });




    });
  </script>
</body>

</html>