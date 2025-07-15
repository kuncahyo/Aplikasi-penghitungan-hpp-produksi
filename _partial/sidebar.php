<?php
// Start the session
session_start();
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        
        <div class="sidebar-brand-text mx-3">WIRA DJADIE
NATURALSTONE </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
    <?php if ($_SESSION["type"] < 1 ) { ?>
      <!-- Heading -->
      <div class="sidebar-heading">
        Master
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="produk.php" >
          <i class="fas fa-cogs"></i>
          <span>Bahan Baku</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="bahanoverhead.php" >
          <i class="fas fa-cogs"></i>
          <span>Overhead Variabel</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="jasa.php" >
          <i class="fas fa-cogs"></i>
          <span>Overhead Tetap</span>
        </a>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="pekerja.php" >
          <i class="fas fa-cogs"></i>
          <span>Pekerja</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="custom.php" >
          <i class="fas fa-cogs"></i>
          <span>Bahan Custom</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="kategoriproduk.php" >
          <i class="fas fa-cogs"></i>
          <span>Kategori Produk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="pelanggan.php" >
          <i class="fas fa-cogs"></i>
          <span>Pelanggan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="user.php" >
          <i class="fas fa-cogs"></i>
          <span>User</span>
        </a>
      </li>
       <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pesanan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="pesanan.php" >
          <i class="fas fa-cogs"></i>
          <span>Pesanan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="hppawal.php" >
          <i class="fas fa-cogs"></i>
          <span>Penentuan HPP Awal</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="hppactual.php" >
          <i class="fas fa-cogs"></i>
          <span>Penentuan HPP Actual</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="identifikasi.php" >
          <i class="fas fa-cogs"></i>
          <span>Identifikasi</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="laporanhppstandart.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan HPP Standar</span></a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="laporanproduk.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan Harga Jual Produk</span></a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" href="laporanhppactual.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan HPP Aktual</span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="laporanevaluasi.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan Evaluasi HPP</span></a>
        </li>
      <!-- Nav Item - Tables -->
      <?php }else{ ?>
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Laporan
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="laporanhppstandart.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan HPP Standar</span></a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="laporanproduk.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan Harga Jual Produk</span></a>
          </li>
          
          <li class="nav-item">
          <a class="nav-link" href="laporanhppactual.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan HPP Aktual</span></a>
          </li>

          <li class="nav-item">
          <a class="nav-link" href="laporanevaluasi.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan Evaluasi HPP</span></a>
          </li>
      <?php } ?>
      <hr class="sidebar-divider">
      <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Logout</span></a>
          </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    
    </ul>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
