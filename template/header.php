<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Pendukung Keputusan Pemilihan Menu Terbaik di Warung 17 Metode AHP SAW</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

  
  <style>
    .sidebar .sidebar-brand {
      height: 4.375rem;
      text-decoration: none;
      font-size: 1rem;
      font-weight: 800;
      padding: 1.5rem 1rem;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 0.05rem;
      z-index: 1;
    }

    .sidebar-light hr.sidebar-divider {
      border-top: 1px solid #1cc88a;
    }

    /* Sidebar - Fixed Position for Brand */
.sidebar-brand {
  position: fixed; /* Fix the sidebar brand to the top */
  top: 0;
  left: 0;
  width: 224px; /* Sidebar width */
  background-color: #1cc88a; /* Sidebar color */
  z-index: 1000;
  padding-top: 10px;
  padding-bottom: 20px;
  overflow: hidden;
  text-align: center; /* Center text */
  border-bottom: 1px solid #1cc88a; /* Optional: add a separator between brand and content */
}

.sidebar-brand .sidebar-brand-icon {
  font-size: 2rem; /* Make the icon bigger */
  color: #fff; /* Set icon color to white */
  
}

.sidebar-brand .sidebar-brand-text {
  font-size: 1rem; /* Adjust text size */
  color: #fff; /* Text color */
  font-weight: bold; /* Make text bold */
  letter-spacing: 1px; /* Add some spacing between letters */
  margin-top: 10px; /* Add some spacing above the text */
}

/* Sidebar - Rest of the Items (Scrollable) */
#accordionSidebar {
  position: fixed;
  top: 65px; /* Space below the fixed brand */
  left: 0;
  height: calc(100vh - 80px); /* Full height minus the brand's height */
  width: 250px; /* Same width as the brand */
  background-color: #1cc88a; /* Sidebar color */
  z-index: 999;
  overflow-y: auto; /* Allow scrolling for the sidebar */
  padding-top: 0;
  padding-left: 10px; /* Add padding to the left of the items */
}

#accordionSidebar .nav-item {
  margin-bottom: 15px; /* Add space between nav items */
}

#accordionSidebar .nav-link {
  font-size: 1rem; /* Adjust font size */
  color: #fff; /* Set nav link color to white */
  font-weight: 500; /* Set font weight */
  text-transform: capitalize; /* Capitalize text */
  display: flex;
  align-items: center; /* Align items in a row */
}

#accordionSidebar .nav-link:hover {
  background-color: #1cc88a; /* Darker green on hover */
  border-radius: 5px; /* Optional: round corners on hover */
  padding-left: 20px; /* Add some left padding on hover */
}

#accordionSidebar .nav-link i {
  margin-right: 10px; /* Space between icon and text */
  font-size: 1.2rem; /* Icon size */
}

/* Content Wrapper - Adjusted for space */
#content-wrapper {
  margin-left: 250px; /* Make room for the fixed sidebar */
  padding-top: 20px; /* Padding for top spacing */
  padding-right: 20px; /* Optional: padding for right spacing */
  background-color: #f8f9fc; /* Content background color */
  min-height: 100vh; /* Ensure the content takes full height */
}

/* Mobile Adjustments */
@media (max-width: 768px) {
  .sidebar-brand {
    width: 60px; /* Reduce sidebar width on mobile */
  }

  #accordionSidebar {
    width: 60px; /* Adjust sidebar width for mobile */
  }

  #content-wrapper {
    margin-left: 60px; /* Adjust content wrapper on mobile */
  }

  .sidebar-brand .sidebar-brand-text {
    display: none; /* Hide the text on mobile */
  }

  #accordionSidebar .nav-link {
    text-align: center; /* Center the text in the nav links */
  }
}

/* Optional: Scrollbar style for the content */
#content-wrapper::-webkit-scrollbar {
  width: 8px;
}

#content-wrapper::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.3);
  border-radius: 10px;
}

  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center-fixed" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK AHP SAW</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if ($page == "Dashboard") {
        echo "active";
      } ?>">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <?php

      ?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master Data
      </div>


      <li class="nav-item <?php if ($page == "Kriteria") {
        echo "active";
      } ?>">
        <a class="nav-link" href="list-kriteria.php">
          <i class="fas fa-fw fa-cube"></i>
          <span>Data Kriteria</span></a>
      </li>

      <?php
      $q = mysqli_query($koneksi, "SELECT COUNT(ada_pilihan) as banyak FROM kriteria WHERE ada_pilihan='1'");
      $krit = mysqli_fetch_array($q);
      if ($krit['banyak'] > 0) {
        ?>
        <li class="nav-item <?php if ($page == "Sub Kriteria") {
          echo "active";
        } ?>">
          <a class="nav-link" href="list-sub-kriteria.php">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Data Sub Kriteria</span></a>
        </li>
      <?php } ?>

      <li class="nav-item <?php if ($page == "Alternatif") {
        echo "active";
      } ?>">
        <a class="nav-link" href="list-alternatif.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Alternatif</span></a>
      </li>

      <li class="nav-item <?php if ($page == "Penilaian") {
        echo "active";
      } ?>">
        <a class="nav-link" href="list-penilaian.php">
          <i class="fas fa-fw fa-edit"></i>
          <span>Data Penilaian</span></a>
      </li>

      <li class="nav-item <?php if ($page == "Perhitungan") {
        echo "active";
      } ?>">
        <a class="nav-link" href="perhitungan.php">
          <i class="fas fa-fw fa-calculator"></i>
          <span>Data Perhitungan</span></a>
      </li>

      <li class="nav-item <?php if ($page == "Hasil") {
        echo "active";
      } ?>">
        <a class="nav-link" href="hasil.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Hasil Akhir</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master User
      </div>


      <li class="nav-item <?php if ($page == "User") {
        echo "active";
      } ?>">
        <a class="nav-link" href="list-user.php">
          <i class="fas fa-fw fa-users-cog"></i>
          <span>Data User</span></a>
      </li>

      <li class="nav-item <?php if ($page == "Profile") {
        echo "active";
      } ?>">
        <a class="nav-link" href="list-profile.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Profile</span></a>
      </li>



      <!-- <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Master Data
      </div>

      <li class="nav-item <?php if ($page == "Hasil") {
        echo "active";
      } ?>">
        <a class="nav-link" href="hasil.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Hasil Akhir</span></a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Master User
      </div>

      <li class="nav-item <?php if ($page == "Profile") {
        echo "active";
      } ?>">
        <a class="nav-link" href="list-profile.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Profile</span></a>
      </li>
 -->

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

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn text-success d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="text-uppercase mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php
                  echo $_SESSION['username'];
                  ?>
                </span>
                <img class="img-profile rounded-circle" src="assets/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="list-profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid">