
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">

            <?php
            if(isset($_SESSION['sname']))
            {
                ?>
                <ul class="nav navbar-nav">
                <li class="active">
                    <a href="dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
                <li>
                    <a href="View_data"><i class="menu-icon fa fa-laptop"></i>Manage User</a>
                </li>
                <!-- <li>
                    <a href="status_ajax.php"><i class="menu-icon fa fa-laptop"></i>Status Ajax</a>
                </li> -->
                <!-- <li>
                    <a href="view_ajax.php"><i class="menu-icon fa fa-laptop"></i>Ajax Opertion </a>
                </li> -->
                <!-- <li>
                    <a href="ie.php"><i class="menu-icon fa fa-laptop"></i>Import Export </a>
                </li> -->
                <!--  <li>
                    <a href="manage_company.php"><i class="menu-icon fa fa-laptop"></i>Manage Company</a>
                </li> -->
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
                    <a href="addmore"><i class="menu-icon fa fa-laptop"></i>Multiple Products</a>
                </li>
                <!-- <li>
                    <a href="additem"><i class="menu-icon fa fa-laptop"></i>Manage ItemList</a>
                </li> -->
                <!-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                    <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                        <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                        <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                        <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                        <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                        <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                        <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                        <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                    </ul>
                </li> -->
                <!-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                        <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                    </ul>
                </li>
 -->

               
                
            </ul>



                <?php
            }
            else
            {
                ?>
                <a href="index.php">&nbsp;<p style="color: orange;">Please Login in To Continue</p></a>
                <?php
            }

            ?>
            
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->