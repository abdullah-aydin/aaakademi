</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Profile Dropdown Menu -->
        <li class="nav-item dropdown " >
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
                <div class="user-panel " >
                        <img src="<?=admin_assets_url('dist/img/user.png')?>" class="img-circle elevation-1" alt="User Image">
                 <span class="pl-1"><?=session('user_name')?></span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-md-right dropdown-menu-right text-center">
                <a href="<?=admin_url('profile')?>" class="dropdown-item">Profil</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">1.başlık</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">2.başlık</a>
                <div class="dropdown-divider"></div>
                <a href="<?=admin_url('logout')?>" class="dropdown-item dropdown-footer"><span class="text-danger">Çıkış Yap</span></a>
            </div>
        </li>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i-->
<!--                    class="fas fa-th-large"></i></a>-->
<!--        </li>-->
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=admin_url('index')?>" class="brand-link text-center">
        <span class="brand-text font-weight-bolder">AA | Akademi </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=admin_assets_url('dist/img/user.png')?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?=admin_url('profile')?>" class="d-block"><?=session('user_name')?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <?php foreach ($menus as $menu):?>
                    <li class="nav-item">
                        <a href="<?=admin_url($menu['url'])?>" class="nav-link <?= ($menu_active==$menu['url'])? 'active': null;?>">
                            <i class="<?=$menu['icon']?>"></i>
                            <p><?=$menu['title']?></p>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
