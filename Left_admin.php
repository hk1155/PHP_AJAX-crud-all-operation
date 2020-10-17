<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">

            <?php
            if (isset($_SESSION['sname'])) {
            ?>
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">UI elements</li><!-- /.menu-title -->
                    <li>
                        <a href="View_data"><i class="menu-icon fa fa-laptop"></i>Manage User</a>
                    </li>

                    <li>
                        <a href="manage_category"><i class="menu-icon fa fa-laptop"></i>Manage Category</a>
                    </li>
                    <li>
                        <a href="manage_product"><i class="menu-icon fa fa-laptop"></i>Manage Product</a>
                    </li>
                    <li>
                        <a href="jsondata"><i class="menu-icon fa fa-laptop"></i>Manage Json Data</a>
                    </li>
                    <li>
                        <a href="coronaupdate"><i class="menu-icon fa fa-laptop"></i>Corona Update</a>
                    </li>
                    <li>
                        <a href="manage_course"><i class="menu-icon fa fa-laptop"></i>Manage Course</a>
                    </li>

                    <li>
                        <a href="student_details"><i class="menu-icon fa fa-laptop"></i>Student Course  details</a>
                    </li>
                    <li>
                        <a href="fees"><i class="menu-icon fa fa-laptop"></i>Manage Fees</a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Extra Test data</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="fa fa-id-badge"></i><a href="student_course">Student Admission2</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="addmore">Multiple Products</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="status_ajax.php">Ajax Status toggle</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="view_ajax.php">Ajax Delete </a></li>
                            <li><i class="fa fa-id-badge"></i> <a href="ie.php">Import Export </a></li>
                            <li><i class="fa fa-id-badge"></i><a href="manage_company.php">Manage Company</a></li>
                        </ul>
                    </li>
                </ul>
            <?php
            } else {
            ?>
                <a href="index.php">&nbsp;<p style="color: orange;">Please Login in To Continue</p></a>
            <?php
            }

            ?>

        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->