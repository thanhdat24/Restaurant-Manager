<?php
require 'data/site.php';
$page = $_GET['page'];
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" style="color:#ffffffcc" class="brand-link">
        <span class="iconify" data-icon="emojione-monotone:shallow-pan-of-food" data-width="35" data-height="49" style="margin-left:12px"></span>
        <!-- <img src="" alt=" Admin Logo" class="brand-image  elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">Quản Lý Quán Ăn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./public/img/dat-avatar.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">Lê Thành Đạt</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php foreach ($SITE['navigation']['admin'] as $key => $item) :  ?>

                    <?php
                    $activeClass = "";
                    $openMenuClass = "";
                    if ($page  === $item['name']) {
                        $activeClass = "active ";
                    }
                    // if (isset($item['subitems'])) {
                    //     foreach ($item['subitems'] as $key => $subitem) {
                    //         if ($page === $subitem['name']) {
                    //             $openMenuClass = "menu-is-opening menu-open ";
                    //         }
                    //     }
                    // } 
                    ?>

                    <li id="nav-<?= $key ?>" class="nav-item <?= $openMenuClass ?>">

                        <a href=<?= $item['link'] ?> class="nav-link <?= $activeClass ?>">
                            <i class="nav-icon <?= $item['icon'] ?>"></i>
                            <p>
                                <?= $item['title'] ?>
                                <?php if (isset($item['subitems'])) : ?>
                                    <i class="right fas fa-angle-left"></i>
                                <?php endif; ?>
                            </p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>