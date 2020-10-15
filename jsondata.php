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


$url = "https://jsonplaceholder.typicode.com/posts";
$data = file_get_contents($url);

$values = json_decode($data);
/*echo $values['0']->id;
echo $value['1']->title;
exit();*/



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
                    <div class="card">
                        <div class="card-header">
                            <center><strong>Manage </strong>Json Data</center>
                            <input type="button" onclick="savejsondata()" value="Save data" class="btn btn-success" id="btnsave">
                            <button class="buttonload btn btn-primary" id="btnload" style="display: none;">
                                <i class="fa fa-spinner fa-spin"></i>Processing
                            </button>

                            <a href="convertjson" style="float: right;" class="btn btn-primary">Convert to Json data</a>
                        </div>
                        <div class="card-body card-block">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($values as $value) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $value->userId; ?>
                                            </td>
                                            <td>
                                                <?php echo $value->id; ?>
                                            </td>
                                            <td>
                                                <?php echo $value->title; ?>
                                            </td>
                                            <td>
                                                <?php echo $value->body; ?>
                                            </td>
                                            <!-- <td>
                                                <a href="javascript:void(0);" onclick="fnjsondelete(<?php echo $value->id; ?>)" style="color:red;"><i class="fa fa-trash" style="color:red;"></i></a>
                                                    </td> -->
                                        </tr>

                                    <?php
                                    }
                                    ?>
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