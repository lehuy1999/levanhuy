<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Admin</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="http://localhost/PHP/ephone/index.php"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i><?= $_SESSION['accountName'] ?><b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="infor_account.php"><i class="fa fa-user fa-fw"></i> Th??ng tin</a>
                </li>
                <li>
                    <a href="change_account.php"><i class="fa fa-users fa-fw"></i> Thay ?????i th??ng tin</a>
                </li>
                <li>
                    <a href="change_password.php"><i class="fa fa-gear fa-fw"></i> Thay ?????i m???t kh???u</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Menu -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!-- T??m ki???m -->
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </li>

                <!-- Trang ch??? -->
                <li>
                    <a href="admin.php" class="active"><i class="fa fa-home fa-fw"></i> Trang ch???</a>
                </li>

                <!-- NSX -->
                <li>
                    <a href="#"><i class="fa fa-bank fa-fw"></i> NSX<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="list_producer.php">Danh s??ch</a>
                        </li>
                        <li>
                            <a href="form_producer.php">T???o NSX m???i</a>
                        </li>
                    </ul>
                </li>

                <!-- S???n ph???m -->

                <li>
                    <a href="#"><i class="fa fa-mobile fa-fw"></i> S???n ph???m<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="list_product.php">Danh s??ch s???n ph???m</a>
                        </li>
                        <li>
                            <a href="form_product.php">Th??m s???n ph???m m???i</a>
                        </li>
                        <li>
                            <a href="form_import_product.php">Nh???p s??? l?????ng b???ng excel</a>
                        </li>
                        <li>
                            <a href="form_product_file.php">Nh???p s???n ph???m b???ng Excel</a>
                        </li>
                    </ul>
                </li>

                <!-- ????n h??ng -->
                <li>
                    <a href="list_order.php"><i class="fa fa-cart-plus fa-fw"></i> ????n h??ng</a>
                </li>

                <!-- Tin t???c -->
                <li>
                    <a href="#"><i class="fa fa-edit fa-fw"></i> Tin t???c<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="list_news.php">Danh s??ch</a>
                        </li>
                        <li>
                            <a href="form_news.php">T???o tin t???c m???i</a>
                        </li>
                    </ul>
                </li>

                <!-- Danh s??ch t??i kho???n kh??ch h??ng -->
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Ng?????i d??ng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="list_admin.php">Danh s??ch ng?????i qu???n tr???</a>
                        </li>
                        <li>
                            <a href="list_user.php">Danh s??ch ng?????i d??ng</a>
                        </li>
                        <li>
                            <a href="form_admin.php">T???o t??i kho???n qu???n tr???</a>
                        </li>
                        <li>
                            <a href="reset_password_account.php">Reset m???t kh???u t??i kho???n</a>
                        </li>
                    </ul>
                </li>

                <!-- B??nh lu???n -->
                <li>
                    <a href="#"><i class="fa fa-comments fa-fw"></i> B??nh lu???n<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="list_cm_phone.php">B??nh lu???n s???n ph???m</a>
                        </li>
                        <li>
                            <a href="list_cm_news.php">B??nh lu???n tin t???c</a>
                        </li>
                    </ul>
                </li>

                <!-- Kho ??i???n tho???i -->
                <li>
                    <a href="list_product_quantity.php"><i class="fa fa-home fa-fw"></i> Kho h??ng</a>
                </li>

                <!-- Ph???n h???i -->
                <li>
                    <a href="list_feedback.php"><i class="fa fa-users fa-fw"></i> Ph???n h???i</a>
                </li>
            </ul>
        </div>
    </div>
</nav>