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
        <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
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
                <i class="fa fa-user fa-fw"></i> <?= $_SESSION['accountName'] ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="infor_account.php"><i class="fa fa-user fa-fw"></i> Thông tin</a>
                </li>
                <li>
                    <a href="change_account.php"><i class="fa fa-users fa-fw"></i> Thay đổi thông tin</a>
                </li>
                <li>
                    <a href="change_password.php"><i class="fa fa-gear fa-fw"></i> Thay đổi mật khẩu</a>
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
                <!-- Tìm kiếm -->
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

                <!-- Trang chủ -->
                <li>
                    <a href="admin.php" class="active"><i class="fa fa-home fa-fw"></i> Trang chủ</a>
                </li>

                <!-- NSX -->
                <li>
                    <a href="#"><i class="fa fa-bank fa-fw"></i> NSX<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="list_producer.php">Danh sách</a>
                        </li>
                        <li>
                            <a href="form_producer.php">Tạo NSX mới</a>
                        </li>
                    </ul>
                </li>

                <!-- Sản phẩm -->

                <li>
                    <a href="#"><i class="fa fa-mobile fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="list_product.php">Danh sách</a>
                        </li>
                        <li>
                            <a href="form_product.php">Tạo sản phẩm mới</a>
                        </li>
                        <li>
                            <a href="form_import_product.php">Nhập điện thoại</a>
                        </li>
                        <li>
                            <a href="form_product_file.php">Import điện thoại</a>
                        </li>
                    </ul>
                </li>

                <!-- Kho điện thoại -->
                <li>
                    <a href="list_product_quantity.php"><i class="fa fa-home fa-fw"></i> Kho hàng</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>