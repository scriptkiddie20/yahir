<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('karyawan'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $sideTitle; ?></div>
    </a>


    <?php foreach ($menu as $m) : ?>
        <!-- Heading -->
        <div class="sidebar-heading mb-2">
            <?= $m['menu'] ?>
        </div>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($m['id_menu'] == $sm['menu_id']) : ?>
                <!-- Nav Item-->
                <?php if ($title == $sm['title']) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link py-2" href="<?= base_url($sm['url']) ?>">
                        <i class="<?= $sm['icon'] ?>"></i>
                        <span><?= $sm['title'] ?></span></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider mt-1">

        <?php endforeach; ?>

        <!-- Logout -->
        <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link py-2">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->