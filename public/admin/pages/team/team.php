<?php
session_start();
  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
      header("Location: ../auth/login.php");
      exit();
  }
include_once("../koneksi/koneksi.php");
//mengambil data yang ada didalam tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM user");
?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Team</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <?php include_once("../logo_web/logo.php"); ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
  </head>

  <body>
    <?php include_once ("../aside/aside.php")
  ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          
<?php include_once("../navbar/navbar.php") ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Team</h4>

<div class="card">
                <div class="card-header">
                  <a href="add.php" class="btn btn-outline-primary">Tambah Data</a>
                </div>
                
              <div class="card">
                <h5 class="card-header">Bordered Table</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>NAMA</th>
                          <th>JENIS KELAMIN</th>
                          <th>N0_HP</th>
                          <th>JABATAN</th>
                          <th>ALAMAT</th>
                          <th>TANGGAL LAHIR</th>
                          <th>USERNAME</th>
                          <th>PASSWORD</th>
                          <th>FOTO</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php
                      //untuk mengulang data sebanyak data yang ada di tabel mahasiswa
                      while($user_data = mysqli_fetch_array($result)) {
                          echo "<tr>";
                          echo "<td>".$user_data['nama_user']."</td>";
                          echo "<td>".$user_data['jenis_kelamin']."</td>";
                          echo "<td>".$user_data['no_hp']."</td>";
                          echo "<td>".$user_data['alamat']."</td>";
                          echo "<td>".$user_data['jabatan']."</td>";
                          echo "<td>".$user_data['tgl_lahir']."</td>";
                          echo "<td>".$user_data['username']."</td>";
                          echo "<td>".$user_data['password']."</td>";
                          echo "<td>";
                          echo "<img src='foto/".$user_data['foto']."'width='100px'>";
                          echo "</td>";
                          echo "<td>
                          <a href='hapus.php?id_user=$user_data[id_user]' class='btn btn-outline-danger btn-sm'>Hapus</a> 
                          <a href='edit.php?id_user=$user_data[id_user]' class='btn btn-outline-success btn-sm'>Edit</a>
                          </td>";

                          echo "</tr>";
                      }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
           
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

   

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>