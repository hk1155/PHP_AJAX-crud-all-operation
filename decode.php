<?php
ob_start();
session_start();
include_once 'Connection.php';

if (isset($_SESSION['semailadmin'])) {
} else {
    header('Location:index.php');
}

$query = "select * from tbl_name";
$result = mysqli_query($con, $query);

//$myary= array(array(1,2,3),"hetul","patel");
//echo $myary[1][0];
//exit();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $myary[] = $row;
    }

    print_r($myary);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $e = json_encode($myary);
    echo $e;
    echo "<br>";
    echo "<br>";


    // $d =json_decode($e);
    // print_r($d);
    // echo ['total'][0];
    exit();
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
                Master Page
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