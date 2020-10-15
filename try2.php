<html>

<head>

    <title>My Admin</title>
    <?php
    include './Head_admin.php';
    ?>

    <script>
        $(document).ready(function() {
            $('#yourphone').usPhoneFormat({
                format: '(xxx) xxx-xxxx',
            });

            $('#yourphone2').usPhoneFormat();
        });
    </script>
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
                <h1>(xxx) xxx-xxxx:</h1>
                <input type='text' id='yourphone' />

                <br />
                <h1>xxx-xxx-xxxx:</h1>
                <input type='text' id='yourphone2' />
            </section>
        </div>
        <div class="clearfix"></div>
        <?php
        include './Footer_admin.php';
        ?>
    </div>
    <?php
    //include 'Script_admin.php';
    ?>
</body>

</html>