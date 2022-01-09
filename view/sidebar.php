<?php
$hasil = mysqli_query($conn, "select * from tb_user WHERE username='$_SESSION[username]' ");
$row = mysqli_fetch_array($hasil);
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark
                accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
        <div class="sidebar-brand-icon ">
            <i class="fab fa-d-and-d"></i>
        </div>
        <div class="sidebar-brand-text mx-3">NGOBAR<sup>TEAM</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="home">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php
    if ($row['level'] == 'admin') {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user"></i>
                <span>Admin</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Daftar Organisasi:</h6>
                    <a class="collapse-item" href="mahasiswa">Daftar Mahasiswa</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>
    <!-- Nav Item - Utilities Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php
    if ($row['level'] == 'admin' || $row['level'] == 'ketua') {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="far fa-calendar-alt"></i>

                <span>Agenda</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Agenda:</h6>
                    <a class="collapse-item" href="agenda">Input Agenda Kegiatan</a>
                    <a class="collapse-item" href="">Jadwal Rapat</a>
                    <div class="collapse-divider"></div>

                </div>
            </div>
        </li>
    <?php
    }
    ?>

    <!-- Nav Item - Charts -->
    <?php
    if ($row['level'] == 'admin' || $row['level'] == 'ketua' || $row['level'] == 'mahasiswa') {
    ?>
        <li class="nav-item">
            <a class="nav-link" href="rekap">
                <i class="fas fa-book"></i>
                <span>Rekap Agenda</span></a>
        </li>
    <?php
    }
    ?>

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tabel Kegiatan Organisasi</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>